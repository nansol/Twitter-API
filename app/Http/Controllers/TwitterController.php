<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Twitter;
use \File;

class TwitterController extends Controller
{
    //
     public function twitterUserTimeline(){
        $count = 10;
        $format = 'array';


    $data = Twitter::getUserTimeline([$count, $format]);
    return view('twitter', compact('data'));
    }
}
