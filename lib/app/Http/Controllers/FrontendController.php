<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;

class FrontendController extends Controller
{
    public function index(){
        $data['featured'] = Product::where('pro_featured',1)
                            ->orderby('pro_id','desc')
                            ->take(8)
                            ->get();

        $data['new'] = Product::orderby('pro_id','desc')
                       ->take(8)
                       ->get();
        return view('frontend.home',$data);
    }

    public function detailProduct($id){
        $data['comments'] = Comment::where('com_pro',$id)->get();
        $data['item'] = Product::find($id);
        return view('frontend.details', $data);
    }

    public function getCategory($id){
        $data['catename'] = Category::find($id);
        $data['items'] = Product::where('pro_cate',$id)
                                ->orderby('pro_id','desc')
                                ->paginate(8);
        return view('frontend.category',$data);
    }

    public function postComment(Request $request, $id){
        $commnet = new Comment;
        $commnet->com_email = $request->email;
        $commnet->com_name = $request->name;
        $commnet->comm_content = $request->content;
        $commnet->com_pro = $id;
        $commnet->save();
        return back();
    }
}
