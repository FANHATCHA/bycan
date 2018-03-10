<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $fillable = [
 'categoryTitle',
 'categoryImage',
 'category_slug',
 'email',
 'user_id',

 ];
 // Table Name
 protected $table = 'add_categories';
 // Primary Key
 public $primaryKey = 'id';
 // Timestamps
 public $timestamps = true;
}
