<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// use App\Models\Blogs;

class Blogs extends Controller
{
    // Blogs::all();
    public static function index()
    {
        $blogs = DB::table('blogs')->orderBy('id', 'desc')->get();
        $ispost = 'false';
        return view('blog.blog', compact('blogs', 'ispost'));
    }

    public static function readblog(Request $request, $title)
    {
        if ($title) {
            $blogs = DB::table('blogs')->where('title', $title)->get();
            $ispost = 'true';
            return view('blog.blog', compact('blogs', 'ispost'));
        }

    }
}