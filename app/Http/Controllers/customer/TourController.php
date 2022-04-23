<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\admin\Category;
use App\Models\customer\Ratings;
use App\Models\customer\Favorites;
use App\Models\admin\Hotel;
use App\Models\admin\Admin;
use App\Models\admin\Feedback;
use App\Models\admin\Service;
use App\Models\customer\Comments;
use App\Models\customer\Reply;
use App\Models\admin\Tour;
use App\Models\admin\Vehicle;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function tour_shop(Request $request){
        $tours=Tour::where('status',1)->paginate(4);
        $rating=[];
        foreach($tours as $toursVal){
                    $rate=Ratings::where('id_tour','=',$toursVal->id)->avg('Ratings.rating_star');
                    $rating[$toursVal->id]=$rate;
        }
        $review=[];
        foreach($tours as $toursVal){
            $r=Comments::where('id_tour','=',$toursVal->id)->count();
            $review[$toursVal->id]=$r;
        }
        $total_rate_per_star=[];
        for($i=1;$i<=5;$i++){
            $total_rate_per_star[$i]=0;
        }
        foreach($tours as $toursVal){
                $rate=Ratings::where('id_tour','=',$toursVal->id)->avg('Ratings.rating_star');
                for($i=1;$i<=5;$i++){
                    if($rate>0 && $rate<=1){
                        $total_rate_per_star[1]=$total_rate_per_star[1]+1;
                    }elseif($rate>($i-1) && $rate<=$i){
                        $total_rate_per_star[$i]=$total_rate_per_star[$i]+1;
                    }
                }
        }
        $total_tour_per_cate=[];
        $cate=Category::all();
        foreach($cate as $cate){
            $c=Tour::where('status',1)->where('category_id','=',$cate->id)->count('Tour.name');
            $total_tour_per_cate[$cate->id]=$c;
        }
        $vehicle=Vehicle::all();
        $tour=Tour::where('status',1)->where('name','!=','0');

        $departure='';
        if($request->has("departure")){
            if($request->departure!=''){
                $tour=$tour->where('from','like','%'.$request->departure.'%');
                $departure=$request->departure;
            }
        }
        $name='';
        if($request->has("name")){
            if($request->name!=''){
                $tour=$tour->where('name','like','%'.$request->name.'%');
                $name=$request->name;
            }
        }
        $destination='';
        if($request->has("destination")){
            if($request->destination!=''){
                $tour=$tour->where('to','like','%'.$request->destination.'%');
                $destination=$request->destination;
            }
        }
        $time=0;
        if($request->has("time")){
            $time=$request->time;
            if($request->time!=0){
                $tour=$tour->where('time','=',$request->time);
            }
        }
        $priceMin=Tour::where('status',1)->orderBy('price','asc')->first();
        $priceMin=$priceMin->price;
        $priceMax=Tour::where('status',1)->orderBy('price','desc')->first();
        $priceMax=$priceMax->price;
        $price=[];
        $price[1]=$priceMin;
        $price[2]=$priceMax;
        if($request->has("price")){
            $price = explode('$',str_replace(' ','',str_replace('-','',$request->price)));
            $tour=$tour->where('price','<=',$price[2])->where('price','>=',$price[1]);
        }
        $fillRate=[];
        if($request->has("rate5")){
            $fillRate[5]=5;
            $rate5='checked';
        }
        else{
            $rate5='';
        }

        if($request->has("rate4")){
            $fillRate[4]=4;
            $rate4='checked';
        }
        else{
            $rate4='';
        }

        if($request->has("rate3")){
            $fillRate[3]=3;
            $rate3='checked';
        }

        else{
            $rate3='';
        }

        if($request->has("rate2")){
            $fillRate[2]=2;
            $rate2='checked';
        }

        else{
            $rate2='';
        }

        if($request->has("rate1")){
            $fillRate[1]=1;
            $rate1='checked';
        }
        else{
            $rate1='';
        }

        if((empty($request->rate5) ==true) && (empty($request->rate4) ==true) &&(empty($request->rate3)==true) &&(empty($request->rate2)==true) &&(empty($request->rate1)==true) ){
            $rate5='checked';
            $rate4='checked';
            $rate3='checked';
            $rate2='checked';
            $rate1='checked';
        }
        $cate=Category::all();
        $category=[];
        if($request->has('cate')){
            foreach($cate as $Cate){
                $checkCate = 0;
                foreach($request->cate as $value){
                    if($Cate->id==$value){
                        $checkCate=$checkCate+1;
                    }
                    $category[$value]=$value;
                }
                if($checkCate==0){

                    $tour=$tour->where('category_id','!=',$Cate->id);
                }
            }
        }
        if(Auth::guard('customer')->check()){
            $favorite=Favorites::where('id_customer','=',Auth::guard('customer')->user()->id,)->get();
        }else{
            $favorite=[];
        }
        if($request->has("sorted")){
            $sorted=$request->sorted;
            if($request->sorted==1){
                $tour=$tour->orderBy('limit','DESC')->paginate(5);
            }elseif($request->sorted==2){
                $tour=$tour->orderBy('created_at','DESC')->paginate(5);
            }elseif($request->sorted==3){
                $tour=$tour->orderBy('price','ASC')->paginate(5);
            }elseif($request->sorted==4){
                $tour=$tour->orderBy('price','DESC')->paginate(5);
            }elseif($request->sorted==5){
                $tour=$tour->orderBy('Tour.name','ASC')->paginate(5);
            }
        }else{
            $tour=$tour->paginate(5);
            $sorted=1;
        }
        if($request->has('Y')){

            $scroll=$request->Y;
        }else{
            $scroll=0;
        }

        return view('customer.pages.tour_shop')
        ->with(compact('tour'))
        ->with(compact('rating'))
        ->with(compact('review'))
        ->with(compact('cate'))
        ->with(compact('vehicle'))
        ->with(compact('total_rate_per_star'))
        ->with(compact('total_tour_per_cate'))
        ->with(compact('time'))
        ->with(compact('destination'))
        ->with(compact('departure'))
        ->with(compact('category'))
        ->with(compact('rate5'))
        ->with(compact('rate4'))
        ->with(compact('rate3'))
        ->with(compact('rate2'))
        ->with(compact('rate1'))
        ->with(compact('favorite'))
        ->with(compact('price'))
        ->with(compact('priceMin'))
        ->with(compact('priceMax'))
        ->with(compact('sorted'))
        ->with(compact('fillRate'))
        ->with(compact('scroll'));
    }


    public function tour_detail(Request $request,$slug){

        $sub_rating=[];
        $tours=Tour::all();
        foreach($tours as $toursVal){
                    $rate=Ratings::where('id_tour','=',$toursVal->id)->avg('Ratings.rating_star');
                    $sub_rating[$toursVal->id]=$rate;
        }
        $sub_review=[];
        foreach($tours as $toursVal){
                    $r=Comments::where('id_tour','=',$toursVal->id)->count();
                    $sub_review[$toursVal->id]=$r;
        }
        $tour=Tour::where('slug',$slug)->first();
        $review=Comments::where('id_tour','=',$tour->id)->count();
        $rating=Ratings::where('id_tour','=',$tour->id)->avg('ratings.rating_star');
        $rates[]=[];
        for($i=1;$i<=5;$i++){
            $rate=Ratings::where('id_tour','=',$tour->id)->where('rating_star','>',($i-0.5))->where('rating_star','<=',($i+0.5))->count('ratings.rating_star');
            if(!empty($review)){
                $rates[$i]=$rate/$review*100;
            }else{
                $rates[$i]=0;
            }
        }
        if($request->has('total_comment_now')){
            $total_comment=$request->total_comment_now + 2;

        }else{
            $total_comment=2;
        };
        $all_comment=Comments::join('customer','comments.id_customer','=','customer.id')
                                ->join('ratings','ratings.id_customer','=','customer.id')
                                ->join('tour','ratings.id_tour','=','tour.id')
                                ->select('customer.name as customer_name','customer.avatar as avatar','tour.name as tour_name','ratings.rating_star as star','comments.*')
                                ->where('ratings.id_tour','=',$tour->id)
                                ->where('comments.id_tour','=',$tour->id)
                                ->orderBy('created_at','desc')
                                ->get();
        $comment=Comments::join('customer','comments.id_customer','=','customer.id')
                    ->join('ratings','ratings.id_customer','=','customer.id')
                    ->join('tour','ratings.id_tour','=','tour.id')
                    ->select('customer.name as customer_name','customer.avatar as avatar','tour.name as tour_name','ratings.rating_star as star','comments.*')
                    ->where('ratings.id_tour','=',$tour->id)
                    ->where('comments.id_tour','=',$tour->id)
                    ->orderBy('created_at','desc')
                    ->limit($total_comment)->get();
        $check_reply = Reply::all();
        $show_reply = 'all';


        $reply=(Reply::join('Admin','Reply.admin_reply','=','Admin.id')
                    ->join('Comments','Reply.reply_to','=','Comments.id')
                    ->select('Reply.admin_reply as who_reply','Admin.avatar as admin_avatar','Admin.id as admin_id','Admin.name as admin_name','Reply.*')
                    ->where('Reply.type','tour')
                    ->orderBy('created_at','asc')->get())
                    ->merge(
                        Reply::join('Customer','Reply.customer_reply','=','Customer.id')
                                    ->join('Comments','Reply.reply_to','=','Comments.id')
                                    ->select('Reply.customer_reply as who_reply','Customer.avatar as customer_avatar','Customer.id as customer_id','Customer.name as customer_name','Reply.*')
                                    ->where('Reply.type','tour')
                                    ->orderBy('created_at','asc')->get()
                    );
        $admin=Admin::all();
        $service=json_decode($tour->service);
        $services=Service::where('id','!=','0');
        for($i=0;$i<count($service);$i++){
            if($i==0){
                $services=$services->where('id','=',$service[$i]);
            }else{
                $services=$services->orWhere('id','=',$service[$i]);
            }
        }
        $services=$services->get();


       $vehicle=json_decode($tour->vehicle_id);
        $vehicles=Vehicle::where('id','!=','0');
        for($i=0;$i<count($vehicle);$i++){
            if($i==0){
                $vehicles=$vehicles->where('id','=',$vehicle[$i]);
            }else{
                $vehicles=$vehicles->orWhere('id','=',$vehicle[$i]);
            }
        }
        // dd($comment);
        $QnA = Feedback::where('admin_id','!=','null')->limit(5)->get();
        $sub_tour = Tour::all()->take(3);
        // dd($sub_review);
        $vehicles=$vehicles->get();
        if(Auth::guard('customer')->check()){

            $favorite=Favorites::where('id_customer','=',Auth::guard('customer')->user()->id,)->get();
        }else{
            $favorite=[];
        }
        if($request->has('Y')){

            $scroll=$request->Y;
        }else{
            $scroll=0;
        }
        if(Auth::guard("customer")->check()){

            $check_rated = Ratings::where('id_customer',Auth::guard('customer')->user()->id)->where('id_tour',$tour->id)->orderBy('created_at','desc')->first();
        }else{
            $check_rated='';
        }
        return view('customer.pages.tour_detail')->with(compact('tour'))->with(compact('favorite'))->with(compact('sub_rating'))->with(compact('sub_review'))->with(compact('sub_tour'))->with(compact('rating'))->with(compact('review'))->with(compact('rates'))->with(compact('comment'))->with(compact('reply'))->with(compact('admin'))->with(compact('services'))->with(compact('vehicles'))->with(compact('QnA'))->with(compact('all_comment'))->with(compact('scroll'))->with(compact('check_rated'));
    }
}
