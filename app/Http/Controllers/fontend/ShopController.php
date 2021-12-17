<?php

namespace App\Http\Controllers\fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductModel;
use Cart;

class ShopController extends Controller
{
    //
    public function shopCategory()
    {
        return view('user.shop.shopCategory.index');
    }
    public function productDetails(Request $request)
    {
        $productId = $request->product_id;
        $product = ProductModel::where('product_id', $productId)
            ->leftJoin('category', 'category.category_id', '=', 'product.category_id')
            ->leftJoin('brand', 'brand.brand_id', '=', 'product.brand_id')
            ->select(
                'brand.brand_name',
                'category.category_name',
                'product.product_name',
                'product.product_price',
                'product.product_content',
                'product.product_desc',
                'product.product_img'
            )
            ->get();
        return view('user.shop.productDetails.index')->with('product', $product);
        //return view('user.shop.productDetails.index');
    }
    public function productCheckout()
    {
        return view('user.shop.productCheckout.index');
    }
    public function confirmation()
    {
        return view('user.shop.confirmation.index');
    }
    public function shoppingCart()
    {
        return view('user.shop.shoppingCart.index');
    }
    public function addToCard(Request $request)
    {
        $productID = $request->productid_hidden;
        $quantity = $request->qty;
        $product_info =  ProductModel::where('product_id', $productID)->first();
        $data['id'] = $product_info->product_id;
        $data['name'] = $product_info->product_name;
        $data['id'] = $product_info->product_id;
        $data['id'] = $product_info->product_id;
        $data['id'] = $product_info->product_id;
        $data['id'] = $product_info->product_id;
        Cart::add($data);
        return view('user.shop.shoppingCart.index');
    }
}
