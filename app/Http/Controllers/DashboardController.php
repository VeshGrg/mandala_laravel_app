<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'permission:view dashboard']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        $articles = $user->hasRole('admin') ? Article::query() : $user->articles();

        $articles = $articles->latest()->paginate(10);

        // Return total unique views count (based on visitor cookie)
        $uniqueVisitors = views(Article::class)->unique()->count();

        // Return total views count
        $totalViews = views(Article::class)->count();
    
        return view('dashboard', compact('articles', 'uniqueVisitors', 'totalViews'));
    }
}
