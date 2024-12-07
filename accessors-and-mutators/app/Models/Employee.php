<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Number;

class Employee extends Model
{
    use HasFactory;
    protected $guarded = [];


    protected function getNameAttribute($value): string
    {
        return ucwords($value);
    }
    protected function getEmailAttribute($value): string
    {
        return strtolower($value);
    }
    protected function getDobAttribute($value): string
    {
        return Carbon::parse($value)->format('D M Y');
    }

    protected function getSalaryAttribute($value): string
    {
        return Number::currency($value);
    }
}
