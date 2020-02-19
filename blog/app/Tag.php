<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Tag extends Model {

    public static function addTags($data) {
        $rawTags = self::tagsValidation($data); //получаю массив уникальных тэгов из формы
        $ensureTags = self::getEnsureTagsByName($rawTags); //проверяю наличие таких тэгов в бд
        $ensureTagsId = [];
        $ensureTagsName = [];

        foreach ($ensureTags as $tag) {
            $ensureTagsId[] = $tag['id'];
            $ensureTagsName[] = $tag['name'];
        }

        $newUniqueTags = array_diff($rawTags, $ensureTagsName);//получаю тэги которых в бд нет

        foreach ($newUniqueTags as $tag) {
            $newTagsToDB = DB::insert('insert into tags (name) values (?)', [$tag]);//добавляю новые тэги в бд
        }

        $newTagsId = [];

        foreach ($newUniqueTags as $tag) {
            $rawNewTagsId = DB::table('tags')
                ->select('id')
                ->where('name', $tag)
                ->get()
                ->toArray();//достаю id новых тэгов

            foreach ($rawNewTagsId as $tagId) {
                $newTagsId = array_merge($newTagsId, array_values(get_object_vars($tagId)));
            }
        }

        return array_merge($ensureTagsId, $newTagsId);
    }

    private static function tagsValidation($raw_data) {
        $data = explode(',', $raw_data);
        //$data = preg_split( '/(,| )/', $raw_data);
        $raw_tags = [];

        foreach ($data as $tag) {
            $raw_tags[] = trim(strtolower($tag));
        }

        $tags = array_unique($raw_tags);
        return $tags;
    }

    private static function getEnsureTagsByName($tagsNames) {
        $rawTags = DB::table('tags')->select(['name','id'])
                        ->whereIn('name', $tagsNames)
                        ->get()
                        ->toArray();
        $tags = [];

        foreach ($rawTags as $tag) {
            $tags[] = get_object_vars($tag);
        }

        return $tags;
    }

    public static function tagsSection() {

    }
}
