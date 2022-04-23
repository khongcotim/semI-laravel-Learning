<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Slides;
use App\Http\Requests\admin\slides\AddSlidesRequest;
use App\Http\Requests\admin\slides\EditSlidesRequest;
class SlideController extends Controller
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
                    $slides = Slides::where('title','like',"%$keyword%")->where('status','!=','2')->paginate(5);
                }elseif ($condition=='desc' || $condition == 'asc') {
                    $slides= Slides::where('title','like',"%$keyword%")->orderBy('created_at',$condition)->paginate(5);
                }
            }else{
                $slides = Slides::where('title','like',"%$keyword%")->paginate(5);
            }
        }else{
            if ($request->has('condition')) {
                $condition = $request->condition;
                if ($condition == 'all') {
                    $slides = Slides::where('status','!=','2')->paginate(5);
                }elseif ($condition=='desc' || $condition == 'asc') {
                    $slides= Slides::orderBy('created_at',$condition)->paginate(5);
                }
            }else{
                $slides = Slides::paginate(5);
            }
        }
        return view('admin.pages.slides.index',compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.slides.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddSlidesRequest $request)
    {
        if ($request->has('image')) {
            $file = $request->image;
            $file_name = time().$file->getClientoriginalName();
            $file->move(public_path('admin/images'),$file_name);
        }
        Slides::create([
            'title'=>$request->title,
            'link'=>$request->link,
            'max'=>$request->max,
            'position'=>$request->position,
            'image'=>$file_name,
        ]);
        return redirect()->route('slides.index')->with('add_success','Add Slide successfully');
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
        $slide_found = Slides::find($id);
        return view('admin.pages.slides.edit',compact('slide_found'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditSlidesRequest $request, $id)
    {
        $slide_found = Slides::find($id);
        if ($request->has('image')) {
            $file = $request->image;
            $file_name = time().$file->getClientoriginalName();
            $file->move(public_path('admin/images'),$file_name);
        }else{
            $file_name = $slide_found->image;
        }
        $slide_found->update([
            'title'=>$request->title,
            'link'=>$request->link,
            'max'=>$request->max,
            'image'=>$file_name,
        ]);
        return redirect()->route('slides.index')->with('edit_success','Update Slide successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide_found = Slides::find($id);
        $slide_found->delete($id);
        return redirect()->route('slides.index')->with('delete_success','Delete Slide successfully');
    }
}
