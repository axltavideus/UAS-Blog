<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Specify the table if it's not the plural of the model name
    protected $table = 'posts';

    // Specify the attributes that are mass assignable
    protected $fillable = ['title', 'summary', 'content', 'recommended'];
}
