<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function construct(){
        $this->middleware('auth')->except('show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles= Article::orderBy('id','DESC')->get();
        return view('articles.allarticles',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories= Category::select('title','id')->get();
        return view('articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
           'title'=>'max:199 | min:2 | required',
              'content'=>' max:500 | min:40 |required',
               'categories'=> 'required'
            ]

        );
      $user = Auth::user();
      $sort = array_values($request->categories);
      $article= $user->articles()->create($request->except('categories'));
      $article->categories()->attach($sort);

        return redirect()->to('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {

        return view('articles.display', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {

        if(Auth::id() != $article->user_id){
            return abort(401);
        }

        $categories= Category::pluck('title','id');
        $articlecategories= $article->categories()->pluck('id')->toArray();
        return view('articles.edit', compact('categories','article','articlecategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {

        if(Auth::id() != $article->user_id) {
            return abort(401);
        }

        $request->validate([
            'title'=>'max:100 | min:2 |required',
            'content'=>' max:500 | min:40 |required',
            'categories'=> 'required'
        ]);

        $article->update($request->all());
        $article->categories()->sync($request->categories);
       return redirect()->back();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        if(Auth::id() != $article->user_id){
            return abort(401);
        }
        $article->delete();
        return redirect()->back();
    }
}
