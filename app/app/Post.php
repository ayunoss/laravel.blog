<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model {

    public static function add($title, $description, $body, $author) {
        $now = now();
        $result = DB::insert(
            'insert into posts (title, description, body, author, created_at, updated_at) values (?, ?, ?, ?, ?, ?)',
            [$title, $description, $body, $author, $now, $now]
        );
    }

    public static function get($postId) {
        $postData = DB::table('posts')->where('id', $postId)->first();
        return $postData;
    }

    public static function edit($title, $description, $body, $id) {
        $now = now();
        $result = DB::table('posts')
            ->where('id', $id)
            ->update([
                'title' => $title,
                'description' => $description,
                'body' => $body,
                'updated_at' => $now,
            ]);
    }

    public static function findPosts ($from, $to) {
        $posts = DB::table('posts')
            ->whereBetween('created_at', [$from, $to]);
    }

    public static function archiveSection() {
        $archives = DB::table('posts')
            ->selectRaw('year(created_at) year, monthname(created_at) month, count(*) published
          ')->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
        return $archives;
    }

}
