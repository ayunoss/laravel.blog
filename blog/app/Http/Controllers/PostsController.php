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

    /** @var \App\Services\Post */
    private $_postService;

    public function __construct(\App\Services\Post $postService) {
        parent::__construct();
        $this->_postService = $postService;
    }

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

        return view('posts.index', ['posts' => $posts, 'archives' => $archives]);

    }

    public function show($id) {
        $post = Post::find($id);
        $tags = Post::getTagsForPost($id);
        $archives = Post::archiveSection();

        return view('posts.show', compact('post', 'tags', 'archives'));
    }

    public function add() {
        return view('posts.add');
    }

    public function addData(Request $request) {
        $validatedData = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'description' => 'required',
            'text' => 'required',
            'tags' => 'required',
        ]);

        $title = $request->post('title');
        $description = $request->post('description');
        $body = $request->post('text');
        $categories = $request->post('tags');

        $this->_postService->addPost($title, $description, $body, $categories);
        return redirect(route('addPost'));
    }

    public function edit(Request $request, $id) {
        $postData = Post::getPostData($id);
        return view('posts.edit', ['postData' => $postData]);
    }

    public function editData(Request $request, $id) {
        $title = $request->post('title');
        $description = $request->post('description');
        $body = $request->post('text');

        Post::edit($title, $description, $body, $id);

        return redirect(route('showPost', $id));
    }
}
