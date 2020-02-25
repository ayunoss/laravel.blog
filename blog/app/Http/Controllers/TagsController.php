<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagsController extends Controller
{
    public function index(Tag $tag) {
        $posts = $tag->posts();
        $posts = $posts->paginate(7);
        $posts->appends(request()->input());
        return view('posts.index', compact('posts'));
    }

    public function test() {
        $data = DB::table('post_tag')
            ->select('tag_id')
            ->where('post_id', '1')
            ->get()
            ->toArray();
        $rawTagsId = [];

        foreach ($data as $val) {
            $rawTagsId[] = get_object_vars($val);
            $tagsId = [];
            foreach ($rawTagsId as $rawTagId) {
                $tagsId[] = $rawTagId['tag_id'];
            }
        }

        $data2 = DB::table('tags')
            ->select('name')
            ->whereIn('id', $tagsId)
            ->get()
            ->toArray();

        $tagsNames = [];
        foreach ($data2 as $val) {
            $arrTagsNames[] = get_object_vars($val);
            $tagsNames = [];
            foreach ($arrTagsNames as $name) {
                $tagsNames[] = $name['name'];
            }
        }
        return view('test', ['tagsId'=> $tagsNames]);

        //SELECT COUNT(tag_id) as tagsCount, b.name FROM post_tag INNER JOIN tags b ON b.id = post_tag.tag_id GROUP BY b.name ORDER BY tagsCount ASC

    }
}
