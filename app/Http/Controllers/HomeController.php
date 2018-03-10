<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Auth;
use App\postYourAd;
use App\Category;
use App\EditInfo;
use App\About;
use DB;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /********** Posts your ads ***********/
          $categories = Category::orderBy('created_at', 'desc')->paginate(100);
        //  $posts = postYourAd::orderBy('created_at', 'desc')->paginate(1);
        $posts = DB::table('post_your_ads')
              ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
              ->join('edit_infos', 'post_your_ads.user_id', '=', 'edit_infos.user_id')
              ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address', 'my_contacts.website', 'edit_infos.name', 'edit_infos.logo')
              ->orderBy('created_at', 'desc')
              ->paginate(100);
          $profile = EditInfo::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->first();
          $banner = About::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->first();

          /************comments***********************/
          $comments = DB::table('post_your_ads')
                ->join('comments', 'post_your_ads.ad_slug', '=', 'comments.slug')
                ->join('edit_infos', 'post_your_ads.user_id', '=', 'edit_infos.user_id')
                ->select('post_your_ads.*', 'comments.feedback', 'comments.slug', 'comments.logo', 'comments.name')
                //->where("post_id", "=", "id")
                ->orderBy('created_at', 'desc')
                ->paginate(100);
          /*******************************************/
       return view('posts.postYourAd', compact('posts', 'categories','profile', 'banner', 'comments'));


    }
}
