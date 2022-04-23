<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\vehicle\addVehicleRequest;
use App\Http\Requests\admin\vehicle\editVehicleRequest;
use Illuminate\Http\Request;
use App\Models\admin\Vehicle;
use Illuminate\Support\Facades\Auth;
class VehicleController extends Controller
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
                    $vehicle = Vehicle::where('name','like',"%$keyword%")->where('status','!=','2')->paginate(5);
                }elseif ($condition=='desc' || $condition == 'asc') {
                    $vehicle= Vehicle::where('name','like',"%$keyword%")->orderBy('created_at',$condition)->paginate(5);
                }
            }else{
                $vehicle = Vehicle::where('name','like',"%$keyword%")->paginate(5);
            }
        }else{
            if ($request->has('condition')) {
                $condition = $request->condition;
                if ($condition == 'all') {
                    $vehicle = Vehicle::where('status','!=','2')->paginate(5);
                }elseif ($condition=='desc' || $condition == 'asc') {
                    $vehicle= Vehicle::orderBy('created_at',$condition)->paginate(5);
                }
            }else{
                $vehicle = Vehicle::paginate(5);
            }
        }
        return view('admin.pages.vehicle.list',compact('vehicle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.pages.vehicle.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(addVehicleRequest $request)
    {
        if(Auth::user()->role=='admin'||Auth::user()->role=='manager'){
            Vehicle::create($request->only('name','price','status'));
            return redirect()->route('vehicle.index')->with('add_success',"Add Vehicle successfull");
        }else{
            Vehicle::create([
                'name'=>$request->name,
                'price'=>$request->price,
            ]);
            return redirect()->route('vehicle.index')->with('error',"Can't add new, check your position");
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item_founded = Vehicle::find($id);
        return view('admin.pages.vehicle.edit',compact('item_founded'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(editVehicleRequest $request, $id)
    {
        if(Auth::user()->role=='admin'||Auth::user()->role=='manager'){
            $item_update = Vehicle::find($id);
            $item_update->update([
                'name'=>$request->name,
                'price'=>$request->price,
                'status'=>$request->status
            ]);
            return redirect()->route('vehicle.index')->with('edit_success','Edit Vehicle successfull');
        }else{
            $item_update = Vehicle::find($id);
            $item_update->update([
                'name'=>$request->name
            ]);
            return redirect()->route('vehicle.index')->with('edit_success','Edit Vehicle successfull');
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
            $item_founded = Vehicle::find($id);
            $delete_item = $item_founded->update([
                'status'=>2
            ]);
            if ($delete_item) {
                return redirect()->route('vehicle.index')->with('delete_success','Delete successfully');            
            }
        }else{
            return redirect()->route('vehicle.index')->with('error','Cant add new, check your position');          
        }
    }
}
