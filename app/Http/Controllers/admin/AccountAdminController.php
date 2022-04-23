<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Admin;
//request
use App\Http\Requests\admin\account\CreateManagerRequest;
use App\Http\Requests\admin\account\EditManagerRequest;
class AccountAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function phanQuyen($Auth,$Role)
    {   
        $auth=0;
        $role=0;
        if($Auth == 'admin'){
            $auth=3;
        }elseif($Auth == 'manager'){
            $auth=2;
        }elseif($Auth == 'staff'){
            $auth=1;
        };

        if($Role == 'admin'){
            $role=3;
        }elseif($Role == 'manager'){
            $role=2;
        }elseif($Role == 'staff'){
            $role=1;
        };
        if($auth>$role){
            return true;
        }else{
            return false;
        };
    }
    public function index(Request $request)
    {   
        if($request->has('office')){
            $office=$request->office;
        }else{
            $office='all';
        }
        if($request->has('filter')){
            $filter=$request->filter;
        }else{
            $filter='any';
        }
        
        $search_value='';
        if($request->has('search')){
            $search_value=$request->search;
            if($office!='all'){
                
                if($filter!='any'){
                    $filter=$request->filter;
                    $list_account = Admin::where('role','=',$office)->where('id','!=','0')->where('name','like','%'.$request->search.'%')
                                    ->orderBy('created_at',$filter)->paginate(8);
                }else{
                    $list_account = Admin::where('role','=',$office)->where('id','!=','0')->where('name','like','%'.$request->search.'%')->paginate(8);
                }
            }else{
                if($filter!='any'){
                    
                    $list_account = Admin::orderBy('created_at',$filter)->where('id','!=','0')->where('name','like','%'.$request->search.'%')->paginate(8);

                }else{
                    $list_account = Admin::where('id','!=','0')->where('name','like','%'.$request->search.'%')->paginate(8);
                }
            }
        }else{
            if($office!='all'){
                
                if($filter!='any'){
                    $filter=$request->filter;
                    $list_account = Admin::where('role','=',$office)->where('id','!=','0')
                                    ->orderBy('created_at',$filter)->paginate(8);
                }else{
                    $list_account = Admin::where('role','=',$office)->where('id','!=','0')->paginate(8);
                }
            }else{
                if($filter!='any'){
                    
                    $list_account = Admin::orderBy('created_at',$filter)->where('id','!=','0')->paginate(8);

                }else{
                    $list_account = Admin::where('id','!=','0')->paginate(8);
                }
            }
        }
        
       
        return view('admin.pages.account.adminAccount.index')->with(compact('list_account'))->with(compact('filter'))->with(compact('office'))->with(compact('search_value'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        if(Auth::user()->role=='staff'){
            return redirect()->back()->with('edit_success','You cant create newanager');
        }else{
            return view('admin.pages.account.adminAccount.create');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateManagerRequest $request)
    {   
        if($this->phanQuyen(Auth::user()->role,$request->role)==true){
            $image = $request->avatar;
            $name = $image->getClientOriginalName();
            $hash = Hash::make($request->password);
            $image->move(public_path('admin/images'),$name);
            $add = Admin::create([
                'name'=>$request->name,
                'avatar'=>$name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'password'=>$hash,
                'address'=>$request->address,
                'role'=>$request->role
            ]);
            if($add){
                 return redirect()->route('accountAdmin.index')->with('edit_success','Acount Was Created');
            }else{
                 return redirect()->back();
            }
        }else{
            return redirect()->route('accountAdmin.index')->with('edit_success','You cant change this, checking your account');
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
        $account = Admin::find($id);
        return view('admin.pages.account.adminAccount.edit')->with(compact('account'));
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
    public function update(EditManagerRequest $request, $id)
    {   
        if($id==Auth::user()->id){
            $edit = Admin::find($id);
            if(is_null($request->avatar)){
                $nameimg = $edit['avatar'];
            }else{
                $image = $request->avatar;
                $nameimg = $image->getClientOriginalName();
                $image->move(public_path('admin/images'),$nameimg);
            }
            if(is_null($request->password)){
                $pass = $edit['password'];
            }else{
                $pass= Hash::make($request->password);
            }
            $edit->update([
                'name'=>$request->name,
                'avatar'=>$nameimg,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'password'=>$pass,
                'address'=>$request->address,
                'role'=>$request->role
            ]);
            if($edit){
                return redirect()->route('accountAdmin.index')->with('edit_success','Account Was Updated');
            }else{
                return redirect()->back();
            }
        }elseif($this->phanQuyen(Auth::user()->role,$request->role)==true){
            if ($id != Auth::user()->id) {
                return redirect()->back()->with('warning',"You can't edit other account information");
            }
            $edit = Admin::find($id);
            $edit->update([
                'role'=>$request->role
            ]);
            if($edit){
                return redirect()->route('accountAdmin.index')->with('edit_success','Account Was Updated');
            }else{
                return redirect()->back();
            }
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
        //
    }

}
