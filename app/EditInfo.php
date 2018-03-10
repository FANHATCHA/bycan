<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EditInfo extends Model
{
  protected $fillable = [
 'name',
 'tagline',
 'name_slug',
 'logo',
 'email',
 'user_id',

 ];
 // Table Name
 protected $table = 'edit_infos';
 // Primary Key
 public $primaryKey = 'id';
 // Timestamps
 public $timestamps = true;
}
