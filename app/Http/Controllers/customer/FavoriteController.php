<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\admin\Tour;
use App\Models\customer\Comments;
use App\Models\customer\Favorites;
use App\Models\customer\Ratings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tours=Tour::join('favorites','favorites.id_tour','tour.id')
                    ->select('tour.*')
                    ->where('favorites.id_customer',Auth::guard('customer')->user()->id)->get();
        $rating=[];
        // dd($request->price);
        foreach($tours as $toursVal){
                    $rate=Ratings::where('id_tour','=',$toursVal->id)->avg('Ratings.rating_star');
                    $rating[$toursVal->id]=$rate;
        }
        $review=[];
        foreach($tours as $toursVal){
            $r=Comments::where('id_tour','=',$toursVal->id)->count();
            $review[$toursVal->id]=$r;
        }
        if(Auth::guard('customer')->check()){
            $favorite=Favorites::where('id_customer','=',Auth::guard('customer')->user()->id,)->get();
        }else{
            $favorite=[];
        }
        return view('customer.pages.user_dashboard_wishlist',compact('tours','rating','review','favorite'));
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
        if(!Auth::guard('customer')->check()){
            return redirect()->route('customer.login')->with('error',"You need to login first");
            exit;
        }elseif(Auth::guard('customer')->user()->status==2){
            return redirect()->back()->with('error',"Your Account Has Been Banned");
            exit;
        }
        $scroll=$request->Y;

        $create=Favorites::create([
            "id_customer"=>Auth::guard('customer')->user()->id,
            "id_tour"=>$request->id
        ]);

        return redirect()->back()->with('scroll',$scroll);
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
    public function destroy(Request $request,$id)
    {
        if(!Auth::guard('customer')->check()){
            return redirect()->route('customer.login')->with('error',"You need to login first");
            exit;
        }
        $scroll=$request->Y;

        $destroy=Favorites::where('id_customer','=',Auth::guard('customer')->user()->id)->where('id_tour','=',$id)->delete();

        return redirect()->back()->with('scroll',$scroll);
    }
}
