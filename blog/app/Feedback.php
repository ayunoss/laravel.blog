<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Feedback extends Model {

    public static function addFeedback($username, $email, $message) {
        $feedback = DB::insert(
            'insert into feedback (username, email, message) values (?, ?, ?)',
            [$username, $email, $message]
        );
    }
}
