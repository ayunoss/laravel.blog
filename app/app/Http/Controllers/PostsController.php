<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Post;

class PostsController extends Controller
{
    public function index() {
        $posts = Post::paginate(7);
        return view('posts.index', compact('posts'));

    }

    public function show($id) {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    public function add() {
        /*$input = $request->method();
        if ($input == 'GET') {
            return view('posts.add');
        }
        if ($input == 'POST') {
            return 'It is working lalala';
        }*/
        return view('posts.add');
    }

    public function addData(Request $request) {

        $validatedData = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'description' => 'required',
            'body' => 'required',
        ]);

        /*if($validator->fails()) {
            return redirect('/add')
                ->withErrors($validatedData)
                ->withInput();
        } else {*/
            $title = $_POST['title'];
            $description = $_POST['description'];
            $body = $_POST['body'];
            $author = Auth::user()->name;

            Post::add($title, $description, $body, $author);
        //}

        return redirect('/add');
    }

    public function edit() {
        return view('posts.edit');
    }

    public function editData() {

    }


    public function test() {

    }
}
