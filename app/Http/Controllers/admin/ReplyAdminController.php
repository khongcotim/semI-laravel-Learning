<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\customer\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyAdminController extends Controller
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
        
        if ($request->has('type')) {
            Reply::create([
                "reply_to"=>$request->reply_to,
                "admin_reply"=>Auth::user()->id,
                "who_eccept"=>Auth::user()->id,
                "contents"=>$request->message,
                'type'=>$request->type
            ]);
        }
        return redirect()->back()->with('add_success',"Reply successfully");
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
        $rep = Reply::find($id);
        $rep->update([
            'contents'=>$request->message,
        ]);
        return redirect()->back()->with('edit_success','Update your reply successfull');
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
