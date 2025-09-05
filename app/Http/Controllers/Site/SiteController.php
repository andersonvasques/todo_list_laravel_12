<?php

namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function contact()
    {
        return view('site.contact');
    }
}
