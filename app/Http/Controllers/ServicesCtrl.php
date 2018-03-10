<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Purifier;
use App\EditInfo;
use App\About;
use App\postYourAd;
use App\Services;
use App\Category;
use Illuminate\Support\Facades\File;
use Auth;
use Illuminate\Support\Facades\Input;
use \Crypt;
use DB;

class ServicesCtrl extends Controller
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
               $this->validate($request, [
              'services' => 'required|string|',

         ]);

  /**********************************************************/
  $decrypt_id = Crypt::decrypt($request->input('user_id'));
  $basics =Services::where('user_id', '=', $decrypt_id)->first();
 if ($basics === null)
 {

            $validateForm = new Services;
            $validateForm->services = Purifier::clean($request->input('services'));
            $validateForm->user_id= Crypt::decrypt($request->input('user_id'));
            $validateForm->email = Crypt::decrypt(Input::get('email'));
            $validateForm->save();
            return back()->with('success','Profile info saved successfully!');

           }
          else{
            DB::table('services')
                ->where('user_id','=', $decrypt_id)
                  ->update([
                    'services' => $services = Purifier::clean($request->input('services')),

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
      $about = Services::find($decrypt_id);
      $posts = postYourAd::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->paginate(10);
      $categories = Category::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->paginate(10);
      $profile = EditInfo::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->first();
      $banner = About::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->first();
      $services = Services::orderBy('created_at', 'desc')->where("user_id", "=", Auth::user()->id)->first();
      return view('editProfile.editServices', compact('about', 'posts', 'categories', 'profile','banner', 'services'));
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
           'services' => 'required|string|',

        ]);

        $decrypt_id = Crypt::decrypt($id);
        $validateForm = Services::find($decrypt_id);
        $validateForm->services = Purifier::clean($request->input('services'));
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
