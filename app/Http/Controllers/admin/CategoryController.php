<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\admin\category\addCategoryRequest;
use App\Http\Requests\admin\category\editCategoryRequest;
class CategoryController extends Controller
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
                    $category = Category::where('name','like',"%$keyword%")->where('status','!=','2')->paginate(5);
                }elseif ($condition=='desc' || $condition == 'asc') {
                    $category= Category::where('name','like',"%$keyword%")->orderBy('created_at',$condition)->paginate(5);
                }
            }else{
                $category = Category::where('name','like',"%$keyword%")->paginate(5);
            }
        }else{
            if ($request->has('condition')) {
                $condition = $request->condition;
                if ($condition == 'all') {
                    $category = Category::where('status','!=','2')->paginate(5);
                }elseif ($condition=='desc' || $condition == 'asc') {
                    $category= Category::orderBy('created_at',$condition)->paginate(5);
                }
            }else{
                $category = Category::paginate(5);
            }
        }
        return view('admin.pages.category.list',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(addCategoryRequest $request)
    {   
        if(Auth::user()->role=='admin'||Auth::user()->role=='manager'){
            Category::create($request->only('name','slug','status'));
            return redirect()->route('category.index')->with('add_success','Add Category Successfull');
        }else{
            return redirect()->route('category.index')->with('add_success','Cant add new, check your position');
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
        $category_founded = Category::find($id);
        return view('admin.pages.category.edit',compact('category_founded'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(editCategoryRequest $request, $id)
    {   
        if(Auth::user()->role=='admin'||Auth::user()->role=='manager'){
            $category_founded = Category::find($id);
            $update_category = $category_founded->update($request->only('name','slug','status'));
            if ($update_category) {
                return redirect()->route('category.index')->with('edit_success',"Edit Category Successfully");
            }
        }else{
            return redirect()->route('category.index')->with('error',"You don't have permission to edit this category");
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
            $category_founded = Category::find($id);
            $delete_category = $category_founded->update([
                'status'=>2
            ]);
            if($delete_category){
                return redirect()->back()->with('delete_success',"Delete Successfully");
            }
        }else{
            return redirect()->back()->with('error',"You don't have permission to delete this category");
        }
    }
}
