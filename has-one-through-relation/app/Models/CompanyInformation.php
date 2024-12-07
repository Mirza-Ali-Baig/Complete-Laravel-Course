<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyInformation extends Model
{
    use HasFactory;

    protected $fillable = ['company_id', 'address', 'phone', 'website'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
