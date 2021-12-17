<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable =[
        'product_name',
        'product_desc',       
        'product_content',
        'product_price',
        'product_img',
        'category_id',
        'brand_id',
        'product_status',
    ];
    protected $primaryKey = 'product_id';
   // protected $primarykey = 'product_id';
    public function category(){
        return $this->belongsTo('App\Models\CategoryModel','category_id','category_id');
    }
    public function brand(){
        return $this->belongsTo('App\Models\BrandModel','brand_id','brand_id');
    }
}
