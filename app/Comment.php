<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  protected $fillable = [
  'feedback',
  'slug',
  'post_id',
  'user_id',
  'logo',
  'name'

  ];
  // Table Name
  protected $table = 'comments';
  // Primary Key
  public $primaryKey = 'id';
  // Timestamps
  public $timestamps = true;
}
