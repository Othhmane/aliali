<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    use HasFactory;
protected $table = 'livraisons';
    protected $fillable = [
        'tracking','order_id','first_name','family_name','contact_phone','adress','to_wilaya_name','to_commune_name','product_list','price','delivery_fee','last_status'
    ];

    public function livraisons()
    {
        return $this->hasMany(Order::class);
    }

}

