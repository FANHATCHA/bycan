<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
  protected $fillable = [
  'socialMedia',
  'url',
  'email',
  'user_id',

  ];
  // Table Name
  protected $table = 'social_media';
  // Primary Key
  public $primaryKey = 'id';
  // Timestamps
  public $timestamps = true;
}
