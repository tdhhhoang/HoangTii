<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Cart;
session_start();

class CartController extends Controller

{
    public function save_cart(Request $request)
    {
        $productId=$request->productid_hidden;
        $quatity=$request->qty;
        $product_info=DB::table('tbl_product')->where('product_id',$productId)->first();
    	$cate_product=DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
    	$brand_product=DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

       /* Cart::add('293ad', 'Product 1', 1, 9.99, 550);*/

       $data['id']=$product_info->product_id;
       $data['qty']=$quatity;
       $data['name']=$product_info->product_name;
       $data['price']=$product_info->product_price;
       $data['weight']='123';
       $data['options']['image']=$product_info->product_image;
       Cart::add($data);

       return Redirect::to('/show-cart');
    	
    }
    public function show_cart()

    {
        $cate_product=DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        return view('pages.cart.show_cart')->with('category',$cate_product)->with('brand',$brand_product);
    }
}
