<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandModel extends Model
{
    use HasFactory;
    protected $table = 'brand';
    protected $primaryKey = 'brand_id';
    //protected $primarykey = '';
    protected $fillable =[
        'brand_name',
        'brand_desc',
        'brand_stauts',
    ];   
    public function product(){
        return $this->hasMany('App\Models\ProductModel','brand_id');
    }
}
