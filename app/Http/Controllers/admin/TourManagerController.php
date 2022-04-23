<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Admin;
use App\Models\admin\Tour;
use App\Models\admin\Category;
use App\Models\admin\Vehicle;
use App\Models\admin\Hotel;
use App\Models\customer\Ratings;
use App\Models\customer\Comments;
use App\Models\customer\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\admin\tour\CreateTourRequest;
use App\Http\Requests\admin\tour\EditTourRequest;
use App\Models\admin\Service;
use App\Models\customer\Order_detail;
use App\Models\customer\Orders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use function PHPUnit\Framework\isNull;

class TourManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        
        $rating=[];
        $tours=Tour::all();
        foreach($tours as $toursVal){
                    $rate=Ratings::where('id_tour','=',$toursVal->id)->avg('Ratings.rating_star');
                    $rating[$toursVal->id]=$rate;
        }
        $review=[];
        foreach($tours as $toursVal){
                    $r=Ratings::where('id_tour','=',$toursVal->id)->count('Ratings.rating_star');
                    $review[$toursVal->id]=$r;
        }
    
        $cate=Category::all();
        $vehicle=Vehicle::all();
        $time='asc';
        if($request->has('filterTime')){
            $filterTime=$request->filterTime;
            $time=$request->filterTime;
        }else{
            $filterTime='any';
        }

        if($request->has('filterCate')){
            $filterCate=$request->filterCate;
        }else{
            $filterCate='all';
        }

        if($request->has('filterVehicle')){
            $filterVehicle=$request->filterVehicle;
        }else{
            $filterVehicle='all';
        }

        if($time=='any'){
            $time='asc';
        }

        $search_value='';
        if($request->has('search')){
            $search_value=$request->search;
            if($filterCate!='all'){
                
                if($filterVehicle!='all'){
                    $tour = Tour::where('category_id','=',$filterCate)->where('vehicle_id','=',$filterVehicle)->where('id','!=','0')->where('status','!=','2')->where('name','like','%'.$request->search.'%')
                                    ->orderBy('created_at',$time)->paginate(4);
                }else{
                    $tour = Tour::where('category_id','=',$filterCate)->where('id','!=','0')->where('status','!=','2')->where('name','like','%'.$request->search.'%')
                                    ->orderBy('created_at',$time)->paginate(4);
                }
            }else{
                if($filterVehicle!='all'){
                    $tour = Tour::where('vehicle_id','=',$filterVehicle)->where('id','!=','0')->where('status','!=','2')->where('name','like','%'.$request->search.'%')
                                    ->orderBy('created_at',$time)->paginate(4);
                }else{
                    $tour = Tour::where('id','!=','0')->where('status','!=','2')->where('name','like','%'.$request->search.'%')
                                    ->orderBy('created_at',$time)->paginate(4);
                }
            }
        }else{
            if($filterCate!='all'){
                
                if($filterVehicle!='all'){
                    $tour = Tour::where('category_id','=',$filterCate)->where('vehicle_id','=',$filterVehicle)->where('id','!=','0')->where('status','!=','2')
                                    ->orderBy('created_at',$time)->paginate(4);
                }else{
                    $tour = Tour::where('category_id','=',$filterCate)->where('id','!=','0')->where('status','!=','2')
                                    ->orderBy('created_at',$time)->paginate(4);
                }
            }else{
                if($filterVehicle!='all'){
                    $tour = Tour::where('vehicle_id','=',$filterVehicle)->where('id','!=','0')->where('status','!=','2')
                                    ->orderBy('created_at',$time)->paginate(4);
                }else{
                    $tour = Tour::where('id','!=','0')->where('status','!=','2')
                                    ->orderBy('created_at',$time)->paginate(4);
                }
            }
        }
       
      
           
        return view('admin.pages.tour.list')->with(compact('tour'))->with(compact('rating'))->with(compact('review'))->with(compact("cate"))->with(compact('vehicle'))
        ->with(compact('filterTime'))->with(compact('filterCate'))->with(compact('filterVehicle'))->with(compact('search_value'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $cate=Category::all();
        $service = Service::all();
        $vehicle=Vehicle::all();
        $hotel=Hotel::all();
        return view('admin.pages.tour.create',compact('cate','service','vehicle','hotel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTourRequest $request)
    {   
        $desPhoto=[];
        $tour=Tour::all();
            // $check=0;
            $code=rand(100000,999999);
        //     foreach($tour as $value){
        //         if($value['tour_code']==$code){
        //             $check=1;
        //         }
        //     }
        // }while($check==0);
        $image = $request->image;
        $photo = $request->des_photos;
        $nameimg = $image->getClientOriginalName();
        $image->move(public_path('customers/images'),$nameimg);
        foreach($photo as $value){
            $namephoto = $value->getClientOriginalName();
            $value->move(public_path('customers/images'),$namephoto);
            array_push($desPhoto,$namephoto);
        }

        //get vehicle_id
        $vehicle_array = [];
        $vehicle = $request->vehicle;
        foreach ($vehicle as $key => $value) {
            array_push($vehicle_array,$value);
        }
        $list_vehicle = json_encode($vehicle_array,true);
        //get_service_id
        $service_array = [];
        foreach ($request->service as $key => $value) {
            array_push($service_array,$value);
        }
        $list_service = json_encode($service_array,true);
        if(Auth::user()->role=='admin'||Auth::user()->role=='manager'){
            $add = Tour::create([
                'name'=>$request->name,
                'distant'=>$request->distant,
                'from'=>$request->from,
                'to'=>$request->to,
                'time'=>$request->time,
                'image'=>$nameimg,
                'des_photos'=>json_encode($desPhoto),
                'slug'=>Str::slug($request->name).'-'.Str::random(20),
                'map'=>$request->map,
                'address'=>$request->address,
                'price'=>$request->price,
                'description'=>$request->description,
                'limit'=>$request->limit,
                'ordered'=>0,
                'status'=>$request->status,
                'category_id'=>$request->category,
                'vehicle_id'=>$list_vehicle,
                'hotel_id'=>$request->hotel,
                'tour_code'=>$code,
                'service'=>$list_service,
            ]);
        }else{
            $add = Tour::create([
                'name'=>$request->name,
                'from'=>$request->from,
                'distant'=>$request->distant,
                'to'=>$request->to,
                'time'=>$request->time,
                'image'=>$nameimg,
                'des_photos'=>json_encode($desPhoto),
                'slug'=>Str::slug($request->name).'-'.Str::random(20),
                'map'=>$request->map,
                'address'=>$request->address,
                'price'=>$request->price,
                'description'=>$request->description,
                'limit'=>$request->limit,
                'ordered'=>0,
                'category_id'=>$request->category,
                'vehicle_id'=>$list_vehicle,
                'hotel_id'=>$request->hotel,
                'tour_code'=>$code,
                'service'=>$list_service,
            ]);
        }
        if($add){
            return redirect()->route('tour.create')->with('add_success','New Product Was Added');
        }else{
            return redirect()->route('tour.create')->with('error','Errors when add tour');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tour=Tour::find($id);
        $review=Ratings::where('id_tour','=',$id)->count('Ratings.rating_star');
        $rating=Ratings::where('id_tour','=',$id)->avg('Ratings.rating_star');
        $rates[]=[];
        for($i=1;$i<=5;$i++){
            $rate=Ratings::where('id_tour','=',$id)->where('rating_star','>',($i-0.5))->where('rating_star','<=',($i+0.5))->count('Ratings.rating_star');
            if(!empty($review)){
                $rates[$i]=$rate/$review*100;
            }else{
                $rates[$i]=0;
            }
        }
        $comment=Comments::leftjoin('Customer','Comments.id_customer','=','Customer.id')
                        ->leftjoin('Tour','Comments.id_tour','=','Tour.id')
                        ->leftjoin('Ratings','Ratings.id_customer','=','Customer.id')
                        ->select('Customer.name as customer_name','Customer.avatar as avatar','Tour.name as tour_name','Ratings.rating_star as star','Comments.*')
                        ->where('Comments.id_tour','=',$id)
                        ->orderBy('created_at','desc')
                        ->paginate(4);
        $check_reply = Reply::all();
        $show_reply = 'all';
        // foreach ($check_reply as $key => $value) {
        //     if ($value->customer_reply == null) {
        //         $reply=Reply::join('Admin','Reply.admin_reply','=','Admin.id')
        //             ->join('Comments','Reply.reply_to','=','Comments.id')
        //             ->select('Admin.avatar as admin_avatar','Admin.id as admin_id','Admin.name as admin_name','Reply.*')
        //             ->where('Reply.type','tour')
        //             ->orderBy('created_at','asc')->get();
        //         $show_reply = 'customer';
        //     }
        //     if ($value->admin_reply == null) {
        //         $reply=Reply::join('Customer','Reply.customer_reply','=','Customer.id')         
        //             ->join('Comments','Reply.reply_to','=','Comments.id')
        //             ->select('Customer.avatar as customer_avatar','Customer.id as customer_id','Customer.name as customer_name','Reply.*')
        //             ->where('Reply.type','tour')
        //             ->orderBy('created_at','asc')->get();
        //         $show_reply = 'admin';
        //     }
        // }
        // if ($show_reply == 'all') {
        //     $reply=Reply::join('Admin','Reply.admin_reply','=','Admin.id')
        //                 ->join('Customer','Reply.customer_reply','=','Customer.id')         
        //                 ->join('Comments','Reply.reply_to','=','Comments.id')
        //                 ->select('Admin.avatar as admin_avatar','Customer.avatar as customer_avatar','Admin.id as admin_id','Customer.id as customer_id','Admin.name as admin_name','Customer.name as customer_name','Reply.*')
        //                 ->where('Reply.type','tour')
        //                 ->orderBy('created_at','asc')->get();
        // }
        $admin=Admin::all();
        $reply=(Reply::join('Admin','Reply.admin_reply','=','Admin.id')
                    ->join('Comments','Reply.reply_to','=','Comments.id')
                    ->select('Admin.avatar as admin_avatar','Admin.id as admin_id','Admin.name as admin_name','Reply.*')
                    ->where('Reply.type','tour')
                    ->orderBy('created_at','asc')->get())
                    ->merge(
                        Reply::join('Customer','Reply.customer_reply','=','Customer.id')         
                                    ->join('Comments','Reply.reply_to','=','Comments.id')
                                    ->select('Customer.avatar as customer_avatar','Customer.id as customer_id','Customer.name as customer_name','Reply.*')
                                    ->where('Reply.type','tour')
                                    ->orderBy('created_at','asc')->get()
                    );
                        
        return view('admin.pages.tour.show')->with(compact('tour'))->with(compact('rating'))->with(compact('review'))->with(compact('rates'))->with(compact('comment'))->with(compact('reply'))->with(compact('admin'))->with(compact('show_reply'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $cate=Category::all();
        $vehicle=Vehicle::all();
        $service=Service::all();
        $hotel = Hotel::all();
        $tour=Tour::find($id);
        return view('admin.pages.tour.edit',compact('cate','hotel','vehicle','service','tour'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditTourRequest $request, $id)
    {   
        if(Auth::user()->role=='admin'||Auth::user()->role=='manager'){
            $ordered_tour = Order_detail::where('id_tour',$id)->get();
            $count_ordered = count($ordered_tour);
            if ($count_ordered >0) {
                return redirect()->route('tour.index')->with('warning','Tour is ordering, Please do this function later');
            }else{
                $update=Tour::find($id);
                if(is_null($request->image)){
                    $nameimg=$update['image'];
                }else{
                    $image = $request->image;
                    $nameimg = $image->getClientOriginalName();
                    $image->move(public_path('customers/images'),$nameimg);
                }
                if($request->has('des_photos')){
                    $desPhoto=[];
                    $photo=$request->des_photos;
                    foreach($photo as $value){
                        $namept = $value->getClientOriginalName();
                        $value->move(public_path('customers/images'),$namept);
                        array_push($desPhoto,$namept);
                    }
                    $namephoto=json_encode($desPhoto);
                }else{
                    $namephoto=$update['des_photos'];
                }
                
                //get vehicle_id
                $vehicle_array = [];
                $vehicle = $request->vehicle;
                foreach ($vehicle as $key => $value) {
                    array_push($vehicle_array,$value);
                }
                $list_vehicle = json_encode($vehicle_array,true);
                $service_array = [];
                $service = $request->service;
                foreach ($service as $key => $value) {
                    array_push($service_array,$value);
                }
                $list_service = json_encode($service_array,true);
                $update->update([
                    'name'=>$request->name,
                    'from'=>$request->from,
                    'distant'=>$request->distant,
                    'to'=>$request->to,
                    'time'=>$request->time,
                    'image'=>$nameimg,
                    'des_photos'=>$namephoto,
                    'slug'=>Str::slug($request->name).'-'.Str::random(20),
                    'map'=>$request->map,
                    'address'=>$request->address,
                    'price'=>$request->price,
                    'description'=>$request->description,
                    'limit'=>$request->limit,
                    'ordered'=>0,
                    'category_id'=>$request->category,
                    'vehicle_id'=>$list_vehicle,
                    'hotel_id'=>$request->hotel,
                    'service'=>$list_service,
                ]);
               
                if($update){
                    return redirect()->route('tour.index')->with('edit_success','Tour Was Updated');
                }else{
                    return redirect()->route('tour.show',$id)->with('error','Can not update');
                }
            }
        }else{
            return redirect()->route('tour.show',$id)->with('error',"Can't edit, check your position");
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        if(Auth::user()->role=='admin'||Auth::user()->role=='manager'){
            $delete=Tour::find($id);
            $delete->update([
                "status"=>2
            ]);
            if($delete){
                return redirect()->route('tour.index')->with('delete_success','Deleted');
            }else{
                return redirect()->route('tour.show',$id)->with('error','Err');
            }
        }else{
            return redirect()->route('tour.show',$id)->with('error','Cant delete, check your position');
        }
    }
    
}
