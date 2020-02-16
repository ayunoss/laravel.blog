<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Tag extends Model
{

    public static function tagsValidation($raw_data) {
        //$data = explode(',', $raw_data);
        $data = preg_split( '/(,| )/', $raw_data);
        $raw_tags = [];

        foreach ($data as $tag) {
            $raw_tags[] = trim(strtolower($tag));
        }

        $tags = array_unique($raw_tags);
        return $tags;
    }

    public static function getTags() {

        $postsCategories = DB::table('posts')->select('categories')
                        ->get()
                        ->toArray();

        $categories = [];

        foreach ($postsCategories as $val) {
            $categories = array_merge($categories, array_values(get_object_vars($val)));
        }

        $result = [];

        foreach($categories as $category) {
            $result = array_merge($result, explode('|', $category));
            $result = array_unique($result);
        }

        return $result;
    }
}
