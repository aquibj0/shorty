<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Links;

class LinksController extends Controller
{
    public function index(){
        return view('links.index');
    }


    public function shorten(Request $request){

        $random_token = Str::random(8);

        DB::table('links')->insert([
            'original_link' => $request['original_link'],
            'short_link' => URL::to('/') . '/' . $random_token ,
        ]);

        return URL::to('/') . '/' . $random_token;

    }


    public function fetchLink($link){
        $shorten_link = URL::to('/').'/'.$link;
        $link_query = DB::table('links')->where('short_link', $shorten_link);

        if(isset($link_query)){
            return redirect($link_query->value('original_link'));
            // return $link;
        }else{
            return 'not exist';
        }
        
    }
}
