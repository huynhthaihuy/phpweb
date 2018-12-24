<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['name', 'id_type', 'description','unit_price','promotion_price','image','unit','new','created_at','updated_at'];
    public function product_type(){
        return $this->belongsTo('App\ProductType','id_type','id');
    }
    public function bill_detail(){
        return $this->belongsTo('App\BillDetail','id_product','id');
        //khả năng lỗi
    }
    public function owns($resource)
    {   
        return $this->id == $resource->product_id;
    }
}
