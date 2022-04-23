<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\customer\Reply;
use Illuminate\Support\Facades\Auth;
class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // dd($request);
        if(!Auth::guard('customer')->check()){
            return redirect()->route('customer.login')->with('error',"You need to login first");
            exit;
        }elseif(Auth::guard('customer')->user()->status==2){
            return redirect()->back()->with('error',"Your Account Has Been Banned");
            exit;
        }
        Reply::create([
            "reply_to"=>$request->reply_to,
            "customer_reply"=>Auth::guard('customer')->user()->id,
            'type'=>$request->type,
            "contents"=>$request->message
        ]);
        $scroll=$request->Y;
        return redirect()->back()->with('add_success',"Reply successfully")->with(compact('scroll'));
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
        if(!Auth::guard('customer')->check()){
            return redirect()->route('customer.login')->with('error',"You need to login first");
            exit;
        }
        $rep = Reply::find($id);
        $rep->update([
            'contents'=>$request->message,
        ]);
        $scroll=0;
        return redirect()->back()->with('edit_success','Update your reply successfull')->with(compact('scroll'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Auth::guard('customer')->check()){
            return redirect()->route('customer.login')->with('error',"You need to login first");
            exit;
        }
        $scroll=0;
        $rep = Reply::find($id);
        $rep->delete();
        return redirect()->back()->with('delete_success','Delete your reply successfully')->with(compact('scroll'));
    }
}
