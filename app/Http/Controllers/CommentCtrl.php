<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Crypt;
use App\Comment;

class CommentCtrl extends Controller
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
      $this->validate($request, [
     'feedback' => 'required|string|max:500',
      ]);
      $validateForm = new Comment;
      $validateForm->feedback = $request->input('feedback');
      $validateForm->user_id= Crypt::decrypt($request->input('user_id'));
      $validateForm->slug= Crypt::decrypt($request->input('slug'));
      $validateForm->name= Crypt::decrypt($request->input('name'));
      $validateForm->logo= Crypt::decrypt($request->input('logo'));
      $validateForm->post_id= Crypt::decrypt($request->input('post_id'));
      $validateForm->save();
      return back()->with('success','Feedback saved successfully!');
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
