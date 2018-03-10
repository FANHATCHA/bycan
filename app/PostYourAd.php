<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostYourAd extends Model
{
  protected $fillable = [
 'typeOfAd',
 'adTitle',
 'adImage',
 'ad_slug',
 'status',
 'verified',
 'describeAd',
 'trending',
 'email',
 'user_id',

 ];
 // Table Name
 protected $table = 'post_your_ads';
 // Primary Key
 public $primaryKey = 'id';
 // Timestamps
 public $timestamps = true;

     /*public function contacts()
      {
          return $this->hasOne(MyContact::class);
      }*/


}
