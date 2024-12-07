<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'email', 'password'];

    public function company()
    {
        return $this->hasOne(Company::class);
    }

    public function companyInformation()
    {
        return $this->hasOneThrough(CompanyInformation::class, Company::class);
    }
}
