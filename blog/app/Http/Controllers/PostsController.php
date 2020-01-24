<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Post;
use Carbon\Carbon;

class PostsController extends Controller
{
    private $test;

    public function index(Request $request) {
        $posts = Post::latest();

        $month = request('month');
        $year = request('year');

        if (isset($month) && isset($year)) {
            $posts->whereMonth('created_at', Carbon::parse($month)->month);
            $posts->whereYear('created_at', $year);
        }

        $posts = $posts->paginate(7);

        $archives = Post::archiveSection();

        /*$archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published
          ')->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();*/

        return view('posts.index', ['posts' => $posts, 'archives' => $archives]);

    }

    public function show($id) {
        $post = Post::find($id);
        $archives = Post::archiveSection();
        return view('posts.show', compact('post', 'archives'));
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

    public function findPosts(){
        //
    }

    public function test() {
        return;
    }
}
