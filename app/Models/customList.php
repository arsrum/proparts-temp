<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customList extends Model
{
    use HasFactory;
    protected $table = "custom_list";
    protected $fillable = [
        'manuId',
        'manuName',
        'manuImg'
    ];
}
