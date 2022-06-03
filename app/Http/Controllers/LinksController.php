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

        $shorten_links_count = DB::table('links')->count();

        return view('links.index', \compact('shorten_links_count'));
    }


    public function shorten(Request $request){

        $random_token = strtolower(Str::random(4));

        $shorten_link = Links::where('original_link', $request['original_link'])->first();

        if(isset( $shorten_link)){
            $shorten_url = $shorten_link['short_link'];

            return $shorten_link;
            return \redirect()->back()->with('success', $shorten_url) ;
        }

        else{

            Links::create([
                'original_link' => $request['original_link'],
                'short_link' => URL::to('/') . '/' . $random_token ,
            ]);

            $shorten_url = URL::to('/') . '/' . $random_token;

            return \redirect()->back()->with('success', $shorten_url) ;
        }

        

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
