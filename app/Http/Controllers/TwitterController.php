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

    public function tweet(Request $request){
        $this->validate($request, [
          'tweet' => 'required'
        ]);

        $newTweet = ['status' => $request->tweet];

        if(!empty($request->images)){
          foreach($request->images as $key => $value){
            $uploadMedia = Twitter::uploadMedia(['media' => File::get($value->getRealPath())]);
            if(!empty($uploadMedia)){
              $newTweet['media_ids'][$uploadMedia->media_id_string] = $uploadMedia->media_id_string;
            }
          }
        }

        $twitter = Twitter::postTweet($newTweet);
        return back();
      }


}

