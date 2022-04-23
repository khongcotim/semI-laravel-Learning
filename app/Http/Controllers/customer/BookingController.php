<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\admin\Service;
use App\Models\admin\Tour;
use App\Models\admin\Vehicle;
use App\Models\customer\Customer;
use App\Models\customer\Ratings;
use App\Models\admin\Payments;
use Illuminate\Http\Request;
use  App\Http\Requests\customer\booking\BookingRequest;
use App\Models\admin\Discount;
use App\Models\admin\Hotel;
use App\Models\admin\TourGuide;
use App\Models\customer\Cart;
use App\Models\customer\Cart_detail;
use App\Models\customer\Order_detail;
use App\Models\customer\Orders;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      
        if(!Auth::guard('customer')->check()){
                return redirect()->route('customer.login');
                exit;
        }elseif(Auth::guard('customer')->user()->status==2){
            return redirect()->back()->with('error',"Your Account Has Been Banned");
            exit;
        }
        $tour_guides=TourGuide::join('order_detail','id_tour_guild','=','tour_guide.id')
                            ->join('orders','order_detail.id_order','=','orders.id')->where('orders.status','=','1')->get();
        $tour_guide=TourGuide::where('id','!=','0');
        foreach($tour_guides as $value){
            $tour_guide=$tour_guide->where('id','!=',$value->id);
        }
        $tour_guide= $tour_guide->get();
       $tour_guide_rate=[];
        foreach($tour_guide as $toursVal){
                    $rate=Ratings::where('id_tour_guide','=',$toursVal->id)->avg('Ratings.rating_star');
                    $tour_guide_rate[$toursVal->id]=$rate;
        }

       $rating=Ratings::where('id_tour','=',$request->tour)->avg('Ratings.rating_star');
       $review=Ratings::where('id_tour','=',$request->tour)->count('Ratings.rating_star');
       $tour = Tour::find($request->tour);
       $customer=Customer::find(Auth::guard('customer')->user()->id);
    //    $service=json_decode($tour->service);
    //     $services=Service::where('id','!=','0');
    //     for($i=0;$i<count($service);$i++){
    //         if($i==0){
    //             $services=$services->where('id','=',$service[$i]);
    //         }else{
    //             $services=$services->orWhere('id','=',$service[$i]);
    //         }
    //     }
    //     $services=$services->get();
        $services=Service::all();
        $vehicle=json_decode($tour->vehicle_id);
        $vehicles=Vehicle::where('id','!=','0');
        for($i=0;$i<count($vehicle);$i++){
            if($i==0){
                $vehicles=$vehicles->where('id','=',$vehicle[$i]);
            }else{
                $vehicles=$vehicles->orWhere('id','=',$vehicle[$i]);
            }
        }
        $vehicles=$vehicles->get();

        $payment=Payments::all();

        $discount=Discount::all();
        $code=Discount::where('id','!=','0')->get();
        foreach($discount as $value){
            $codeCheck=0;
            if($value->who!=null){
                foreach(json_decode($value->who) as $sub_value){
                    if($sub_value==Auth::guard('customer')->user()->id){
                        $codeCheck++;
                    }
                }

            }
            if($codeCheck!=0){
                $code->merge(Discount::where('id','=',$value->id)->get());
            }
        }
        // dd($code);
        $hotel=Hotel::where('address','like','%'.$tour->to.'%')->get();
        $adult = $request->adult;
        $children = $request->children;
        $infant = $request->infant;

        return view('customer.pages.booking')
        ->with(compact('tour'))
        ->with(compact('code'))
        ->with(compact('hotel'))
        ->with(compact('tour_guide'))
        ->with(compact('customer'))
        ->with(compact('rating'))
        ->with(compact('services'))
        ->with(compact('tour_guide_rate'))
        ->with(compact('vehicles'))
        ->with(compact('adult'))
        ->with(compact('children'))
        ->with(compact('infant'))
        ->with(compact('payment'))
        ->with(compact('review'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingRequest $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookingRequest $request, $id)
    {
        $customer=Customer::find(Auth::guard('customer')->user()->id);

        if($request->name==null){
            $name=$customer->name;
        }else{
            $name=$request->name;
        }
        if($request->id_card==null){
            $card=$customer->id_card;
        }else{
            $card=$request->id_card;
        }
        if($request->email==null){
            $email=$customer->email;
        }else{
            $email=$request->email;
        }
        if($request->phone==null){
            $phone=$customer->phone;
        }else{
            $phone=$request->phone;
        }
        if($request->address==null){
            $address=$customer->address;
        }else{
            $address=$request->address;
        }
        $bank[][]='';
        $bank_card=[];
        $bank_card['bank_card_name']=$request->bank_card_name;
        $bank_card['bank_card_number']=$request->bank_card_number;
        $bank_card['bank_card_month']=$request->bank_card_month;
        $bank_card['bank_card_year']=$request->bank_card_year;
        $bank[$request->payment]=$bank_card;

        $customer->update([
            'name'=>$name,
            'id_card'=>$card,
            'email'=>$email,
            'phone'=>$phone,
            'address'=>$address,
            'bank_card'=>json_encode($bank)
        ]);
        $tour=Tour::find($id);
        $price=(($request->adult*$tour->price)+($request->chilren*$tour->price/2)+($request->infant*$tour->price/10));
        $cart=Cart::create([
            'id_customer'=>Auth::guard('customer')->user()->id,
            'address'=>$tour->to,
            'country'=>$tour->to,
            'city'=>$tour->to,
            'time'=>$request->start_time,
            'price'=>$price,
            'count_adults'=>$request->adult,
            'count_children'=>$request->children+$request->infant,
        ]);
        $payment=Payments::where('method','=',$request->payment)->first();
        if($request->vehicle!=''){
            $sub_price=Vehicle::find($request->vehicle);
            if(strpos($sub_price->name,'bay')!=false||strpos($sub_price->name,'Bay')!=false){
                $price=$price+$sub_price->price*($request->adult+$request->children);
            }
            else{

            $price=$price+($sub_price->price*$tour->distant)*($request->adult+$request->children);}
        }
        if($request->tour_guide!=''){
            $sub_price=TourGuide::find($request->tour_guide);
            $price=$price+$sub_price->price;
        }
        if($request->hotel!=''){
            $sub_price=Hotel::find($request->hotel);
            $price=$price+$sub_price->price;
        }
        if($request->servicles!=[]){
            for($i=0;$i<count($request->servicles);$i++){
                $checkService=0;
                foreach(json_decode($tour->service) as $serviceTour){
                        if($request->servicles[$i]==$serviceTour){

                            $checkService++ ;
                        }
                }
                
                if($checkService == 0){
                    $sub_price=Service::find($request->servicles[$i]);
                    $price=$price+$sub_price->price;
                }
            }

        }
        $countpon=null;
        if($request->code!=null){
            $sub_price=Discount::where('name','=',$request->code)->first();
            if($sub_price!=null){
                $price=$price*(100-($sub_price->percent_reduce))/100;
                $countpon=$sub_price->id;
            }
        }

        $order_detail=Cart_detail::create([
            'id_customer'=>Auth::guard('customer')->user()->id,
            'id_tour'=>$id,
            'id_payment'=>$payment->id,
            'id_discount'=>$countpon,
            'id_cart'=>$cart->id,
            'id_vehicle'=>$request->vehicle,
            'id_tour_guild'=>$request->tour_guide,
            'hotel_id'=>$request->hotel,
            'id_service'=>json_encode($request->services),
            'total_price'=>$price
        ]);
        return redirect()->route('tour_shop');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
