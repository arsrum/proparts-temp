<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'orders';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'order_no',
        'user_id',
        'address_id',
        'status_id',
        'quantity',
        'price',
        'generic_article',
        'article_no',
        'brand_no',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public static function boot()
    {

        parent::boot();


                static::creating(function($model){
                    $random_code = null;
                    while($random_code === null){
                        $tmp_random_code = rand(100000, 999999);
                        if(!self::where('order_no', $tmp_random_code)->count()){
                            $random_code = $tmp_random_code;
                        }
                    }
                    $model->order_no = $random_code;
                    $model->status_id = 1;

                });
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
