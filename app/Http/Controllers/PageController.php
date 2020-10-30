<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class PageController extends Controller

{
    public function show()
    {
        $articles = Article::take(3)->orderBy('id', 'DESC')->get();
        return view('show', compact('articles'));
    }
    
    public function __construct()
    {
    }

    public function contact()
    {
        $message = 'please fill in the form below';
        $info = 'remember we do not work in monday ';
        $auth = \Auth::user();
        $options = [
            'general' => 'General message',
            'development' => 'web development',
            'consultation' => 'web consultation'
        ];
        return view('contact', compact('message', 'info', 'auth', 'user', 'options'));
    }


    public function storeContact(Request $request)
    {
        $validateDate = $request->validate([
            'sender_name' => 'required',
            'message' => 'required'
        ]);
        $request->session()->put('userName', $request->sender_name);
        return 'done see';
    }

    public function about(Request $request)
    {
        $userName =  $request->session()->get('userName', 'userName');
        return view('about', ['userName' => $userName]);
    }

    public function clearName(Request $request)
    {

        $request->session()->forget('userName');
        return redirect()->back();
    }
}
