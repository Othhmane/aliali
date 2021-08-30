<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // use HasFactory;
    // protected $table = 'orders';
    // protected $fillable = [
    //     'number','first_name','last_name','total_formatted','payment_method_title','phone','email','address_1','address_2','city'
    // ];
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'number','first_name','last_name','total_formatted','payment_method_title','phone','email','address_1','address_2','city',
    ];
  
    public function orders()
    {
        return $this->belongsTo(livraison::class);
    }





}
