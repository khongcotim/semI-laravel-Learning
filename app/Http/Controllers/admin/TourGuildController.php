<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\tour_guide\addTourGuideRequest;
use App\Http\Requests\admin\tour_guide\editTourGuideRequest;
use App\Models\admin\TourGuide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TourGuildController extends Controller
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
                    $tour_guide = TourGuide::where('name','like',"%$keyword%")->where('status','!=','2')->paginate(5);
                }elseif ($condition=='desc' || $condition == 'asc') {
                    $tour_guide= TourGuide::where('name','like',"%$keyword%")->orderBy('created_at',$condition)->paginate(5);
                }
            }else{
                $tour_guide = TourGuide::where('name','like',"%$keyword%")->paginate(5);
            }
        }else{
            if ($request->has('condition')) {
                $condition = $request->condition;
                if ($condition == 'all') {
                    $tour_guide = TourGuide::paginate(5);
                }elseif ($condition=='desc' || $condition == 'asc') {
                    $tour_guide= TourGuide::orderBy('created_at',$condition)->paginate(5);
                }
            }else{
                $tour_guide = TourGuide::paginate(5);
            }
        }
        return view('admin.pages.tour_guide.list', compact('tour_guide'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.tour_guide.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(addTourGuideRequest $request)
    {
        if (Auth::user()->role == 'admin' || Auth::user()->role == 'manager') {
            if ($request->has('avatar')) {
                $file = $request->avatar;
                $ext = $request->avatar->extension();
                $file_name = $file->getClientOriginalName() . time() . '-' . '.' . $ext;
                $file->move(public_path('customers/images'), $file_name);
            }
            $request->merge(['avatar' => $file_name]);
            TourGuide::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'avatar' => $file_name,
                'price' => $request->price,
                'email' => $request->email,
                'address' => $request->address,
                'description' => $request->description,
                'status' => $request->status,
                'gender' => $request->gender,
            ]);
            return redirect()->route('tour_guide.index')->with('add_success', 'Add Tour Guide Successfull');
        } else {
            return redirect()->route('tour_guide.index')->with('add_success', 'Cant add new, check your position');
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
        $tour_guide_founded = TourGuide::find($id);
        return view('admin.pages.tour_guide.edit', compact('tour_guide_founded'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(editTourGuideRequest $request, $id)
    {
        $finbyid = TourGuide::find($id);
        if (Auth::user()->role == 'admin' || Auth::user()->role == 'manager') {
            if ($request->has('avatar')) {
                $file = $request->avatar;
                $ext = $request->avatar->extension(); //
                $file_name = $file->getClientOriginalName() . time() . '-' . '.' . $ext;
                $file->move(public_path('customers/images'),$file_name);
            }else{
                $file_name = $finbyid->avatar;
            }

            // $request->merge(['avatar' => $file_name]);
            $finbyid->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'avatar' => $file_name,
                'price' => $request->price,
                'email' => $request->email,
                'address' => $request->address,
                'description' => $request->description,
                'status' => $request->status,
                'gender' => $request->gender,
            ]);
        }
        if ($finbyid) {
            return redirect()->route('tour_guide.index')->with('edit_success', 'Edit Tour Guide Successfull');
        } else {
            return redirect()->route('tour_guide.index')->with('edit_success', 'Cant add new, check your position');
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
        if (Auth::user()->role == 'admin' || Auth::user()->role == 'manager') {
            $tour_guide_founded = TourGuide::find($id)->delete();
            if ($tour_guide_founded) {
                return redirect()->back()->with('delete_success', "Delete Successfully");
            }
        } else {
            return redirect()->back()->with('error', "You don't have permission to delete this tour guide");
        }
    }
}
