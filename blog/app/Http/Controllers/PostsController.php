<?php

namespace App\Http\Controllers;

use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Post;
use Carbon\Carbon;
use App\Tag;

class PostsController extends Controller
{
    private $test;

    public function index(Request $request) {
        /** @var Builder $posts */
        $posts = Post::latest();

        $month = request('month');
        $year = request('year');

        if (isset($month) && isset($year)) {
            $posts->whereMonth('created_at', Carbon::parse($month)->month);
            $posts->whereYear('created_at', $year);
        }

        $posts = $posts->paginate(7);
        $posts->appends(request()->input());

        $archives = Post::archiveSection();
        $categories = Tag::getTags();


        return view('posts.index', ['posts' => $posts, 'archives' => $archives, 'categories' => $categories]);

    }

    public function show($id) {
        $post = Post::find($id);
        $categoriesOfPost = explode('|', $post['categories']);
        $archives = Post::archiveSection();
        $categories = Tag::getTags();
        return view('posts.show', compact('post', 'archives', 'categoriesOfPost','categories'));
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
            'text' => 'required',
            'tags' => 'required',
        ]);

        /*if($validator->fails()) {
            return redirect('/add')
                ->withErrors($validatedData)
                ->withInput();
        } else {*/
            $title = $request->post('title');
            $description = $request->post('description');
            $body = $request->post('text');
            $author = Auth::user()->name;
            $categories = $request->post('tags');

            Post::add($title, $description, $body, $author, $categories);
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
        $body = $request->post('text');

        Post::edit($title, $description, $body, $id);

        return redirect(route('showPost', $id));
    }

    public function findPostsByTag(){
        //
    }

    public function test() {
        return;
    }
}
