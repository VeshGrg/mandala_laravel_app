<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::getHomeArticles(4);

        return view('home', compact('articles'));
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
