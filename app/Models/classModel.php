<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classModel extends Model
{
    use HasFactory;
    protected $fillable= [
        'class_name',
        // 'subject_type',
        'status',
    ];
}
