<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Purifier;
/*use App\EditInfo;
use App\Category;*/
use App\MyContact;
use App\SocialMedia;
use Illuminate\Support\Facades\File;
use Auth;
use Illuminate\Support\Facades\Input;
use \Crypt;
use DB;

class SocialMediaCtrl extends Controller
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
    /*Decrypt*/
      $decrypt_n = Crypt::decrypt($request->input('n'));

      /*if n = 1  start*/
   if ($decrypt_n == 1) {
    $this->validate($request, [
        'phone' => 'required|string|max:225',
        'address' => 'required|string|max:500',
        'contactEmail' => 'required|string|email|max:225',
        "website" => "required|url",

        ]);
        $decrypt_id = Crypt::decrypt($request->input('user_id'));
        $basics = MyContact::where('user_id', '=', $decrypt_id)->first();
        if ($basics === null)
        {
                  $validateForm = new MyContact;
                  $validateForm->phone = $request->input('phone');
                  $validateForm->address = $request->input('address');
                  $validateForm->contactEmail = $request->input('contactEmail');
                  $validateForm->website = $request->input('website');
                  $validateForm->user_id= Crypt::decrypt($request->input('user_id'));
                  $validateForm->email = Crypt::decrypt(Input::get('email'));
                  $validateForm->save();
                  return back()->with('success','Info saved successfully!');

                }
                else{

                  DB::table('my_contacts')
                        ->where('user_id','=', $decrypt_id)
                        ->update([
                          'phone' => $request->input('phone'),
                          'address' => $request->input('address'),
                          'contactEmail' => $request->input('contactEmail'),
                          'website' => $request->input('website'),

                        ]);
                        return back()->with('info','Info updated successfully!');

                 }

   }
  /*if n = 1  end*/
/********************************************************************************/
    /*if n = 2  start*/
   elseif ($decrypt_n == 2) {

     $this->validate($request, [
   'socialMedia' => 'required|string|',
   "url" => "required|url",
   ]);
  $user = SocialMedia::where('socialMedia', '=', Input::get('socialMedia'))->first();
 if ($user === null)
 {
   //Using eloquent a laravel library to insert our data into database
   $validateForm = new SocialMedia;
   $validateForm->socialMedia = $request->input('socialMedia');
   $validateForm->url = Purifier::clean($request->input('url'));
   $validateForm->user_id= Crypt::decrypt($request->input('user_id'));
   $validateForm->email = Crypt::decrypt(Input::get('email'));
   $validateForm->save();
   return back()->with('success','url added successfully !');
 }
 else{
   DB::table('social_media')
         ->where('socialMedia','=', Input::get('socialMedia'))
         ->update([
           'url' => $request->input('url'),
           'socialMedia' => $request->input('socialMedia')
         ]);
         return back()->with('info','url updated successfully !');

 }
   }

     /*if n = 2  end*/
   else
   {
    return 'not allow';
   }

/***************************************************************************************/
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
        //
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
        //
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
