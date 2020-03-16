<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Auth;
use phpDocumentor\Reflection\Types\Self_;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = \Auth::user()->id;
        $user = \Auth::user()->name;
        $userInfo = User::find($user_id);
        $info = User::getUserInfo($user_id);
        $avatar = User::getUserAvatar($user);
        //var_dump(public_path());
        //var_dump(storage_path('app/public/'));
        return view('home', compact('userInfo', 'info', 'avatar'));
    }

    public function uploadInfo() {
        return view('user.userinfo');
    }

    public function uploadAvatar() {
        $user = \Auth::user()->name;
        $avatar = User::getUserAvatar($user);
        return view('user.avatar', compact('avatar'));
    }

    public function addInfo(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:155',
            'birthdate' => 'required',
            'about' => 'required|max:255',
            'links' => 'max:100'
        ]);
        $user_id = \Auth::user()->id;
        $name = $request->post('name');
        $birthdate = $request->post('birthdate');
        $info = $request->post('info');
        $links = $request->post('links');
        User::userInfo($user_id, $name, $birthdate, $info, $links);
        return redirect(route('home'));
    }

    public static function addAvatar(Request $request) {
        $directoryName = \Auth::user()->name;
        $validatedData = $request->validate([
            'avatar' => 'required|mimes:jpeg,jpg,png'
        ]);
        $imageFile = $request->file('avatar');
        $imgNameRaw = $imageFile->getClientOriginalName();
        $start = strpos($imgNameRaw, ".");
        $imgMime = substr($imgNameRaw, $start);
        $imgName = "profile_photo" . $imgMime;
        $path = $request->file('avatar')->storeAs($directoryName, $imgName, 'public');
        return redirect(route('home'));
    }

    public function deleteAvatar() {
        $user = \Auth::user()->name;
        $file = "public/" . $user;
        if($response = Storage::delete($file)) {
            return redirect(route('home'));
        } else {
            return back();
        }
    }

    public function editInfoForm() {
        $user_id = \Auth::user()->id;
        $info = User::getUserInfo($user_id);
        return view('user.editinfo', compact('info'));
    }

    public function editInfo(Request $request) {
        $user_id = \Auth::user()->id;
        $name = $request->post('name');
        $birthdate = $request->post('birthdate');
        $info = $request->post('info');
        $links = $request->post('links');
        User::editUserInfo($user_id, $name, $birthdate, $info, $links);
        return redirect(route('home'));
    }
}
