<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model

{
    public static function add($title, $description, $body, $author) {
        $now = now();
        $result = DB::insert(
            'insert into posts (title, description, body, author, created_at, updated_at) values (?, ?, ?, ?, ?, ?)',
            [$title, $description, $body, $author, $now, $now]
        );
    }

    public static function edit() {
        $now = now();
    }
}
