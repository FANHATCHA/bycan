<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Purifier;
use App\PostYourAd;
use App\Category;
use App\EditInfo;
use App\About;
use App\Services;
use App\MyContact;
use App\SocialMedia;
use Illuminate\Support\Facades\File;
use Auth;
use Illuminate\Support\Facades\Input;
use \Crypt;
use Image;

class PostYourAdCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ads.postYourAd');

    }

    public function myAds()
    {
      $posts = PostYourAd::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->paginate(10);
      $categories = Category::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->paginate(10);
      $profile = EditInfo::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->first();
      $banner = About::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->first();
      return view('posts.myAds', compact('posts', 'categories', 'profile','banner'));

    }

    public function addCategory()
    {
      $categories = Category::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->paginate(10);
      $profile = EditInfo::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->first();
      $banner = About::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->first();
      return view('posts.postCategory', compact('categories', 'profile','banner'));

    }

    public function editProfile()
    {
      $posts = PostYourAd::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->paginate(10);
      $categories = Category::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->paginate(10);
      $profile = EditInfo::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->first();
      $banner = About::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->first();
      return view('posts.editProfile', compact('posts', 'categories', 'profile','banner'));

    }
    public function About()
    {
      $posts = PostYourAd::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->paginate(10);
      $categories = Category::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->paginate(10);
      $profile = EditInfo::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->first();
      $banner = About::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->first();
      return view('posts.aboutProfile', compact('posts', 'categories', 'profile','banner'));

    }


    public function Services()
    {
      $posts = PostYourAd::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->paginate(10);
      $categories = Category::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->paginate(10);
      $profile = EditInfo::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->first();
      $banner = About::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->first();
      $services = Services::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->first();
      return view('posts.services', compact('posts', 'categories', 'profile','banner', 'services'));

    }

    public function Contact()
    {
      $posts = PostYourAd::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->paginate(10);
      $categories = Category::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->paginate(10);
      $profile = EditInfo::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->first();
      $banner = About::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->first();
      $services = Services::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->first();
      $contacts = MyContact::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->first();
      $socialMedia = SocialMedia::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->paginate(10);
      return view('posts.contact', compact('posts', 'categories', 'profile','banner', 'services', 'contacts', 'socialMedia'));

    }
    public function changeStatus()
    {
      $posts = PostYourAd::orderBy('created_at', 'desc')->paginate(5);
      $categories = Category::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->paginate(10);
      $profile = EditInfo::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->first();
      $banner = About::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->first();
      return view('posts.change-status', compact('posts', 'categories', 'profile','banner'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $randGenerator = rand(1, 10000000);
       $adStatus = 0;
       $referenceOps = $randGenerator;
                $this->validate($request, [
               'typeOfAd' => 'required|string|max:255',
               'adTitle' => 'required|string|max:400',
               'adImage' => 'required|nullable|mimes:png,jpeg,gif,jpg|max:1999',
               'describeAd' => 'required|string|',
               /*'email' => 'required|email|max:255',
               'user_id' => 'required|integer',*/

          ]);

          $slugTitle = $request->input('adTitle');
          $endSlug = str_slug($slugTitle , '-');

          $check =PostYourAd::orderBy('created_at', 'desc')
          ->where("ad_slug", "=",$endSlug)
          ->count();

          if ($check > 0) {
            $slugTitle = $request->input('adTitle');
            $endSlug = str_slug($slugTitle , '-');
            $slug = $endSlug.'-'.$referenceOps;}

            else {
              $slugTitle = $request->input('adTitle');
              $endSlug = str_slug($slugTitle , '-');
              $slug = $endSlug;
            }

          // Handle File Upload
      if($request->hasFile('adImage')){
          		$avatar = $request->file('adImage');
          		$filename = time() . '.' . $avatar->getClientOriginalExtension();
          		Image::make($avatar)->resize(400, 400)->save( public_path('/img/adImage/' . $filename ) );
      } else {
        $filename = 'noimage.jpg';
      }

          //Using eloquent a laravel library to insert our data into database
             $isVerified = 'No';
             $isTrending = 1;
             $validateForm = new PostYourAd;
             $validateForm->typeOfAd = $request->input('typeOfAd');
             $validateForm->adTitle = $request->input('adTitle');
             $validateForm->adImage = $filename;
             $validateForm->verified = $isVerified;
             $validateForm->trending = $isTrending;
             $validateForm->describeAd = Purifier::clean($request->input('describeAd'));
             $validateForm->user_id= Crypt::decrypt($request->input('user_id'));
             $validateForm->email = Crypt::decrypt(Input::get('email'));
             $validateForm->ad_slug = $slug;
             $validateForm->status = $adStatus;
             $validateForm->save();
             return back()->with('success','Ad saved successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ad_slug)
    {
        return $ad_slug ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Auth $user)
    {
      /* post status
      0 ----> new Posts
      K(11) ----> Featured Posts
      O(12) ----> Mark as reset
      N------>mark as verified
      E(14)------>mark as trending ads
      F---> Mark as
      A----> to be removed
      */
    /*Oauth start*/
    if (Auth::user()->role_id == 1 ) {
        /*Decrypt*/
        $decrypt_n = Crypt::decrypt($request->input('status'));
       $decrypt_id = Crypt::decrypt($id);
/*********************Start switch***********************/
  if ($decrypt_n == 'K') {
       $setStatus = 11;
        $post = PostYourAd::orderBy('created_at', 'desc')->where('id', '=', $decrypt_id)->first();
        $post->status = $setStatus;
        $post->save();
        return back()->with('success','status changed successfully!');
  }
  elseif ($decrypt_n == 'O') {
    $setStatus = 12;
     $post = PostYourAd::orderBy('created_at', 'desc')->where('id', '=', $decrypt_id)->first();
     $post->status = $setStatus;
     $post->save();
     return back()->with('success','status changed successfully!');
  }
  elseif ($decrypt_n == 'N') {
    $setStatus = 'Yes';
     $post = PostYourAd::orderBy('created_at', 'desc')->where('id', '=', $decrypt_id)->first();
     $post->verified = $setStatus;
     $post->save();
     return back()->with('success','status changed successfully!');
  }
  elseif ($decrypt_n == 'E') {
    $setStatus = 14;
     $post = PostYourAd::orderBy('created_at', 'desc')->where('id', '=', $decrypt_id)->first();
     $post->trending = $setStatus;
     $post->save();
     return back()->with('success','status changed successfully!');
  }

  else {
    return back()->with('error','error not defined !');
  }

/*********************end switch***********************/

    }
     else {
      return 'Access denied !';
    }
/*Oauth end*/


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $validateForm = PostYourAd::find($id);
      // Delete IMage
      File::delete('img/adImage'.$validateForm->adImage);
      $validateForm->delete();
      return back()->with('error','Ad deleted successfully !');

    }


}
