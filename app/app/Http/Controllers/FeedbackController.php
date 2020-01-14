<?php

namespace App\Http\Controllers;

use App\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index() {
        return view('contact');
    }

    public function contact(Request $request) {
        $validatedData = $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'message' => 'required|max:255',
        ]);

        $username = $_POST['username'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        Feedback::addFeedback($username, $email, $message);

        return redirect('/contact');
    }
}
