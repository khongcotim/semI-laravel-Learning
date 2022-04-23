<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\logo\addLogoRequest;
use App\Http\Requests\admin\logo\editLogoRequest;
use App\Models\admin\Logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('keyword')) {
            return redirect()->route('logo.index')->with('warning', 'Sorry, nothing to found here');
        }else{
            if ($request->has('condition')) {
                $condition = $request->condition;
                if ($condition == 'all') {
                    $logo = Logo::paginate(5);
                }elseif ($condition=='desc' || $condition == 'asc') {
                    $logo= Logo::orderBy('created_at',$condition)->paginate(5);
                }
            }else{
                $logo = Logo::paginate(5);
            }
        }
        return view('admin.pages.logo.list', compact('logo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.logo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(addLogoRequest $request)
    {
        if (Auth::user()->role == 'admin' || Auth::user()->role == 'manager') {
            if ($request->has('logo')) {
                $file = $request->logo;
                $ext = $request->logo->extension();
                $file_name = $file->getClientOriginalName() . time() . '-' . '.' . $ext;
                $file->move(public_path('admin/images'), $file_name);
            }
            $request->merge(['logo' => $file_name]);
            Logo::create([
                'logo' => $file_name,
                'status' => $request->status
            ]);
            return redirect()->route('logo.index')->with('add_success', 'Add Logo Successfull');
        } else {
            return redirect()->route('logo.index')->with('add_success', 'Cant add new, check your position');
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
        $logo_founded = Logo::find($id);
        return view('admin.pages.logo.edit', compact('logo_founded'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(editLogoRequest $request, $id)
    {
        $finbyid = Logo::find($id);
        if (Auth::user()->role == 'admin' || Auth::user()->role == 'manager') {
            if ($request->has('logo')) {
                $file = $request->logo;
                $ext = $request->logo->extension();
                $file_name = $file->getClientOriginalName() . time() . '-' . '.' . $ext;
                $file->move(public_path('admin/images'),$file_name);
            }else{
                $file_name = $finbyid->logo;
            }

            // $request->merge(['avatar' => $file_name]);
            $finbyid->update([
                'logo' => $file_name,
                'status' => $request->status,
            ]);
        }
        if ($finbyid) {
            return redirect()->route('logo.index')->with('edit_success', 'Edit Logo Successfull');
        } else {
            return redirect()->route('logo.index')->with('edit_success', 'Cant add new, check your position');
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
            $logo_founded = Logo::find($id)->delete();
            if ($logo_founded) {
                return redirect()->back()->with('delete_success', "Delete Successfully");
            }
        } else {
            return redirect()->back()->with('error', "You don't have permission to delete this tour guide");
        }
    }
}
