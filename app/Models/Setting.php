<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table="settings";
    protected $fillable = [
        'company_name',
        'company_address',
        'company_email',
        'company_phone',
        'company_logo',
        'company_city',
        'company_zip_code',
        'company_country'

    ];
}
