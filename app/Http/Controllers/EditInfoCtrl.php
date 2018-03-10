<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Purifier;
use App\EditInfo;
use App\Category;
use App\postYourAd;
use App\About;
use Illuminate\Support\Facades\File;
use Auth;
use Illuminate\Support\Facades\Input;
use \Crypt;
use DB;

class EditInfoCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
      /**********************************************************/
      $randGenerator = rand(1, 1000000000);
      $adStatus = 0;
      $referenceOps = $randGenerator;
               $this->validate($request, [
              'name' => 'required|string|max:500',
              'tagline' => 'required|string|max:500',
              'logo' => 'nullable|mimes:png,jpeg,gif,jpg|max:1999',

         ]);

         $slugTitle = $request->input('name');
         $endSlug = str_slug($slugTitle , '-');

         $check =EditInfo::orderBy('created_at', 'desc')
         ->where("name_slug", "=",$endSlug)
         ->count();

         if ($check > 0) {
           $slugTitle = $request->input('name');
           $endSlug = str_slug($slugTitle , '-');
           $slug = $endSlug.'-'.$referenceOps;}

           else {
             $slugTitle = $request->input('name');
             $endSlug = str_slug($slugTitle , '-');
             $slug = $endSlug;
           }

         // Handle File Upload
     if($request->hasFile('logo')){
       // Get filename with the extension
       $filenameWithExt = $request->file('logo')->getClientOriginalName();
       // Get just filename
       $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
       // Get just ext
       $extension = $request->file('logo')->getClientOriginalExtension();
       // Filename to store
       $fileNameToStore= $filename.'_'.time().'.'.$extension;
       // Upload Image
       //$path = $request->file('slider_image')->storeAs('public/img', $fileNameToStore);
       $path = $request->file('logo')->move('img/logo/', $fileNameToStore);
     } else {
       $fileNameToStore = 'default-user.png';
     }
  /**********************************************************/
  $decrypt_id = Crypt::decrypt($request->input('user_id'));
  $basics = EditInfo::where('user_id', '=', $decrypt_id)->first();
 if ($basics === null)
 {

            $validateForm = new EditInfo;
            $validateForm->name = $request->input('name');
            $validateForm->tagline = $request->input('tagline');
            $validateForm->logo = $fileNameToStore;
            //$validateForm->describeAd = Purifier::clean($request->input('describeAd'));
            $validateForm->user_id= Crypt::decrypt($request->input('user_id'));
            $validateForm->email = Crypt::decrypt(Input::get('email'));
            $validateForm->name_slug = $slug;
            //$validateForm->status = $adStatus;
            $validateForm->save();
            return back()->with('success','Profile info saved successfully!');

          }
          else{

            DB::table('edit_infos')
                  ->where('user_id','=', $decrypt_id)
                  ->update([
                    'logo' => $logo = $fileNameToStore,
                    'name' => $request->input('name'),
                    'tagline' => $request->input('tagline'),
                    //'tagline' => $request->input('tagline'),
                    'name_slug' => $name_slug = $slug,

                  ]);
                  return back()->with('info','Info updated successfully!');

           }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $decrypt_id = Crypt::decrypt($id);
      $about = EditInfo::find($decrypt_id);
      $posts = postYourAd::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->paginate(10);
      $categories = Category::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->paginate(10);
      $profile = EditInfo::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->first();
      $banner = About::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->first();
      return view('editProfile.editInfo', compact('about', 'posts', 'categories', 'profile','banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $randGenerator = rand(1, 1000000000);
      $adStatus = 0;
      $referenceOps = $randGenerator;
      $this->validate($request, [
        'name' => 'required|string|max:500',
        'tagline' => 'required|string|max:500',
        'logo' => 'nullable|mimes:png,jpeg,gif,jpg|max:1999',

        ]);
        $slugTitle = $request->input('name');
        $endSlug = str_slug($slugTitle , '-');

        $check =EditInfo::orderBy('created_at', 'desc')
        ->where("name_slug", "=",$endSlug)
        ->count();

        if ($check > 0) {
          $slugTitle = $request->input('name');
          $endSlug = str_slug($slugTitle , '-');
          $slug = $endSlug.'-'.$referenceOps;}

          else {
            $slugTitle = $request->input('name');
            $endSlug = str_slug($slugTitle , '-');
            $slug = $endSlug;
          }
               // Handle File Upload
           if($request->hasFile('logo')){
             // Get filename with the extension
             $filenameWithExt = $request->file('logo')->getClientOriginalName();
             // Get just filename
             $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
             // Get just ext
             $extension = $request->file('logo')->getClientOriginalExtension();
             // Filename to store
             $fileNameToStore= $filename.'_'.time().'.'.$extension;
             // Upload Image
             $path = $request->file('logo')->move('img/logo/', $fileNameToStore);
           } else {
             $fileNameToStore = 'default-user.png';
           }
        /**********************************************************/
        $decrypt_id = Crypt::decrypt($id);
        $validateForm = EditInfo::find($decrypt_id);
          if($request->hasFile('logo')){
                     $validateForm->logo = $fileNameToStore;
               }

               $validateForm->name = $request->input('name');
               $validateForm->tagline = $request->input('tagline');
               $validateForm->logo = $fileNameToStore;
               $validateForm->name_slug = $slug;
               $validateForm->save();
               return back()->with('info','Info updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
