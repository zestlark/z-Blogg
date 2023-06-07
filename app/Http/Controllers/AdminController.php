<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blogs;

class AdminController extends Controller
{
    public static function index()
    {
        // $data = array('name' => 'deepak kanojiya', "email" => 'kanojiyadeepak747@gmail.com', "password" => '12345678');
        // \DB::table('admin_models')->insert($data);

        $blogs = \App\Models\Blogs::orderBy('id', 'desc')->get();
        return view('admin', compact('blogs'));
    }

    public static function blog($title)
    {

        if ($title) {
            $blogs = \DB::table('blogs')->where('title', $title)->first();
            $ispost = 'true';
            $moreBy = \DB::table('blogs')->where('author', $blogs->author)->where('title', '<>', $blogs->title)->get();
            return view('admin.pages.blog', compact('blogs', 'moreBy'));
        } else {
            self::index();

        }
    }

    public static function Author()
    {
        $author = \App\Models\Blogs::select('author')->distinct()->orderBy('id', 'desc')->get();
        // $blogs = \App\Models\Blogs::orderBy('id', 'desc')->get();
        return view('admin.pages.authors', compact('author'));

    }

    public static function blogFilter(Request $request)
    {
        $author = $request->query('author');
        $blogs = \App\Models\Blogs::where('author', $author)->orderBy('Created_at', 'desc')->first();
        // $blogs = \App\Models\Blogs::orderBy('id', 'desc')->get();
        $moreBy = \App\Models\Blogs::where('author', $blogs->author)->where('title', '<>', $blogs->title)->get();
        return view('admin.pages.blog', compact('blogs', 'moreBy'));

    }

    public static function deleteblog(Request $request)
    {
        $blogid = $request->query('blog');

        $blog = \App\Models\Blogs::find($blogid);
        if (!$blog) {
            abort(404);
        }
        $blog->delete();
        return redirect()->route('admin')->with([
            'message' => 'Blog deleted successfully',
            'showMessage' => true,
        ]);
        ;
    }


}