<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Category;
use App\Models\admin\Tour;
use App\Models\admin\Vehicle;
use App\Models\customer\Ratings;
use Illuminate\Http\Request;

class TourDeletedController extends Controller
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

        if($request->has('search')){
            if($filterCate!='all'){
                
                if($filterVehicle!='all'){
                    $tour = Tour::where('category_id','=',$filterCate)->where('vehicle_id','=',$filterVehicle)->where('id','!=','0')->where('status','=','2')->where('name','like','%'.$request->search.'%')
                                    ->orderBy('created_at',$time)->paginate(4);
                }else{
                    $tour = Tour::where('category_id','=',$filterCate)->where('id','!=','0')->where('status','=','2')->where('name','like','%'.$request->search.'%')
                                    ->orderBy('created_at',$time)->paginate(4);
                }
            }else{
                if($filterVehicle!='all'){
                    $tour = Tour::where('vehicle_id','=',$filterVehicle)->where('id','!=','0')->where('status','=','2')->where('name','like','%'.$request->search.'%')
                                    ->orderBy('created_at',$time)->paginate(4);
                }else{
                    $tour = Tour::where('id','!=','0')->where('status','=','2')->where('name','like','%'.$request->search.'%')
                                    ->orderBy('created_at',$time)->paginate(4);
                }
            }
        }else{
            if($filterCate!='all'){
                
                if($filterVehicle!='all'){
                    $tour = Tour::where('category_id','=',$filterCate)->where('vehicle_id','=',$filterVehicle)->where('id','!=','0')->where('status','!=','2')
                                    ->orderBy('created_at',$time)->paginate(4);
                }else{
                    $tour = Tour::where('category_id','=',$filterCate)->where('id','!=','0')->where('status','=','2')
                                    ->orderBy('created_at',$time)->paginate(4);
                }
            }else{
                if($filterVehicle!='all'){
                    $tour = Tour::where('vehicle_id','=',$filterVehicle)->where('id','!=','0')->where('status','=','2')
                                    ->orderBy('created_at',$time)->paginate(4);
                }else{
                    $tour = Tour::where('id','!=','0')->where('status','=','2')
                                    ->orderBy('created_at',$time)->paginate(4);
                }
            }
        }
       
      
           
        return view('admin.pages.tour.trash')->with(compact('tour'))->with(compact('rating'))->with(compact('review'))->with(compact("cate"))->with(compact('vehicle'))
        ->with(compact('filterTime'))->with(compact('filterCate'))->with(compact('filterVehicle'));
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
        //
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
    public function update(Request $request, $id)
    {
        //
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
