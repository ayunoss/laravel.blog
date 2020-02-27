<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Comment;

class Post extends Model {

    public static function add($title, $description, $body, $author) {
        $now = now();
        $result = DB::insert(
            'insert into posts (title, description, body, author, created_at, updated_at) values (?, ?, ?, ?, ?, ?)',
            [$title, $description, $body, $author, $now, $now]
        );

        $id = DB::getPdo()->lastInsertId();
        return $id;
    }

    public static function getPostData($postId) {
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

    public static function archives() {
        $archives = DB::table('posts')
            ->selectRaw('year(created_at) year, monthname(created_at) month, count(*) published
          ')->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();

        return $archives;
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comments() {
        //return $this->hasMany('App\Comment', 'post_id');
        return $this->hasMany(Comment::class);
    }

    public function addComment($body) {
        $user_id = auth()->id();
        $this->comments()->create([
            'user_id' => $user_id,
            'body' => $body,
            ]);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function findPostsByTag() {

    }
}
