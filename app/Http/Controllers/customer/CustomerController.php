<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\admin\Banner;
use App\Models\admin\Blog;
use App\Models\admin\Category;
use App\Models\admin\Discount;
use App\Models\admin\Tour;
use App\Models\customer\Comments;
use App\Models\customer\Favorites;
use App\Models\customer\Order_detail;
use App\Models\customer\Orders;
use App\Models\customer\Ratings;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index(Tour $tours, Request $request, Blog $slug)
    {
        $category = Category::where('status',1)->limit(4)->get();
        //slug
        if ($request->has('slug')) {
            $find_id_cate = Category::where('slug', $request->slug)->first();
            //lấy id của cate
            $cate_tour = $tours->getCateTourByID($find_id_cate->id);
        } else {
            $cate_tour = Tour::where('status', 1)->get();
        }

        // all tour
        $tour = Ratings::join('tour', 'tour.id', '=', 'ratings.id_tour')
                        ->join('category', 'category.id', '=', 'tour.category_id')
                        ->select('tour.*','ratings.rating_star','category.name as nameCate')
                        ->where('ratings.rating_star', '>=', 4)
                        ->get();
        $tour_found = count($tour);
        if(Auth::guard('customer')->check()){
            $favorite=Favorites::where('id_customer','=',Auth::guard('customer')->user()->id,)->get();
        }else{
            $favorite=[];
        }

        //comment
        $comment = Comments::join('customer', 'customer.id', '=', 'comments.id_customer')
            ->select('comments.*', 'customer.name as commentName', 'customer.avatar as commentImage')
            ->where('comments.status', '=', '1')
            ->get();

        //blog
        $blog = Blog::leftjoin('Admin', 'Admin.id', 'Blog.admin_id')
                    ->leftjoin('Customer', 'Customer.id', 'Blog.customer_id')
                    ->select('Customer.name as customer_name', 'Customer.avatar as customer_avt', 'Admin.name as admin_name', 'Admin.avatar as admin_avt', 'Blog.*')
                    ->where('Blog.who_accept', '!=', 'null')
                    ->limit(3)
                    ->get();
        $rating=[];
        $arr = [];
        foreach ($cate_tour as $key => $value) {
            $arr[$value->category_id] = $value->category_id;
        }
        foreach($tour as $toursVal){
            $rate=Ratings::where('id_tour','=',$toursVal->id)->avg('Ratings.rating_star');
            $rating[$toursVal->id]=$rate;
        }
        $review=[];
        foreach($tour as $toursVal){
            $r=Comments::where('id_tour','=',$toursVal->id)->count();
            $review[$toursVal->id]=$r;
        }
        $priceMin=Tour::orderBy('price','asc')->first();
        $priceMin=$priceMin->price;
        $priceMax=Tour::orderBy('price','desc')->first();
        $priceMax=$priceMax->price;
        $price=[];
        $price[1]=$priceMin;
        $price[2]=$priceMax;
        return view('customer.pages.home', compact('category','arr','review','rating', 'favorite', 'cate_tour', 'tour', 'comment', 'blog'))->with(compact('price'))
        ->with(compact('priceMin'))
        ->with(compact('priceMax'));
    }

}
