<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\service\addServiceRequest;
use App\Http\Requests\admin\service\editServiceRequest;
use App\Models\admin\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
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
                    $service = Service::where('name', 'like', "%$keyword%")->where('price', '!=', '2')->paginate(5);
                } elseif ($condition == 'desc' || $condition == 'asc') {
                    $service = Service::where('name', 'like', "%$keyword%")->orderBy('created_at', $condition)->paginate(5);
                }
            } else {
                $service = Service::where('name', 'like', "%$keyword%")->paginate(5);
            }
        }else {
            if ($request->has('condition')) {
                $condition = $request->condition;
                if ($condition == 'all') {
                    $service = Service::where('price', '!=', '2')->paginate(5);
                } elseif ($condition == 'desc' || $condition == 'asc') {
                    $service = Service::orderBy('created_at', $condition)->paginate(5);
                }
            } else {
                $service = Service::paginate(5);
            }
        }
        return view('admin.pages.service.list', compact('service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(addServiceRequest $request)
    {
        if (Auth::user()->role == 'admin' || Auth::user()->role == 'manager') {
            Service::create($request->only('name', 'price'));
            return redirect()->route('service.index')->with('add_success', 'Add Service Successfull');
        } else {
            return redirect()->route('service.index')->with('add_success', 'Cant add new, check your position');
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
        $service_founded = Service::find($id);
        return view('admin.pages.service.edit', compact('service_founded'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(editServiceRequest $request, $id)
    {
        if (Auth::user()->role == 'admin' || Auth::user()->role == 'manager') {
            $service_founded = Service::find($id);
            $update_service = $service_founded->update($request->only('name', 'slug', 'status'));
            if ($update_service) {
                return redirect()->route('service.index')->with('edit_success', "Edit Service Successfully");
            }
        } else {
            return redirect()->route('service.index')->with('error', "You don't have permission to edit this service");
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
            $service_founded = Service::find($id)->delete();
            if ($service_founded) {
                return redirect()->back()->with('delete_success', "Delete Successfully");
            }
        } else {
            return redirect()->back()->with('error', "You don't have permission to delete this service");
        }
    }
}
