<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
//    protected $guarded = []; // The attributes that aren't mass assignable.
    // or
    protected $fillable = ['name', 'email', 'password']; // The attributes that are mass assignable.

}
