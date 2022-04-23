<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\customer\Orders;
use App\Models\admin\Payments;
use Carbon\Carbon;
use App\Models\customer\Order_detail;
use SebastianBergmann\Environment\Console;
use Illuminate\Support\Facades\DB;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $time='asc';
        if($request->has('filterTime')){
            $filterTime=$request->filterTime;
            $time=$request->filterTime;
        }else{
            $filterTime='any';
        }
        if($time=='any'){
            $time='asc';
        }
        $price='desc';

        if($request->has('filterPrice')){
            $filterPrice=$request->filterPrice;
            $price=$request->filterPrice;
        }else{
            $filterPrice='any';
        }
        if($price=='any'){
            $price='desc';
        }
        if($request->has('filterStatus')){
            $filterStatus=$request->filterStatus;
           
        }else{
            $filterStatus='4';
        }
        if($request->has('filterMethod')){
            $filterMethod=$request->filterMethod;
        }else{
            $filterMethod='all';
        }

        $search_value='';
        if($request->has('search')){
            $search_value=$request->search;
            if($filterStatus!='4'){
                
                if($filterMethod!='all'){
                
                    $list_order= Orders::join('Customer','Orders.id_customer','=','Customer.id')
                    ->join('Order_detail','Order_detail.id_order','=','Orders.id')
                    ->join('Tour','Order_detail.id_tour','=','Tour.id')
                    ->join('Payments','Order_detail.id_payment','=','Payments.id')
                    ->select('Orders.id as order_id','Orders.status as status','Customer.name as customer_name','Customer.email as email','Tour.name as tour','Payments.method as payment','Order_detail.*')
                    ->where('Orders.status','=',$filterStatus)
                    ->where('Payments.method','=',$filterMethod)
                    ->where('Customer.name','like','%'.$request->search.'%')
                    ->orderBy('Order_detail.total_price',$price)
                    ->orderBy('Orders.created_at',$time)
                    ->paginate(10);
                }else{
                
                    $list_order= Orders::join('Customer','Orders.id_customer','=','Customer.id')
                    ->join('Order_detail','Order_detail.id_order','=','Orders.id')
                    ->join('Tour','Order_detail.id_tour','=','Tour.id')
                    ->join('Payments','Order_detail.id_payment','=','Payments.id')
                    ->select('Orders.id as order_id','Orders.status as status','Customer.name as customer_name','Customer.email as email','Tour.name as tour','Payments.method as payment','Order_detail.*')
                    ->where('Customer.name','like','%'.$request->search.'%')
                    ->where('Orders.status','=',$filterStatus)
                    ->orderBy('Order_detail.total_price',$price)
                    ->orderBy('Orders.created_at',$time)
                    ->paginate(10);
                }
            }else{
                if($filterMethod!='all'){
                
                    $list_order= Orders::join('Customer','Orders.id_customer','=','Customer.id')
                    ->join('Order_detail','Order_detail.id_order','=','Orders.id')
                    ->join('Tour','Order_detail.id_tour','=','Tour.id')
                    ->join('Payments','Order_detail.id_payment','=','Payments.id')
                    ->select('Orders.id as order_id','Orders.status as status','Customer.name as customer_name','Customer.email as email','Tour.name as tour','Payments.method as payment','Order_detail.*')
                    ->where('Customer.name','like','%'.$request->search.'%')
                    ->where('Payments.method','=',$filterMethod)
                    ->orderBy('Order_detail.total_price',$price)
                    ->orderBy('Orders.created_at',$time)
                    ->paginate(10);
                }else{
                
                    $list_order= Orders::join('Customer','Orders.id_customer','=','Customer.id')
                    ->join('Order_detail','Order_detail.id_order','=','Orders.id')
                    ->join('Tour','Order_detail.id_tour','=','Tour.id')
                    ->join('Payments','Order_detail.id_payment','=','Payments.id')
                    ->where('Customer.name','like','%'.$request->search.'%')
                    ->select('Orders.id as order_id','Orders.status as status','Customer.name as customer_name','Customer.email as email','Tour.name as tour','Payments.method as payment','Order_detail.*')
                    ->orderBy('Order_detail.total_price',$price)
                    ->orderBy('Orders.created_at',$time)
                    ->paginate(10);
                }
            }
        }else{
            if($filterStatus!='4'){
                
                if($filterMethod!='all'){
                
                    $list_order= Orders::join('Customer','Orders.id_customer','=','Customer.id')
                    ->join('Order_detail','Order_detail.id_order','=','Orders.id')
                    ->join('Tour','Order_detail.id_tour','=','Tour.id')
                    ->join('Payments','Order_detail.id_payment','=','Payments.id')
                    ->select('Orders.id as order_id','Orders.status as status','Customer.name as customer_name','Customer.email as email','Tour.name as tour','Payments.method as payment','Order_detail.*')
                    ->where('Orders.status','=',$filterStatus)
                    ->where('Payments.method','=',$filterMethod)
                    ->orderBy('Order_detail.total_price',$price)
                    ->orderBy('Orders.created_at',$time)
                    ->paginate(10);
                }else{
                
                    $list_order= Orders::join('Customer','Orders.id_customer','=','Customer.id')
                    ->join('Order_detail','Order_detail.id_order','=','Orders.id')
                    ->join('Tour','Order_detail.id_tour','=','Tour.id')
                    ->join('Payments','Order_detail.id_payment','=','Payments.id')
                    ->select('Orders.id as order_id','Orders.status as status','Customer.name as customer_name','Customer.email as email','Tour.name as tour','Payments.method as payment','Order_detail.*')
                    ->where('Orders.status','=',$filterStatus)
                    ->orderBy('Order_detail.total_price',$price)
                    ->orderBy('Orders.created_at',$time)
                    ->paginate(10);
                }
            }else{
                if($filterMethod!='all'){
                
                    $list_order= Orders::join('Customer','Orders.id_customer','=','Customer.id')
                    ->join('Order_detail','Order_detail.id_order','=','Orders.id')
                    ->join('Tour','Order_detail.id_tour','=','Tour.id')
                    ->join('Payments','Order_detail.id_payment','=','Payments.id')
                    ->select('Orders.id as order_id','Orders.status as status','Customer.name as customer_name','Customer.email as email','Tour.name as tour','Payments.method as payment','Order_detail.*')
                    ->where('Payments.method','=',$filterMethod)
                    ->orderBy('Order_detail.total_price',$price)
                    ->orderBy('Orders.created_at',$time)
                    ->paginate(10);
                }else{
                
                    $list_order= Orders::join('Customer','Orders.id_customer','=','Customer.id')
                    ->join('Order_detail','Order_detail.id_order','=','Orders.id')
                    ->join('Tour','Order_detail.id_tour','=','Tour.id')
                    ->join('Payments','Order_detail.id_payment','=','Payments.id')
                    ->select('Orders.id as order_id','Orders.status as status','Customer.name as customer_name','Customer.email as email','Tour.name as tour','Payments.method as payment','Order_detail.*')
                    ->orderBy('Order_detail.total_price',$price)
                    ->orderBy('Orders.created_at',$time)
                    ->paginate(10);
                }
            }
        }
        $method=Payments::all();
        return view('admin.pages.order.list')->with(compact('list_order'))->with(compact('method'))->with(compact('filterTime'))->with(compact('filterPrice'))->with(compact('filterStatus'))->with(compact('filterMethod'))->with(compact('search_value'));
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
    public function store(Request $request)
    {
            $filter=$request->filter;
            if($filter=='any'){
                $list_order= Orders::join('Customer','Orders.id_customer','=','Customer.id')
                ->join('Order_detail','Order_detail.id_order','=','Orders.id')
                ->join('Tour','Order_detail.id_tour','=','Tour.id')
                ->join('Payments','Order_detail.id_payment','=','Payments.id')
                ->select('Orders.id as order_id','Orders.status as status','Customer.name as customer_name','Customer.email as email','Tour.name as tour','Payments.method as payment','Order_detail.*')
                ->paginate(10);
                
                
            }elseif($filter=='asc'||$filter=='desc'){
                $list_order= Orders::join('Customer','Orders.id_customer','=','Customer.id')
                ->join('Order_detail','Order_detail.id_order','=','Orders.id')
                ->join('Tour','Order_detail.id_tour','=','Tour.id')
                ->join('Payments','Order_detail.id_payment','=','Payments.id')
                ->select('Orders.id as order_id','Orders.status as status','Customer.name as customer_name','Customer.email as email','Tour.name as tour','Payments.method as payment','Order_detail.*')
                ->orderBy('Orders.created_at',$filter)
                ->paginate(10);
              
            }
        
        return view('admin.pages.order.list')->with(compact('list_order'))->with(compact('filter'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $order= Order_detail::join('Customer','Order_detail.id_customer','=','Customer.id')
        ->join('Orders','Order_detail.id_order','=','Orders.id')
        ->join('Tour','Order_detail.id_tour','=','Tour.id')
        ->join('Payments','Order_detail.id_payment','=','Payments.id')
        ->select('Tour.tour_code as tour_code','Customer.address as customer_address','Orders.count_adults as adults','Orders.count_children as children','Customer.phone','Orders.time as deadtime','Orders.id as order_id','Orders.status as status','Customer.name as customer_name','Customer.email as email','Tour.name as tour','Payments.method as payment','Order_detail.*','Order_detail.created_at as created')
        ->first();
        $time = Carbon::create($order->created)->addDay($order->deadtime);
        // dd($time);
        return view('admin.pages.order.detail')->with(compact('order'))->with(compact('time'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $edit = Orders::find($id);
        $edit->update([
            'status'=>$request->status
        ]);
            return redirect()->route('order.show',$id)->with('success','status has changed');;
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
