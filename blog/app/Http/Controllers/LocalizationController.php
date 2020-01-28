<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocalizationController extends Controller
{

    public function navPanel(Request $request) {
        $locale = $request->get('langselect');
        $request->session()->put('locale', $locale);
        return redirect(route('index'));
    }
}
