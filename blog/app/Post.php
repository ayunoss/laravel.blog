<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Tag;


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

    public static function archiveSection() {
        $archives = DB::table('posts')
            ->selectRaw('year(created_at) year, monthname(created_at) month, count(*) published
          ')->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();

        return $archives;
    }

    public static function getTagsForPost($postId) {
        $stdTagsId = DB::table('post_tag')
            ->select('tag_id')
            ->where('post_id', $postId)
            ->get()
            ->toArray();
        $rawTagsId = [];

        foreach ($stdTagsId as $val) {
            $rawTagsId[] = get_object_vars($val);
            $tagsId = [];
            foreach ($rawTagsId as $rawTagId) {
                $tagsId[] = $rawTagId['tag_id'];
            }
        }

        $stdTagsNames = DB::table('tags')
            ->select('name')
            ->whereIn('id', $tagsId)
            ->get()
            ->toArray();

        $tagsNames = [];
        foreach ($stdTagsNames as $val) {
            $arrTagsNames[] = get_object_vars($val);
            $tagsNames = [];
            foreach ($arrTagsNames as $name) {
                $tagsNames[] = $name['name'];
            }
        }

        return $tagsNames;
    }
}
