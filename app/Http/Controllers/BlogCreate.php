<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class BlogCreate extends Controller
{
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:blogs,title',
            'description' => 'required',
            'keyword' => 'required',

            'author' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // Create a new instance of your model
        $yourModel = new Blogs;

        // Set the values from the form data
        $yourModel->title = $request->title;
        $yourModel->description = $request->description;
        $yourModel->keyword = $request->keyword;
        $yourModel->url = $request->url;
        $yourModel->author = $request->author;

        $yourModel->save();

        return redirect()->route('blog');
    }
}