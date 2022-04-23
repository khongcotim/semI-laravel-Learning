<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\admin\banner\AddBannerRequest;
use App\Http\Requests\admin\banner\EditBannerRequest;
use App\Models\admin\Banner;
use Illuminate\Support\Facades\Auth;

class BannerController extends Controller
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
                    $banner = Banner::where('title','like',"%$keyword%")->where('status','!=','2')->paginate(5);
                }elseif ($condition=='desc' || $condition == 'asc') {
                    $banner= Banner::where('title','like',"%$keyword%")->orderBy('created_at',$condition)->paginate(5);
                }
            }else{
                $banner = Banner::where('title','like',"%$keyword%")->paginate(5);
            }
        }else{
            if ($request->has('condition')) {
                $condition = $request->condition;
                if ($condition == 'all') {
                    $banner = Banner::where('status','!=','2')->paginate(5);
                }elseif ($condition=='desc' || $condition == 'asc') {
                    $banner= Banner::orderBy('created_at',$condition)->paginate(5);
                }
            }else{
                $banner = Banner::paginate(5);
            }
        }
        return view('admin.pages.banner.list',compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddBannerRequest $request)
    {
        if(Auth::user()->role=='admin'||Auth::user()->role=='manager'){
            if ($request->has('status')) {
                $file = $request->image;
                $file_name = time().$file->getClientoriginalName();
                $file->move(public_path('admin/images'),$file_name);
            }
            Banner::create([
                'title'=>$request->title,
                'page'=>$request->page,
                // 'links'=>$request->links,
                'image'=>$file_name,
                'status'=>$request->status
            ]);
            return redirect()->route('banner.index')->with('add_success','Add Banner successfully');
        }else{
            return redirect()->route('banner.index')->with('add_success','Cant add new, check your position');
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
        $banner_found = Banner::find($id);
        return view('admin.pages.banner.infor',compact('banner_found'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner_found = Banner::find($id);
        return view('admin.pages.banner.edit',compact('banner_found'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditBannerRequest $request, $id)
    {   
        if(Auth::user()->role=='admin'||Auth::user()->role=='manager'){
            $banner = Banner::find($id);
            if ($request->has('image')) {
                $file = $request->image;
                $file_name = time().$file->getClientoriginalName();
                $file->move(public_path('admin/images'),$file_name);
            }else{
                $file_name = $banner->image;
            }
            $banner->update([
                'title'=>$request->title,
                'page'=>$request->page,
                // 'links'=>$request->links,
                'image'=>$file_name,
                'status'=>$request->status,
            ]);
            return redirect()->route('banner.index')->with('edit_success','Update Banner successfully');
        }else{
            $banner = Banner::find($id);
            if ($request->has('image')) {
                $file = $request->image;
                $file_name = time().$file->getClientoriginalName();
                $file->move(public_path('admin/images'),$file_name);
            }else{
                $file_name = $banner->image;
            }
            $banner->update([
                'title'=>$request->title,
                'page'=>$request->page,
                // 'links'=>$request->links,
                'image'=>$file_name,
            ]);
            return redirect()->route('banner.index')->with('edit_success','Update Banner successfully');
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
            $banner_found = Banner::find($id);
            $delete_banner = $banner_found->update([
                'status'=>2
            ]);
            if ($delete_banner) {
                return redirect()->route('banner.index')->with('delete_success','Delete Banner successfully');
            }
        }else{
            return redirect()->route('banner.index')->with('delete_success','Cant delete, check your position');
        }
    }
}
