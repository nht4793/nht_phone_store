<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Cart;
use Mail;

class CartController extends Controller
{
    public function getAddCart($id){
        $product = Product::find($id);
        Cart::add([ 'id' => $id,
                    'name' => $product->pro_name,
                    'sl' =>$product->pro_quality,
                    'qty' => 1,
                    'price' => $product->pro_price,
                    'options' => ['img' => $product->pro_img]]);
        return redirect('cart/show');
    }

    public function showCart(){
        $data['total'] = Cart::total();
        $data['items'] = Cart::content();
        return view('frontend.cart',$data);
    }

    public function getUpdateCart(Request $request){
        Cart::update($request->rowId, $request->qty);
    }

    public function tangCart($id){
        $product = Cart::get($id);
        $qty = $product->qty + 1;
        Cart::update($id,$qty);
        return back();
    }

    public function giamCart($id){
        $product = Cart::get($id);
        $qty = $product->qty - 1;
        Cart::update($id,$qty);
        return back();
    }

    public function getDeleteCart($id){
        if($id == 'all'){
            Cart::destroy();
        }else{
            Cart::remove($id);
        }
        return back();
    }



    public function postComplete(Request $request){
        $data['info'] = $request->all();
        $data['cart'] = Cart::content();
        $data['total'] = Cart::total();
        $email = $request->email;
        $name = $request->name;
        $sl = Cart::content();
        return view('frontend.email');
        // foreach ($sl as $item){
        //     $product = Product::find($item->id);
        //     $product->pro_quality = $product->pro_quality - $item->qty;
        //     $product->save();
        // }

        // Mail::send('frontend.email', $data, function ($message) use ($email, $name) {
        //     $message->from('thonhps12285@gmail.com', 'NHT | mobile shop');
        //     $message->to($email,$name);
        //     $message->subject('Xác nhận hóa đơn mua hàng!');
        // });
        // Cart::destroy();
        // return redirect('cart/complete');
    }

    public function getcomplete(){
        return view('frontend.complete');
    }
}
