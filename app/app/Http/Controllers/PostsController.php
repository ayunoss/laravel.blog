<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Post;

class PostsController extends Controller
{
    private $test;

    public function index() {
        $posts = Post::paginate(7);
        return view('posts.index', ['posts' => $posts]);

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
            $title = $request->post('title');
            $description = $request->post('description');
            $body = $request->post('body');
            $author = Auth::user()->name;

            Post::add($title, $description, $body, $author);
        //}

        return redirect(route('addPost'));
    }

    public function edit(Request $request, $id) {
        $postData = Post::get($id);
        return view('posts.edit', ['postData' => $postData]);
    }

    public function editData(Request $request, $id) {
        $title = $request->post('title');
        $description = $request->post('description');
        $body = $request->post('body');

        Post::edit($title, $description, $body, $id);

        return redirect(route('showPost', $id));
    }


    public function test() {
        return;
    }
}
