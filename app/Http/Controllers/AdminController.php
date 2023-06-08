<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Blogs;
use Illuminate\Support\Facades\Auth;

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

    public static function users(Request $request)
    {
        $users = User::select('name', 'email', 'created_at', 'role')->get();
        return view('admin.pages.user', compact('users'));
    }

    public static function CreateUsers(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // Create a new user with the provided data
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role = $request->input('role');
        $user->save();

        \Illuminate\Support\Facades\Mail::to($request->input('email'))->send(new \App\Mail\MailSend($request->input('name'), $request->input('email'), $request->input('password')));

        return redirect()->Back()->with([
            'message' => 'User added successfully',
            'showMessage' => true,
        ]);
    }


}