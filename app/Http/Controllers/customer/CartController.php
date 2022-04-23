<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\admin\Banner;
use App\Models\admin\Discount;
use App\Models\admin\Hotel;
use App\Models\admin\Service;
use App\Models\admin\TourGuide;
use App\Models\admin\Vehicle;
use App\Models\customer\Cart;
use App\Models\customer\Cart_detail;
use App\Models\customer\Order_detail;
use App\Models\customer\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart(){
        if(!Auth::guard('customer')->check()){
            return redirect()->route('customer.login')->with('error',"You need to login first");
            exit;
        }
        $cart=Cart_detail::join('Customer','Cart_detail.id_customer','=','Customer.id')
        ->join('Cart','Cart_detail.id_cart','=','Cart.id')
        ->join('Tour','Cart_detail.id_tour','=','Tour.id')
        ->join('Payments','Cart_detail.id_payment','=','Payments.id')
        ->select('Cart.id as cart_id','Tour.image as tour_image','Tour.time as travel_time','Tour.tour_code as tour_code','Customer.address as customer_address','Cart.count_adults as adults','Cart.count_children as children','Customer.phone','Cart.time as deadtime','Cart.id as order_id','Customer.name as customer_name','Customer.email as email','Tour.name as tour','Payments.method as payment','Cart_detail.*','Cart_detail.created_at as created')
        ->where('Customer.id','=',Auth::guard('customer')->user()->id)
        ->get();

        $code=Discount::all();
        $vehicle=Vehicle::all();
        $service=Service::all();
        $tour_guide=TourGuide::all();
        $tour_guides = TourGuide::join('order_detail','order_detail.id_tour_guild','=','tour_guide.id')
                            ->join('orders','order_detail.id_order','=','orders.id')->select('tour_guide.id as id')->where('orders.status','=','1')->get();
        $hotel=Hotel::all();
        $cart_banner = Banner::where('page','=','cart')->first();

        return view('customer.pages.cart')
        ->with(compact('cart'))
        ->with(compact('cart_banner'))
        ->with(compact('service'))
        ->with(compact('code'))
        ->with(compact('vehicle'))
        ->with(compact('hotel'))
        ->with(compact('tour_guide'))
        ->with(compact('tour_guides'));
    }
    public function delete_cart($id){
        $cart_detail=Cart_detail::where('id_cart','=',$id)->first()->delete();
        $cart=Cart::find($id)->delete();
        return redirect()->back();

    }
    public function add_order(Request $request){
    //    dd($request);
        if($request->check == []){
            return redirect()->back();
            exit;
        }
        foreach($request->check as $value){
            $cart=Cart::find($value);
            $cart_detail=Cart_detail::where('id_cart','=',$cart->id)->first();
            $order= Orders::create([
                'id_customer'=>Auth::guard('customer')->user()->id,
                'address'=>$cart->address,
                'country'=>$cart->country,
                'city'=>$cart->city,
                'time'=>$cart->time,
                'price'=>$cart->price,
                'status'=>0,
                'count_adults'=>$cart->count_adults,
                'count_children'=>$cart->count_children,
            ]);
            $order_detail=Order_detail::create([
                'id_customer'=>Auth::guard('customer')->user()->id,
                'id_tour'=>$cart_detail->id_tour,
                'id_payment'=>$cart_detail->id_payment,
                'id_discount'=>$cart_detail->id_discount,
                'id_order'=>$order->id,
                'id_vehicle'=>$cart_detail->id_vehicle,
                'id_tour_guild'=>$cart_detail->id_tour_guild,
                'hotel_id'=>$cart_detail->hotel_id,
                'id_service'=>$cart_detail->id_service,
                'total_price'=>$cart_detail->total_price
            ]);
            if($order){
                if($order_detail){
                    $cart_detail->delete();
                    $cart->delete();
                }
            }
        }
        return redirect()->back();
    }
}
