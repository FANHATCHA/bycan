<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\File;
use Auth;
use Illuminate\Support\Facades\Input;
use \Crypt;

class CategoryCtrl extends Controller
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
      $randGenerator = rand(1, 10000000);
      $adStatus = 0;
      $referenceOps = $randGenerator;
      $this->validate($request, [
     'categoryTitle' => 'required|string|max:255',
     'categoryImage' => 'required|nullable|mimes:png,jpeg,gif,jpg|max:1999'
    ]);

    $slugTitle = $request->input('categoryTitle');
    $endSlug = str_slug($slugTitle , '-');

    $check =Category::orderBy('created_at', 'desc')
    ->where("category_slug", "=",$endSlug)
    ->count();

    if ($check > 0) {
      $slugTitle = $request->input('categoryTitle');
      $endSlug = str_slug($slugTitle , '-');
      $slug = $endSlug.'-'.$referenceOps;}

      else {
        $slugTitle = $request->input('categoryTitle');
        $endSlug = str_slug($slugTitle , '-');
        $slug = $endSlug;
      }

      // Handle File Upload
  if($request->hasFile('categoryImage')){
    // Get filename with the extension
    $filenameWithExt = $request->file('categoryImage')->getClientOriginalName();
    // Get just filename
    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
    // Get just ext
    $extension = $request->file('categoryImage')->getClientOriginalExtension();
    // Filename to store
    $fileNameToStore= $filename.'_'.time().'.'.$extension;
    // Upload Image
    //$path = $request->file('slider_image')->storeAs('public/img', $fileNameToStore);
    $path = $request->file('categoryImage')->move('img/categoryImage/', $fileNameToStore);
  } else {
    $fileNameToStore = 'noimage.jpg';

  }
  //Using eloquent a laravel library to insert our data into database
     $validateForm = new Category;
     $validateForm->categoryTitle = $request->input('categoryTitle');
     $validateForm->categoryImage = $fileNameToStore;
     $validateForm->user_id= Crypt::decrypt($request->input('user_id'));
     $validateForm->email = Crypt::decrypt(Input::get('email'));
     $validateForm->category_slug = $slug;
     $validateForm->save();
     return back()->with('success','Category saved successfully!');

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
      $validateForm = Category::find($id);
      // Delete IMage
      File::delete('img/categoryImage'.$validateForm->categoryImage);
      $validateForm->delete();
      return back()->with('error','Category deleted successfully !');
    }
}
