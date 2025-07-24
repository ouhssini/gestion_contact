<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Auth::user()->categories()->withCount('contacts')->get();

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validated();
        try {
            Auth::user()->categories()->create($data);

        } catch (\Exception $e) {
            return redirect()->route('categories.index')->with('error', __('categories.create_error'));
        }
        return redirect()->route('categories.index')->with('success', __('categories.created'));

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        if ($category->user_id !== Auth::id()) {
            return redirect()->route('categories.index')->with('error', __('categories.not_found'));
        }
        $contacts = $category->contacts()->get();
        $data     = [
            'category' => $category,
            'contacts' => $contacts,
        ];
        return view('categories.show', data: compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        if ($category->user_id !== Auth::id()) {
            return redirect()->route('categories.index')->with('error', __('categories.not_found'));
        }
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        if ($category->user_id !== Auth::id()) {
            return redirect()->route('categories.index')->with('error', __('categories.not_found'));
        }
        $data = $request->validated();
        try {
            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('categories', 'public');
            }
            $category->update($data);
        } catch (\Exception $e) {
            return redirect()->route('categories.index')->with('error', __('categories.update_error'));
        }
        return redirect()->route('categories.index')->with('success', __('categories.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->user_id !== Auth::id()) {
            return redirect()->route('categories.index')->with('error', __('categories.not_found'));
        }
        try {
            $category->delete();
            return redirect()->route('categories.index')->with('success', __('categories.deleted'));
        } catch (\Exception $e) {
            return redirect()->route('categories.index')->with('error', __('categories.delete_error'));
        }
    }
}
