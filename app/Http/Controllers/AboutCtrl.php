<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Purifier;
use App\EditInfo;
use App\Category;
use App\About;
use App\postYourAd;
use Illuminate\Support\Facades\File;
use Auth;
use Illuminate\Support\Facades\Input;
use \Crypt;
use DB;


class AboutCtrl extends Controller
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
    /*  $randGenerator = rand(1, 1000000000);
      $adStatus = 0;
      $referenceOps = $randGenerator;*/
               $this->validate($request, [
              'about' => 'required|string|',
              'banner' => 'nullable|mimes:png,jpeg,gif,jpg|max:1999',

         ]);

         // Handle File Upload
     if($request->hasFile('banner')){
       // Get filename with the extension
       $filenameWithExt = $request->file('banner')->getClientOriginalName();
       // Get just filename
       $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
       // Get just ext
       $extension = $request->file('banner')->getClientOriginalExtension();
       // Filename to store
       $fileNameToStore= $filename.'_'.time().'.'.$extension;
       // Upload Image
       $path = $request->file('banner')->move('img/banner/', $fileNameToStore);
     } else {
       $fileNameToStore = 'default-banner.jpg';
     }
  /**********************************************************/
  $decrypt_id = Crypt::decrypt($request->input('user_id'));
  $basics =About::where('user_id', '=', $decrypt_id)->first();
 if ($basics === null)
 {

            $validateForm = new About;
            $validateForm->banner = $fileNameToStore;
            $validateForm->about = Purifier::clean($request->input('about'));
            $validateForm->user_id= Crypt::decrypt($request->input('user_id'));
            $validateForm->email = Crypt::decrypt(Input::get('email'));
            $validateForm->save();
            return back()->with('success','Profile info saved successfully!');

          }
          else{
            DB::table('abouts')
                ->where('user_id','=', $decrypt_id)
                  ->update([
                    'banner' => $banner= $fileNameToStore,
                    'about' => $about = Purifier::clean($request->input('about')),

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
     $about = About::find($decrypt_id);
     $posts = postYourAd::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->paginate(10);
     $categories = Category::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->paginate(10);
     $profile = EditInfo::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->first();
     $banner = About::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->first();
     return view('editProfile.editAbout', compact('about', 'posts', 'categories', 'profile','banner'));
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

               $this->validate($request, [
              'about' => 'required|string|',
              'banner' => 'nullable|mimes:png,jpeg,gif,jpg|max:1999',

         ]);

         // Handle File Upload
     if($request->hasFile('banner')){
       // Get filename with the extension
       $filenameWithExt = $request->file('banner')->getClientOriginalName();
       // Get just filename
       $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
       // Get just ext
       $extension = $request->file('banner')->getClientOriginalExtension();
       // Filename to store
       $fileNameToStore= $filename.'_'.time().'.'.$extension;
       // Upload Image
       $path = $request->file('banner')->move('img/banner/', $fileNameToStore);
     } else {
       $fileNameToStore = 'default-banner.jpg';
     }
  /**********************************************************/
  $decrypt_id = Crypt::decrypt($id);
  $validateForm = About::find($decrypt_id);
    if($request->hasFile('banner')){
               $validateForm->banner = $fileNameToStore;
         }

            //$validateForm = new About;
            $validateForm->banner = $fileNameToStore;
            $validateForm->about = Purifier::clean($request->input('about'));
            //$validateForm->user_id= Crypt::decrypt($request->input('user_id'));
            //$validateForm->email = Crypt::decrypt(Input::get('email'));
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
