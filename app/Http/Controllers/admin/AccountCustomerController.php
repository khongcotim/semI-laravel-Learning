<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\customer\Customer;

//Request

use App\Http\Requests\admin\account\EditCustomerRequest;
use App\Models\admin\Tour;

class AccountCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $time='asc';
        if($request->has('filterTime')){
            $filterTime=$request->filterTime;
            $time=$request->filterTime;
        }else{
            $filterTime='any';
        }

        if($time=='any'){
            $time='asc';
        }
        if($request->has('filterStatus')){
            $filterStatus=$request->filterStatus;
        }else{
            $filterStatus='4';
        }
        $search_value='';
        if($request->has('search')){
            $search_value=$request->search;
            if($filterStatus!='4'){
                    $list_account =Customer::where('status','=',$filterStatus)->where('id','!=','0')->where('name','like','%'.$request->search.'%')
                                    ->orderBy('created_at',$time)->paginate(8);
            
            }else{
                    $list_account =Customer::where('id','!=','0')->where('name','like','%'.$request->search.'%')->orderBy('created_at',$time)->paginate(8);
            }
        }else{
            if($filterStatus!='4'){
                $list_account =Customer::where('status','=',$filterStatus)->where('id','!=','0')
                                ->orderBy('created_at',$time)->paginate(8);
        
            }else{
                    $list_account =Customer::where('id','!=','0')->orderBy('created_at',$time)->paginate(8);
            }
        }

        return view('admin.pages.account.customerAccount.index')->with(compact('list_account'))->with(compact('filterTime'))->with(compact('filterStatus'))->with(compact('search_value'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
           
        
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
        $account = Customer::find($id);
        return view('admin.pages.account.customerAccount.edit')->with(compact('account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditCustomerRequest $request, $id)
    {   
            $edit = Customer::find($id);
            $edit->update([
                'status'=>$request->status
            ]);
           
            if($edit){
                return redirect()->route('accountCustomer.index')->with('success','Customer Was Updated');
            }else{
                return redirect()->back()->with('error',"You can't update customer information");
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
        
    }

}
