<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Auth::user()->contacts()
            ->with('category')->get();
        $data = [
            'contacts'   => $contacts,
            'categories' => Auth::user()->categories,
        ];
        return view('contacts.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Auth::user()->categories;
        return view('contacts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('contacts', 'public');
        }
        Auth::user()->contacts()->create($data);
        return redirect()->route('contacts.index')->with('success', __('contacts.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        if ($contact->user_id !== Auth::id()) {
            return redirect()->route('contacts.index')->with('error', __('contacts.not_found'));
        }
        $categories = Auth::user()->categories;
        return view('contacts.edit', compact('contact', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        if ($contact->user_id !== Auth::id()) {
            return redirect()->route('contacts.index')->with('error', __('contacts.not_found'));
        }
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('contacts', 'public');
        }
        $contact->update($data);
        return redirect()->route('contacts.index')->with('success', __('contacts.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        if ($contact->user_id !== Auth::id()) {
            return redirect()->route('contacts.index')->with('error', __('contacts.not_found'));
        }
        try {
            $contact->delete();
            return redirect()->route('contacts.index')->with('success', __('contacts.deleted'));
        } catch (\Exception $e) {
            return redirect()->route('contacts.index')->with('error', __('contacts.delete_error'));
        }
    }

    public function toggleFavorite(Contact $contact)
    {

        $state   = $contact->is_favorite ? 'unfavorited' : 'favorited';
        $message = $state === 'unfavorited' ? "error" : "success";
        $contact->update(['is_favorite' => ! $contact->is_favorite]);

        return redirect()->back()->with($message, __('contacts.' . $state));
    }

    public function deletedContacts()
    {
        $contacts = Auth::user()->contacts()->onlyTrashed()->with('category')->get();
        return view('contacts.trashed', compact('contacts'));
    }

    public function restore($id)
    {
        $contact = Auth::user()->contacts()->onlyTrashed()->findOrFail($id);
        $contact->restore();
        return redirect()->back()->with('success', __('contacts.restored'));
    }

    public function forceDelete($id)
    {
        $contact = Auth::user()->contacts()->onlyTrashed()->findOrFail($id);
        $contact->forceDelete();
        return redirect()->back()->with('success', __('contacts.force_deleted'));
    }

    public function emptyTrash()
    {
        Auth::user()->contacts()->onlyTrashed()->forceDelete();
        return redirect()->back()->with('success', __('contacts.empty_trash'));
    }
}
