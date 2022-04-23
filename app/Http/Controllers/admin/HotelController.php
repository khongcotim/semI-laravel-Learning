<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Hotel;
use App\Http\Requests\admin\hotel\addHotelRequest;
use App\Http\Requests\admin\hotel\editHotelRequest;
class HotelController extends Controller
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
                    $hotel = Hotel::where('name','like',"%$keyword%")->paginate(5);
                }elseif ($condition=='desc' || $condition == 'asc') {
                    $hotel= Hotel::where('name','like',"%$keyword%")->orderBy('created_at',$condition)->paginate(5);
                }
            }else{
                $hotel = Hotel::where('name','like',"%$keyword%")->paginate(5);
            }
        }else{
            if ($request->has('condition')) {
                $condition = $request->condition;
                if ($condition == 'all') {
                    $hotel = Hotel::where('status','!=','2')->paginate(5);
                }elseif ($condition=='desc' || $condition == 'asc') {
                    $hotel= Hotel::orderBy('created_at',$condition)->paginate(5);
                }
            }else{
                $hotel = Hotel::paginate(5);
            }
        }
        return view('admin.pages.hotel.list',compact('hotel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.hotel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(addHotelRequest $request)
    {
        Hotel::create($request->only('name','address','price'));
        return redirect()->route('hotel.index')->with('add_success',"Add Hotel Successfull");
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
        $hotel_founded = Hotel::find($id);
        return view('admin.pages.hotel.edit',compact('hotel_founded'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(editHotelRequest $request, $id)
    {
        $hotel_founded = Hotel::find($id);
        $update_hotel = $hotel_founded->update($request->only('name','address','price'));
        if ($update_hotel) {
            return redirect()->route('hotel.index')->with('edit_success','Edit hotel successfully');
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
        $hotel_founded = Hotel::find($id);
        $hotel_founded->delete($id);
        return redirect()->back()->with('delete_success','Delete Hotel successfully');
    }
}
