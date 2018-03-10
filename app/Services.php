<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{

    protected $fillable = [
    'services',
    'email',
    'user_id',

    ];
    // Table Name
    protected $table = 'services';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;
}
