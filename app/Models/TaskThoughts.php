<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class taskthoughts extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'details', 'actiontaken'];
}
