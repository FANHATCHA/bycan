<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyContact extends Model
{
  protected $fillable = [
  'phone',
  'contactEmail',
  'website',
  'address',
  'email',
  'user_id',

  ];
  // Table Name
  protected $table = 'my_contacts';
  // Primary Key
  public $primaryKey = 'id';
  // Timestamps
  public $timestamps = true;

 /*public function posts()
  {
      return $this->hasMany(PostYourAd::class, 'user_id')->whereNull('user_id');
  }*/
}
