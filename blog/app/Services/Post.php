<?php

namespace App\Services;

use App;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Post {

    public function addPost(string $title, string $description, $body, $categories) {
        $author = Auth::user()->name;
        $postId = \App\Post::add($title, $description, $body, $author);
        $tagsId = Tag::addTags($categories);
        foreach ($tagsId as $tagId) {
        $idsRelation = DB::insert(
            'insert into post_tag (post_id, tag_id) values (?, ?)', [$postId, $tagId]);
        }
    }
}

