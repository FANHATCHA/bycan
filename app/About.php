<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
  protected $fillable = [
  'banner',
  'about',
  'email',
  'user_id',

  ];
  // Table Name
  protected $table = 'abouts';
  // Primary Key
  public $primaryKey = 'id';
  // Timestamps
  public $timestamps = true;
}
