<?php
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $data = [
            'totalContacts'       => $request->user()->contacts()->count(),
            'favoritesContacts'   => $request->user()->contacts()->where('is_favorite', true)->count(),
            'recentContactsCount' => $request->user()->contacts()->where('created_at', '>=', now()->subDays(30))->count(),
            'totalCategories'     => $request->user()->categories()->count(),
            'categories'          => $request->user()->categories()->withCount('contacts')->get(),

        ];

        if ($request->query('category')) {
            $category_id      = Category::where('name', $request->query('category'))->value('id');
            $data['contacts'] = $request->user()->contacts()
                ->where('category_id', $category_id)
                ->get();
        } else {
            $data['contacts'] = $request->user()->contacts()->get();
        }

        return view('dashboard', compact('data'));
    }
}
