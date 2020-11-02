<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;
use App\Models\Category;
use App\Http\Requests\ArticleStoreRequest;
use App\Services\ExchangeRateService;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'index']);

        $this->authorizeResource(Article::class);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest()->paginate(10);

        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('article.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleStoreRequest $request)
    {
        $article = auth()->user()->articles()->create($request->only(['title', 'content']));

        $article->categories()->attach(request()->categories);
        
        if(request()->hasFile('featured_image')) {
            $article->updateFeaturedImage(
                request()->featured_image
            );
        }

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article, ExchangeRateService $service)
    {
        $rates = $service->getRates();

        views($article)->record();

        return view('article.show', compact('article', 'rates'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories = Category::all();

        $articlecategories = $article->categories()->pluck('id')->toArray();

        return view('article.edit', compact('categories', 'article', 'articlecategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleStoreRequest $request, Article $article)
    { 
        $article->update($request->only(['title', 'content']));

        $article->categories()->sync(request()->categories);

        if(request()->hasFile('featured_image')) {
            $article->updateFeaturedImage(
                request()->featured_image
            );
        }

        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->back();
    }
}
