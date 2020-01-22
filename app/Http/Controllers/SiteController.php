<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;

class SiteController extends Controller
{

    public function index(){
        return view ('site.home.index');
    }

}
