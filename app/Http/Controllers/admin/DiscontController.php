<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Discount;
use App\Models\admin\Tour;
use App\Http\Requests\admin\discount\AddDiscountRequest;
use App\Http\Requests\admin\discount\EditDiscountRequest;
use App\Models\customer\Customer;

class DiscontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('keyword')) {
            $keyword = $request->keyword;
            if ($request->has('condition')) {
                $condition = $request->condition;
                if ($condition == 'all') {
                    $discount = Discount::join('Tour','Tour.id','Discount_code.id_tour')
                                         ->select('Tour.name as tour_name','Discount_code.*')
                                         ->where('Discount_code.name','like',"%$keyword%")
                                         ->paginate(5);
                }elseif ($condition=='desc' || $condition == 'asc') {
                    $discount = Discount::join('Tour','Tour.id','Discount_code.id_tour')
                                           ->select('Tour.name as tour_name','Discount_code.*')
                                           ->where('Discount_code.name','like',"%$keyword%")
                                           ->orderBy('Discount_code.created_at',$condition)
                                           ->paginate(5);
                }
            }else{
                $discount = Discount::join('Tour','Tour.id','Discount_code.id_tour')
                                    ->select('Tour.name as tour_name','Discount_code.*')
                                    ->where('Discount_code.name','like',"%$keyword%")
                                    ->paginate(5);
            }
        }else {
            if ($request->has('condition')) {
                $condition = $request->condition;
                if ($condition == 'all') {
                    $discount = Discount::join('Tour','Tour.id','Discount_code.id_tour')
                                         ->select('Tour.name as tour_name','Discount_code.*')
                                         ->paginate(5);
                }elseif ($condition=='desc' || $condition == 'asc') {
                    $discount = Discount::join('Tour','Tour.id','Discount_code.id_tour')
                                           ->select('Tour.name as tour_name','Discount_code.*')
                                           ->orderBy('Discount_code.created_at',$condition)
                                           ->paginate(5);
                }
            }else{
                $discount = Discount::join('Tour','Tour.id','Discount_code.id_tour')
                                    ->select('Tour.name as tour_name','Discount_code.*')
                                    ->paginate(5);
            }
        }
        return view('admin.pages.discount.list',compact('discount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tour = Tour::all();
        return view('admin.pages.discount.create',compact('tour'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddDiscountRequest $request)
    {
       Discount::create($request->only(
        'name',
        'percent_reduce',
        'limit',
        'time',
        'id_tour'
       ));
       return redirect()->route('discount.index')->with('add_success','Add Discount successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $discount_found = Discount::find($id);
        $who_will_receive = Customer::all();
        $old_customer = false;
        if(json_decode($discount_found->who,true) == null){
            $old_customer = false;
        }else{
            foreach ($who_will_receive as $value) {
                if (in_array($value->id,json_decode($discount_found->who,true))) {
                    $old_customer = true;
                }
            }
        }
        
        return view('admin.pages.discount.infor',compact('who_will_receive','old_customer','discount_found'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $discount_found = Discount::find($id);
        $tour = Tour::all();
        return view('admin.pages.discount.edit',compact('discount_found','tour'));
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
        $discount_found = Discount::find($id);
        if ($request->has('type')) {
            if ($request->who == []) {
                $update_who_receive_discount = $discount_found->update([
                    'who'=>'null'
                ]);
                if ($update_who_receive_discount) {
                    return redirect()->back()->with('add_success',"Update who'll receive discount successfully");
                }
            }else{
                $who_fr_ip = [];
                foreach ($request->who as $value) {
                    array_push($who_fr_ip,$value);                    
                }
                $who = json_encode($who_fr_ip);
                $update_who_receive_discount = $discount_found->update([
                    'who'=>$who
                ]);
                if ($update_who_receive_discount) {
                    return redirect()->back()->with('add_success','Added discount to customer you chosen');
                }
            }
        }else{
            $discount_found->update($request->only(
                'name',
                'percent_reduce',
                'limit',
                'time',
                'id_tour'
            ));
            return redirect()->route('discount.index')->with('edit_success','Update Discount successfully');
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
        $discount_found = Discount::find($id);
        $delete_discount =$discount_found->delete($id);
        if($delete_discount){
            return redirect()->back()->with('delete_success','Delete Discount successfully');
        }else{
            echo "Loi r";
        }
    }
}
