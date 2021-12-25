<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    protected $guarded = [];

    // Fillable fields
    protected $fillable = [
        'fullname', 'email', 'phonenumber', 'location'
    ];
}