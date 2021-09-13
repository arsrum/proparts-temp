<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    public $table = 'products';
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'user_id',
        'manu_id',
        'modelId',
        'typeId',
        'oe_number',
        'oem_number'
    ];

    // $table->string('manu_id')->nullable();
    // $table->string('modelId')->nullable();
    // $table->string('typeId')->nullable();
    
    // $table->string('oe_number')->nullable();
    // $table->string('oem_number')->nullable();
}
