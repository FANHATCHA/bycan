<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\PostYourAd;
use App\MyContact;
use App\EditInfo;
use App\Services;
use App\About;
use App\SocialMedia;
use Auth;
use DB;

/* post status
0 ----> new Posts
K(11) ----> Featured Posts
O------>mark as verified
N------>trending ads
E----> to span
F----> to be removed
*/


class UsersCtrl extends Controller
{

    public function index(){
      /*////////////////////////////// INDEX START//////////////////////////////////////////////*/
            /***********<if login as guest> START******************************/
            if (Auth::guest()) {
              $categories = Category::orderBy('created_at', 'desc')->paginate(100);

              $featuredPosts = DB::table('post_your_ads')
                    ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                    ->join('edit_infos', 'post_your_ads.user_id', '=', 'edit_infos.user_id')
                    ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address', 'my_contacts.website', 'edit_infos.name')
                    ->orderBy('created_at', 'desc')
                    ->where([
                      ["verified", "=", 'Yes'],
                      ["status", "=",11]
                    ])->paginate(15);
              $countFeat = postYourAd::orderBy('created_at', 'desc')
              ->where([
                ["verified", "=", 'Yes'],
                ["status", "=",11]
              ])
              ->count();
                 /** get lastest **/
              $lastestPosts = DB::table('post_your_ads')
                    ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                    ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address')
                    ->orderBy('created_at', 'desc')->where("status", "=",0)->paginate(6);
              $lastCount = DB::table('post_your_ads')
                          ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                          ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address')
                          ->orderBy('created_at', 'desc')->where("status", "=",0)->count();
        /*****************************************************************************************************************/
        /************comments***********************/
        $comments = DB::table('post_your_ads')
              ->join('comments', 'post_your_ads.ad_slug', '=', 'comments.slug')
              ->join('edit_infos', 'post_your_ads.user_id', '=', 'edit_infos.user_id')
              ->select('post_your_ads.*', 'comments.feedback', 'comments.slug', 'comments.logo', 'comments.name')
              ->where("post_id", "=", "id")
              ->orderBy('created_at', 'desc')
              ->paginate(100);
        /*******************************************/
        $getContact =MyContact::orderBy('created_at', 'desc')->first();


              return view('ads.home', compact(
                'categories',
                'featuredPosts',
                'countFeat',
                'getContact',
                'lastestPosts',
                'lastCount',
                'comments',
                '$userPosts'
               ));
            }
         /***********<if login as guest> END******************************/

         /**Else Start**/
             else {
               $categories = Category::orderBy('created_at', 'desc')->paginate(100);

               $featuredPosts = DB::table('post_your_ads')
                     ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                     ->join('edit_infos', 'post_your_ads.user_id', '=', 'edit_infos.user_id')
                     ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address', 'my_contacts.website', 'edit_infos.name')
                     ->orderBy('created_at', 'desc')
                     ->where([
                       ["verified", "=", 'Yes'],
                       ["status", "=",11]
                     ])->paginate(15);
               $countFeat = postYourAd::orderBy('created_at', 'desc')
               ->where([
                 ["verified", "=", 'Yes'],
                 ["status", "=",11]
               ])
               ->count();
                  /** get lastest **/
               $lastestPosts = DB::table('post_your_ads')
                     ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                     ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address')
                     ->orderBy('created_at', 'desc')->where("status", "=",0)->paginate(6);
               $lastCount = DB::table('post_your_ads')
                           ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                           ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address')
                           ->orderBy('created_at', 'desc')->where("status", "=",0)->count();
         /*****************************************************************************************************************/
         /************comments***********************/
         $comments = DB::table('post_your_ads')
               ->join('comments', 'post_your_ads.ad_slug', '=', 'comments.slug')
               ->join('edit_infos', 'post_your_ads.user_id', '=', 'edit_infos.user_id')
               ->select('post_your_ads.*', 'comments.feedback', 'comments.slug', 'comments.logo', 'comments.name')
               ->where("post_id", "=", "id")
               ->orderBy('created_at', 'desc')
               ->paginate(100);
         /*******************************************/
         $getContact =MyContact::orderBy('created_at', 'desc')->first();
         /**Count users posts****/
         $userPosts = PostYourAd::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->count();
         $postOfUsers = PostYourAd::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->paginate(10);
         /********************************************/

         /*count user edit info or not*/
         $profile = EditInfo::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->first();
         /*****************************/

               return view('ads.home', compact(
                 'categories',
                 'featuredPosts',
                 'countFeat',
                 'getContact',
                 'lastestPosts',
                 'lastCount',
                 'comments',
                 'userPosts',
                 'profile',
                 'postOfUsers'
                ));
            }
        /**Else End**/
   /*///////////////////////////// INDEX END ///////////////////////////////////////////////*/

    }

  /*User ads display */

        public function show($ad_slug)
        {
          /*////////////////////////////// INDEX START//////////////////////////////////////////////*/
                /***********<if login as guest> START******************************/
                if (Auth::guest()) {

              /*1*/ $categories = Category::orderBy('created_at', 'desc')->paginate(100);
             /*2*/  $ads = PostYourAd::orderBy('created_at', 'desc')
                  ->where('ad_slug', '=',$ad_slug)
                  ->Paginate(10);
              /*3*/  $selected = Category::orderBy('created_at', 'desc')
                                              ->where('categoryTitle', '=', ucfirst(trans($ad_slug)) )
                                              ->first();
              /*4*/ $countPost = PostYourAd::orderBy('created_at', 'desc')
                ->where("typeOfAd", "=",ucfirst(trans($ad_slug)) )
                ->count();
              /*5*/ /*$allAds = PostYourAd::orderBy('created_at', 'desc')
                  ->where("typeOfAd", "=",ucfirst(trans($ad_slug)) )
                  ->Paginate(10);*/
                  $allAds = DB::table('post_your_ads')
                        ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                          ->join('edit_infos', 'post_your_ads.user_id', '=', 'edit_infos.user_id')
                        ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address', 'my_contacts.website', 'edit_infos.name')
                        ->orderBy('created_at', 'desc')
                        ->where([
                          ["verified", "=", 'Yes'],
                          ["typeOfAd", "=",ucfirst(trans($ad_slug))],
                          //["trending", "=",14]

                        ])->paginate(1);
              /*6*/$getContact =MyContact::orderBy('created_at', 'desc')
                  ->get();
              /*6*/$services =Services::orderBy('created_at', 'desc')
                    ->Paginate(10);
                    /**************** trending *****************************************************/
                    $trendings = DB::table('post_your_ads')
                          ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                          ->join('edit_infos', 'post_your_ads.user_id', '=', 'edit_infos.user_id')
                          ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address', 'my_contacts.website', 'edit_infos.name')
                          ->orderBy('created_at', 'desc')
                          ->where([
                            ["verified", "=", 'Yes'],
                            ["status", "=",11],
                            ["trending", "=",14]

                          ])->paginate(40);
                    /*******************************************************************************/

                              $countTrend = DB::table('post_your_ads')
                                    ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                                      ->join('edit_infos', 'post_your_ads.user_id', '=', 'edit_infos.user_id')
                                    ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address', 'my_contacts.website', 'edit_infos.name')
                                    ->orderBy('created_at', 'desc')
                                    ->where([
                                      ["verified", "=", 'Yes'],
                                      ["status", "=",11],
                                      //["trending", "=",14]

                                    ])->count();
                    /******************************************************************************/


              return view('ads.category', compact(
                'ads',
                'categories',
                 'selected',
                 'countPost',
                 'allAds',
                 'getContact',
                 'services',
                 'countTrend',
                 'trendings'
               ));
                } else {

              /*1*/ $categories = Category::orderBy('created_at', 'desc')->paginate(100);
             /*2*/  $ads = PostYourAd::orderBy('created_at', 'desc')
                  ->where('ad_slug', '=',$ad_slug)
                  ->Paginate(10);
              /*3*/  $selected = Category::orderBy('created_at', 'desc')
                                              ->where('categoryTitle', '=', ucfirst(trans($ad_slug)) )
                                              ->first();
              /*4*/ $countPost = PostYourAd::orderBy('created_at', 'desc')
                ->where("typeOfAd", "=",ucfirst(trans($ad_slug)) )
                ->count();
              /*5*/ /*$allAds = PostYourAd::orderBy('created_at', 'desc')
                  ->where("typeOfAd", "=",ucfirst(trans($ad_slug)) )
                  ->Paginate(10);*/
                  $allAds = DB::table('post_your_ads')
                        ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                        ->join('edit_infos', 'post_your_ads.user_id', '=', 'edit_infos.user_id')
                        ->join('abouts', 'post_your_ads.user_id', '=', 'abouts.user_id')
                        ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address', 'my_contacts.website', 'edit_infos.name', 'abouts.about')
                        ->orderBy('created_at', 'desc')
                        ->where([
                          ["verified", "=", 'Yes'],
                          ["typeOfAd", "=",ucfirst(trans($ad_slug))],
                          //["trending", "=",14]

                        ])->paginate(1);
              /*6*/$getContact =MyContact::orderBy('created_at', 'desc')
                  ->get();
              /*6*/$services =Services::orderBy('created_at', 'desc')
                    ->Paginate(10);
                    /**************** trending *****************************************************/
                    $trendings = DB::table('post_your_ads')
                          ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                          ->join('edit_infos', 'post_your_ads.user_id', '=', 'edit_infos.user_id')
                          ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address', 'my_contacts.website', 'edit_infos.name')
                          ->orderBy('created_at', 'desc')
                          ->where([
                            ["verified", "=", 'Yes'],
                            ["status", "=",11],
                            ["trending", "=",14]

                          ])->paginate(40);
                    /*******************************************************************************/

                              $countTrend = DB::table('post_your_ads')
                                    ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                                      ->join('edit_infos', 'post_your_ads.user_id', '=', 'edit_infos.user_id')
                                    ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address', 'my_contacts.website', 'edit_infos.name')
                                    ->orderBy('created_at', 'desc')
                                    ->where([
                                      ["verified", "=", 'Yes'],
                                      ["status", "=",11],
                                      //["trending", "=",14]

                                    ])->count();
                    /******************************************************************************/
                    /**Count users posts****/
                    $userPosts = PostYourAd::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->count();
                    $postOfUsers = PostYourAd::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->paginate(10);
                    /********************************************/

                    /*count user edit info or not*/
                    $profile = EditInfo::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->first();
                    /*****************************/


              return view('ads.category', compact(
                'ads',
                'categories',
                 'selected',
                 'countPost',
                 'allAds',
                 'getContact',
                 'services',
                 'countTrend',
                 'trendings',
                 'userPosts',
                 'profile',
                 'postOfUsers'
               ));
                }



        }

        public function render($ad_slug)
        {
          /**Render all the items**/

         $ads = postYourAd::orderBy('created_at', 'desc')
         ->where('ad_slug', '=',$ad_slug)
         ->first();
         $ads = DB::table('post_your_ads')
               ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
               ->join('edit_infos', 'post_your_ads.user_id', '=', 'edit_infos.user_id')
               ->join('abouts', 'post_your_ads.user_id', '=', 'abouts.user_id')
               ->join('services', 'post_your_ads.user_id', '=', 'services.user_id')
               ->join('social_media', 'post_your_ads.user_id', '=', 'social_media.user_id')
               ->select(
                 'post_your_ads.*',
                  'my_contacts.phone',
                  'my_contacts.address',
                  'my_contacts.website',
                  'my_contacts.email',
                  'edit_infos.tagline',
                  'edit_infos.name',
                  'edit_infos.logo',
                  'abouts.about',
                  'services.services',
                  'abouts.banner',
                  'social_media.socialMedia',
                  'social_media.url'
                   ) ->orderBy('created_at', 'desc')
               ->where([
                 //["verified", "=", 'Yes'],
                 //["status", "=",11]
                 ["ad_slug", "=",$ad_slug]
               ])->first();

    /********************************************************************/
         $myContacts = MyContact::orderBy('created_at', 'desc')
         ->first();
         /*1*/ $categories = Category::orderBy('created_at', 'desc')->paginate(10);
        /*2*/ $myInfos = EditInfo::orderBy('created_at', 'desc')->first();
        /*3*/ $about = About::orderBy('created_at', 'desc')->first();
        /*4*/ $services = Services::orderBy('created_at', 'desc')->first();
        /*5*/ $socialMedia = SocialMedia::orderBy('created_at', 'desc')->first();

        /*6*/ $myContacts = MyContact::orderBy('created_at', 'desc')->first();

        /**************** trending *****************************************************/
        $trendings = DB::table('post_your_ads')
              ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                ->join('edit_infos', 'post_your_ads.user_id', '=', 'edit_infos.user_id')
              ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address', 'my_contacts.website', 'edit_infos.name')
              ->orderBy('created_at', 'desc')
              ->where([
                ["verified", "=", 'Yes'],
                ["status", "=",11],
                ["trending", "=",14]

              ])->paginate(40);
        /*******************************************************************************/

                  $countTrend = DB::table('post_your_ads')
                        ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                          ->join('edit_infos', 'post_your_ads.user_id', '=', 'edit_infos.user_id')
                        ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address', 'my_contacts.website', 'edit_infos.name')
                        ->orderBy('created_at', 'desc')
                        ->where([
                          ["verified", "=", 'Yes'],
                          ["status", "=",11],
                          //["trending", "=",14]

                        ])->count();
        /******************************************************************************/
        /**************SOCIAL MEDIA*******************************/
        $facebook = DB::table('post_your_ads')
              ->join('social_media', 'post_your_ads.user_id', '=', 'social_media.user_id')
              ->select('post_your_ads.*', 'social_media.url', 'social_media.socialMedia')
              ->orderBy('created_at', 'desc')
              ->where([
                ["socialMedia", "=", 'Facebook'],
                //["status", "=",11],
                //["trending", "=",14]

              ])->first();
        /*********************************************************/

        /***********************Suggestions**************************/
        $suggestions = DB::table('post_your_ads')
                ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                ->join('edit_infos', 'post_your_ads.user_id', '=', 'edit_infos.user_id')
                ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address', 'my_contacts.website', 'edit_infos.name')
                ->orderBy('created_at', 'desc')->paginate(15);
        /************************************************************/
         return view('ads.adDetails', compact(
           'ads',
         'categories',
          'myContacts',
           'myInfos',
           'about',
           'services',
           'socialMedia',
           'trendings',
           'countTrend',
           'myContacts',
           //'facebook'
           'suggestions'
         ));

        }

        /*User newest */

        public function newest(){
          $categories = Category::orderBy('created_at', 'desc')->paginate(10);

          $featuredPosts = DB::table('post_your_ads')
                ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address')
                ->orderBy('created_at', 'desc')->where("status", "=",0)->paginate(40);
          $countFeat = postYourAd::orderBy('created_at', 'desc')->where("status", "=",0)->count();
             /** get lastest **/
          $lastestPosts = DB::table('post_your_ads')
                ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address')
                ->orderBy('created_at', 'desc')->where("status", "=",0)->paginate(1);
          $lastCount = DB::table('post_your_ads')
                      ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                      ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address')
                      ->orderBy('created_at', 'desc')->where("status", "=",0)->count();
    /*****************************************************************************************************************/
          $getContact =MyContact::orderBy('created_at', 'desc')->first();

    /********************by category**********************************************/
    $byCategory = DB::table('post_your_ads')
          ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
          ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address')
          ->orderBy('created_at', 'desc')->where("status", "=",0)->paginate(40);
    /******************************************************************************/

    /**************** trending *****************************************************/
    $trendings = DB::table('post_your_ads')
          ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
            ->join('edit_infos', 'post_your_ads.user_id', '=', 'edit_infos.user_id')
          ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address', 'my_contacts.website', 'edit_infos.name')
          ->orderBy('created_at', 'desc')
          ->where([
            ["verified", "=", 'Yes'],
            ["status", "=",11],
            ["trending", "=",14]

          ])->paginate(40);
    /*******************************************************************************/

    /****************count trending ***********************************************/
    $trendings = DB::table('post_your_ads')
              ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                ->join('edit_infos', 'post_your_ads.user_id', '=', 'edit_infos.user_id')
              ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address', 'my_contacts.website', 'edit_infos.name')
              ->orderBy('created_at', 'desc')
              ->where([
                ["verified", "=", 'Yes'],
                ["status", "=",11],
                ["trending", "=",14]

              ])->paginate(40);
              $countTrend = DB::table('post_your_ads')
                    ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                      ->join('edit_infos', 'post_your_ads.user_id', '=', 'edit_infos.user_id')
                    ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address', 'my_contacts.website', 'edit_infos.name')
                    ->orderBy('created_at', 'desc')
                    ->where([
                      ["verified", "=", 'Yes'],
                      ["status", "=",11],
                      //["trending", "=",14]

                    ])->count();
    /******************************************************************************/
          return view('ads.newest', compact(
            'categories',
            'featuredPosts',
            'countFeat',
            'getContact',
            'lastestPosts',
            'lastCount',
            'byCategory',
            'trendings',
            'countTrend'
           ));
        }

        public function oldest(){
          $categories = Category::orderBy('created_at', 'desc')->paginate(10);

          $featuredPosts = DB::table('post_your_ads')
                ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address')
                ->orderBy('created_at', 'desc')->where("status", "=",0)->paginate(40);
          $countFeat = postYourAd::orderBy('created_at', 'desc')->where("status", "=",0)->count();
             /** get newest **/
          $oldestPosts = DB::table('post_your_ads')
                ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address')
                ->orderBy('created_at', 'asc')->where("status", "=",0)->paginate(1);
          $lastCount = DB::table('post_your_ads')
                      ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                      ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address')
                      ->orderBy('created_at', 'desc')->where("status", "=",0)->count();
    /*****************************************************************************************************************/
          $getContact =MyContact::orderBy('created_at', 'desc')->first();
          /**************** trending *****************************************************/
          $trendings = DB::table('post_your_ads')
                ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                  ->join('edit_infos', 'post_your_ads.user_id', '=', 'edit_infos.user_id')
                ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address', 'my_contacts.website', 'edit_infos.name')
                ->orderBy('created_at', 'desc')
                ->where([
                  ["verified", "=", 'Yes'],
                  ["status", "=",11],
                  ["trending", "=",14]

                ])->paginate(40);
          /*******************************************************************************/

                    $countTrend = DB::table('post_your_ads')
                          ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                            ->join('edit_infos', 'post_your_ads.user_id', '=', 'edit_infos.user_id')
                          ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address', 'my_contacts.website', 'edit_infos.name')
                          ->orderBy('created_at', 'desc')
                          ->where([
                            ["verified", "=", 'Yes'],
                            ["status", "=",11],
                            //["trending", "=",14]

                          ])->count();
          /******************************************************************************/
          return view('ads.oldest', compact(
            'categories',
            'featuredPosts',
            'countFeat',
            'getContact',
            'oldestPosts',
            'lastCount',
            'trendings',
            'countTrend'
           ));
        }


                public function getInTouch(){
                  $categories = Category::orderBy('created_at', 'desc')->paginate(10);

                  $featuredPosts = DB::table('post_your_ads')
                        ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                        ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address')
                        ->orderBy('created_at', 'desc')->where("status", "=",0)->paginate(40);
                  $countFeat = postYourAd::orderBy('created_at', 'desc')->where("status", "=",0)->count();
                     /** get newest **/
                  $oldestPosts = DB::table('post_your_ads')
                        ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                        ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address')
                        ->orderBy('created_at', 'asc')->where("status", "=",0)->paginate(40);
                  $lastCount = DB::table('post_your_ads')
                              ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                              ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address')
                              ->orderBy('created_at', 'desc')->where("status", "=",0)->count();
            /*****************************************************************************************************************/
            /**************** trending *****************************************************/
            $trendings = DB::table('post_your_ads')
                  ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                    ->join('edit_infos', 'post_your_ads.user_id', '=', 'edit_infos.user_id')
                  ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address', 'my_contacts.website', 'edit_infos.name')
                  ->orderBy('created_at', 'desc')
                  ->where([
                    ["verified", "=", 'Yes'],
                    ["status", "=",11],
                    ["trending", "=",14]

                  ])->paginate(40);
            /*******************************************************************************/

                      $countTrend = DB::table('post_your_ads')
                            ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                              ->join('edit_infos', 'post_your_ads.user_id', '=', 'edit_infos.user_id')
                            ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address', 'my_contacts.website', 'edit_infos.name')
                            ->orderBy('created_at', 'desc')
                            ->where([
                              ["verified", "=", 'Yes'],
                              ["status", "=",11],
                              //["trending", "=",14]

                            ])->count();
            /******************************************************************************/
                  $getContact =MyContact::orderBy('created_at', 'desc')->first();
                  return view('ads.getInTouch', compact(
                    'categories',
                    'featuredPosts',
                    'countFeat',
                    'getContact',
                    'oldestPosts',
                    'lastCount',
                    'trendings',
                    'countTrend'
                   ));
                }
                  public function UsersGuideline(){
                                  $categories = Category::orderBy('created_at', 'desc')->paginate(10);

                                  $featuredPosts = DB::table('post_your_ads')
                                        ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                                        ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address')
                                        ->orderBy('created_at', 'desc')->where("status", "=",0)->paginate(40);
                                  $countFeat = postYourAd::orderBy('created_at', 'desc')->where("status", "=",0)->count();
                                     /** get newest **/
                                  $oldestPosts = DB::table('post_your_ads')
                                        ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                                        ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address')
                                        ->orderBy('created_at', 'asc')->where("status", "=",0)->paginate(40);
                                  $lastCount = DB::table('post_your_ads')
                                              ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                                              ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address')
                                              ->orderBy('created_at', 'desc')->where("status", "=",0)->count();
                            /*****************************************************************************************************************/
                            /**************** trending *****************************************************/
                            $trendings = DB::table('post_your_ads')
                                  ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                                    ->join('edit_infos', 'post_your_ads.user_id', '=', 'edit_infos.user_id')
                                  ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address', 'my_contacts.website', 'edit_infos.name')
                                  ->orderBy('created_at', 'desc')
                                  ->where([
                                    ["verified", "=", 'Yes'],
                                    ["status", "=",11],
                                    ["trending", "=",14]

                                  ])->paginate(40);
                            /*******************************************************************************/

                                      $countTrend = DB::table('post_your_ads')
                                            ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                                              ->join('edit_infos', 'post_your_ads.user_id', '=', 'edit_infos.user_id')
                                            ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address', 'my_contacts.website', 'edit_infos.name')
                                            ->orderBy('created_at', 'desc')
                                            ->where([
                                              ["verified", "=", 'Yes'],
                                              ["status", "=",11],
                                              //["trending", "=",14]

                                            ])->count();
                            /******************************************************************************/
                                  $getContact =MyContact::orderBy('created_at', 'desc')->first();
                                  return view('ads.guidelines', compact(
                                    'categories',
                                    'featuredPosts',
                                    'countFeat',
                                    'getContact',
                                    'oldestPosts',
                                    'lastCount',
                                    'trendings',
                                    'countTrend'
                                   ));
                            }


      public function WhoWeAre(){
         $categories = Category::orderBy('created_at', 'desc')->paginate(10);

          $featuredPosts = DB::table('post_your_ads')
                                                  ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                                                  ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address')
                                                  ->orderBy('created_at', 'desc')->where("status", "=",0)->paginate(40);
                                            $countFeat = postYourAd::orderBy('created_at', 'desc')->where("status", "=",0)->count();
                                               /** get newest **/
                                            $oldestPosts = DB::table('post_your_ads')
                                                  ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                                                  ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address')
                                                  ->orderBy('created_at', 'asc')->where("status", "=",0)->paginate(40);
                                            $lastCount = DB::table('post_your_ads')
                                                        ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                                                        ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address')
                                                        ->orderBy('created_at', 'desc')->where("status", "=",0)->count();
                                      /*****************************************************************************************************************/
                                            $getContact =MyContact::orderBy('created_at', 'desc')->first();
                                            return view('ads.who-we-are', compact(
                                              'categories',
                                              'featuredPosts',
                                              'countFeat',
                                              'getContact',
                                              'oldestPosts',
                                              'lastCount'
                                             ));
                                      }
public function terms(){
$categories = Category::orderBy('created_at', 'desc')->paginate(10);

$featuredPosts = DB::table('post_your_ads')
                  ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                  ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address')
                  ->orderBy('created_at', 'desc')->where("status", "=",0)->paginate(40);
$countFeat = postYourAd::orderBy('created_at', 'desc')->where("status", "=",0)->count();
/** get newest **/
$oldestPosts = DB::table('post_your_ads')
              ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
              ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address')
              ->orderBy('created_at', 'asc')->where("status", "=",0)->paginate(40);
$lastCount = DB::table('post_your_ads')
                ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address')
                ->orderBy('created_at', 'desc')->where("status", "=",0)->count();
  /*****************************************************************************************************************/
$getContact =MyContact::orderBy('created_at', 'desc')->first();
return view('ads.terms', compact(
'categories',
'featuredPosts',
'countFeat',
'getContact',
'oldestPosts',
'lastCount'
   ));
}
/**********************************************************************************************************************/
/*************** Search bar *************************/
public function autocomplete(Request $request)
{
   $term = $request->term;
   $items = postYourAd::where('adTitle','LIKE','%'.$term.'%')->get();
   //return $items;
   $data=array();
   foreach ($items as $product) {
                $data[]=array('label'=>"$product->adTitle",'value'=>$product->ad_slug);
        }
   if(count($items) == 0){
     return ['value'=>'No Result Found','id'=>''];
  }
  else {
    return $data;
  }
  /*
   else {
     foreach ($items as $key => $item) {
       $searchResult[] = $item->adTitle;
     }
   }*/
/*$data = postYourAd::select("adTitle as name")
->where("adTitle","LIKE","%{$request->input('query')}%")
->get();
return response()->json($data);*/

}

public function search(Request $request)
{
  /******************/
  $categories = Category::orderBy('created_at', 'desc')->paginate(100);
    $query = $request->get('query');
    /**************** trending *****************************************************/
    $trendings = DB::table('post_your_ads')
          ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
            ->join('edit_infos', 'post_your_ads.user_id', '=', 'edit_infos.user_id')
          ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address', 'my_contacts.website', 'edit_infos.name')
          ->orderBy('created_at', 'desc')
          ->where([
            ["verified", "=", 'Yes'],
            ["status", "=",11],
            ["trending", "=",14]

          ])->paginate(40);
    /*******************************************************************************/

              $countTrend = DB::table('post_your_ads')
                    ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                      ->join('edit_infos', 'post_your_ads.user_id', '=', 'edit_infos.user_id')
                    ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address', 'my_contacts.website', 'edit_infos.name')
                    ->orderBy('created_at', 'desc')
                    ->where([
                      ["verified", "=", 'Yes'],
                      ["status", "=",11],
                      //["trending", "=",14]

                    ])->count();
    /******************************************************************************/
    $posts = PostYourAd::where('adTitle', 'LIKE', "%$query%")->orWhere('ad_slug', 'LIKE', "%$query%")->paginate(20);
    return view('ads.search', compact('posts','query', 'categories', 'trendings', 'countTrend'));
}
/******************************Featured*****************************************************/

        public function featured(){
          $categories = Category::orderBy('created_at', 'desc')->paginate(10);

          $featuredPosts = DB::table('post_your_ads')
                ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address', 'my_contacts.website')
                ->orderBy('created_at', 'desc')
                ->where([
                  ["verified", "=", 'Yes'],
                  ["status", "=",11]
                ])->paginate(1);
          $countFeat = postYourAd::orderBy('created_at', 'desc')->where("status", "=",0)->count();
             /** get newest **/
          $oldestPosts = DB::table('post_your_ads')
                ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address')
                ->orderBy('created_at', 'asc')->where("status", "=",0)->paginate(1);
          $lastCount = DB::table('post_your_ads')
                      ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                      ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address')
                      ->orderBy('created_at', 'desc')->where("status", "=",0)->count();
    /*****************************************************************************************************************/
          $getContact =MyContact::orderBy('created_at', 'desc')->first();
          /**************** trending *****************************************************/
          $trendings = DB::table('post_your_ads')
                ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                  ->join('edit_infos', 'post_your_ads.user_id', '=', 'edit_infos.user_id')
                ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address', 'my_contacts.website', 'edit_infos.name')
                ->orderBy('created_at', 'desc')
                ->where([
                  ["verified", "=", 'Yes'],
                  ["status", "=",11],/*******Featured*************/
                  ["trending", "=",14]

                ])->paginate(40);
          /*******************************************************************************/

                    $countTrend = DB::table('post_your_ads')
                          ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                            ->join('edit_infos', 'post_your_ads.user_id', '=', 'edit_infos.user_id')
                          ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address', 'my_contacts.website', 'edit_infos.name')
                          ->orderBy('created_at', 'desc')
                          ->where([
                            ["verified", "=", 'Yes'],
                            ["status", "=",11],
                            //["trending", "=",14]

                          ])->count();
          /******************************************************************************/
          return view('ads.featured', compact(
            'categories',
            'featuredPosts',
            'countFeat',
            'getContact',
            'oldestPosts',
            'lastCount',
            'trendings',
            'countTrend'
           ));
        }

   /********************************************************************************************/

   /*****************************for business***************************************************/

           public function business(){
             $categories = Category::orderBy('created_at', 'desc')->paginate(10);

             $featuredPosts = DB::table('post_your_ads')
                   ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                   ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address', 'my_contacts.website')
                   ->orderBy('created_at', 'desc')
                   ->where([
                     ["verified", "=", 'Yes'],
                     ["status", "=",11]
                   ])->paginate(1);
             $countFeat = postYourAd::orderBy('created_at', 'desc')->where("status", "=",0)->count();
                /** get newest **/
             $oldestPosts = DB::table('post_your_ads')
                   ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                   ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address')
                   ->orderBy('created_at', 'asc')->where("status", "=",0)->paginate(1);
             $lastCount = DB::table('post_your_ads')
                         ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                         ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address')
                         ->orderBy('created_at', 'desc')->where("status", "=",0)->count();
       /*****************************************************************************************************************/
             $getContact =MyContact::orderBy('created_at', 'desc')->first();
             /**************** trending *****************************************************/
             $trendings = DB::table('post_your_ads')
                   ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                     ->join('edit_infos', 'post_your_ads.user_id', '=', 'edit_infos.user_id')
                   ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address', 'my_contacts.website', 'edit_infos.name')
                   ->orderBy('created_at', 'desc')
                   ->where([
                     ["verified", "=", 'Yes'],
                     ["status", "=",11],/*******Featured*************/
                     ["trending", "=",14]

                   ])->paginate(40);
             /*******************************************************************************/

                       $countTrend = DB::table('post_your_ads')
                             ->join('my_contacts', 'post_your_ads.user_id', '=', 'my_contacts.user_id')
                               ->join('edit_infos', 'post_your_ads.user_id', '=', 'edit_infos.user_id')
                             ->select('post_your_ads.*', 'my_contacts.phone', 'my_contacts.address', 'my_contacts.website', 'edit_infos.name')
                             ->orderBy('created_at', 'desc')
                             ->where([
                               ["verified", "=", 'Yes'],
                               ["status", "=",11],
                               //["trending", "=",14]

                             ])->count();
             /******************************************************************************/
             return view('ads.business', compact(
               'categories',
               'featuredPosts',
               'countFeat',
               'getContact',
               'oldestPosts',
               'lastCount',
               'trendings',
               'countTrend'
              ));
           }
   /**********************************************************************************************/


/***************End Tag***********************************************************/
}
