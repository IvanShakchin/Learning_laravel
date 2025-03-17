<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return 'invoke';
    }

    public function home () {
        return 'home';
    }

    public function map () {
        return 'map';
    }

    public function message ($id) {
        return $id;
    }



    public function mypage () {
        return 'mypage';
    }

}
