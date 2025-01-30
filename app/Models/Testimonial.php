<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory,HasUuids;

    protected $fillable = [
        'testimony',
        'testifier_img',
        'testifier_job',
        'testifier'
    ];
}
