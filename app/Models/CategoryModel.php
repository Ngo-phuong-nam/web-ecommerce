<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $primaryKey = 'category_id';
    protected $fillable =[
        'category_name',
        'category_desc',
        'category_stauts',
    ];
    public function product(){
        return $this->hasMany('App\Models\ProductModel','category_id');
    }
}
