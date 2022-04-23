<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Feedback;
use App\Http\Requests\admin\FAQ\AddFAQRequest;
use App\Http\Requests\admin\FAQ\EditFAQRequest;
use App\Models\admin\Admin;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $array = [];
        if ($request->has('keyword')) {
            $keyword = $request->keyword;
            if ($request->has('selection')) {
                $selection = $request->selection;
                if ($selection == 'feedback') {
                    if ($request->has('condition')) {
                        $condition = $request->condition;
                        if ($condition == 'all') {
                            $feedback = Feedback::leftjoin('Admin','Admin.id','Feedback.admin_id')
                                                ->leftjoin('Customer','Customer.id','Feedback.customer_id')
                                                ->select('Customer.name as customer_name','Customer.avatar as customer_avt','Admin.name as admin_name','Admin.avatar as admin_avt','Feedback.*')
                                                ->where('Feedback.customer_id','!=','null')
                                                ->where('Feedback.solution','like',"%$keyword%")
                                                ->paginate(5);
                            
                        }else{
                            $feedback = Feedback::leftjoin('Admin','Admin.id','Feedback.admin_id')
                                                 ->leftjoin('Customer','Customer.id','Feedback.customer_id')
                                                 ->select('Customer.name as customer_name','Customer.avatar as customer_avt','Admin.name as admin_name','Admin.avatar as admin_avt','Feedback.*')
                                                 ->where('Feedback.customer_id','!=','null')
                                                 ->orderBy('created_at',$condition)
                                                 ->where('Feedback.solution','like',"%$keyword%")
                                                 ->paginate(5);
                        }
                    }else{
                        $feedback = Feedback::leftjoin('Admin','Admin.id','Feedback.admin_id')
                                              ->leftjoin('Customer','Customer.id','Feedback.customer_id')
                                              ->select('Customer.name as customer_name','Customer.avatar as customer_avt','Admin.name as admin_name','Admin.avatar as admin_avt','Feedback.*')
                                              ->where('Feedback.customer_id','!=','null')
                                              ->where('Feedback.solution','like',"%$keyword%")
                                              ->paginate(5);
                    }
                }elseif ($selection == 'faq') {
                    if ($request->has('condition')) {
                        $condition = $request->condition;
                        if ($condition == 'all') {
                            $feedback = Feedback::leftjoin('Admin','Admin.id','Feedback.admin_id')
                            ->leftjoin('Customer','Customer.id','Feedback.customer_id')
                            ->select('Customer.name as customer_name','Customer.avatar as customer_avt','Admin.name as admin_name','Admin.avatar as admin_avt','Feedback.*')
                            ->where('Feedback.admin_id','!=','null')
                            ->where('Feedback.solution','like',"%$keyword%")
                            ->paginate(5);
                        }else{
                            $feedback = Feedback::leftjoin('Admin','Admin.id','Feedback.admin_id')
                                                 ->leftjoin('Customer','Customer.id','Feedback.customer_id')
                                                 ->select('Customer.name as customer_name','Customer.avatar as customer_avt','Admin.name as admin_name','Admin.avatar as admin_avt','Feedback.*')
                                                 ->where('Feedback.admin_id','!=','null')
                                                 ->where('Feedback.solution','like',"%$keyword%")
                                                 ->orderBy('created_at',$condition)
                                                 ->paginate(5);
                        }
                    }else{
                        $feedback = Feedback::leftjoin('Admin','Admin.id','Feedback.admin_id')
                                              ->leftjoin('Customer','Customer.id','Feedback.customer_id')
                                              ->select('Customer.name as customer_name','Customer.avatar as customer_avt','Admin.name as admin_name','Admin.avatar as admin_avt','Feedback.*')
                                              ->where('Feedback.solution','like',"%$keyword%")
                                              ->where('Feedback.admin_id','!=','null')
                                              ->paginate(5);
                    }
                }
            }
            else{
                $feedback = Feedback::leftjoin('Admin','Admin.id','Feedback.admin_id')
                ->leftjoin('Customer','Customer.id','Feedback.customer_id')
                ->select('Customer.name as customer_name','Customer.avatar as customer_avt','Admin.name as admin_name','Admin.avatar as admin_avt','Feedback.*')
                ->where('Feedback.solution','like',"%$keyword%")
                ->paginate(5);
            }
        }else {
            if ($request->has('selection')) {
                $selection = $request->selection;
                if ($selection == 'feedback') {
                    if ($request->has('condition')) {
                        $condition = $request->condition;
                        if ($condition == 'all') {
                            $feedback = Feedback::leftjoin('Admin','Admin.id','Feedback.admin_id')
                                             ->leftjoin('Customer','Customer.id','Feedback.customer_id')
                                             ->select('Customer.name as customer_name','Customer.avatar as customer_avt','Admin.name as admin_name','Admin.avatar as admin_avt','Feedback.*')
                                             ->where('Feedback.customer_id','!=','null')
                                             ->paginate(5);
                        }else{
                            $feedback = Feedback::leftjoin('Admin','Admin.id','Feedback.admin_id')
                                                 ->leftjoin('Customer','Customer.id','Feedback.customer_id')
                                                 ->select('Customer.name as customer_name','Customer.avatar as customer_avt','Admin.name as admin_name','Admin.avatar as admin_avt','Feedback.*')
                                                 ->where('Feedback.customer_id','!=','null')
                                                 ->orderBy('created_at',$condition)
                                                 ->paginate(5);
                        }
                    }else{
                        $feedback = Feedback::leftjoin('Admin','Admin.id','Feedback.admin_id')
                                              ->leftjoin('Customer','Customer.id','Feedback.customer_id')
                                              ->select('Customer.name as customer_name','Customer.avatar as customer_avt','Admin.name as admin_name','Admin.avatar as admin_avt','Feedback.*')
                                              ->where('Feedback.customer_id','!=','null')
                                              ->paginate(5);
                    }
                }elseif ($selection == 'faq') {
                    if ($request->has('condition')) {
                        $condition = $request->condition;
                        if ($condition == 'all') {
                            $feedback = Feedback::leftjoin('Admin','Admin.id','Feedback.admin_id')
                            ->leftjoin('Customer','Customer.id','Feedback.customer_id')
                            ->select('Customer.name as customer_name','Customer.avatar as customer_avt','Admin.name as admin_name','Admin.avatar as admin_avt','Feedback.*')
                            ->where('Feedback.admin_id','!=','null')
                            ->paginate(5);
                        }else{
                            $feedback = Feedback::leftjoin('Admin','Admin.id','Feedback.admin_id')
                                                 ->leftjoin('Customer','Customer.id','Feedback.customer_id')
                                                 ->select('Customer.name as customer_name','Customer.avatar as customer_avt','Admin.name as admin_name','Admin.avatar as admin_avt','Feedback.*')
                                                 ->where('Feedback.admin_id','!=','null')
                                                 ->orderBy('created_at',$condition)
                                                 ->paginate(5);
                        }
                    }else{
                        $feedback = Feedback::leftjoin('Admin','Admin.id','Feedback.admin_id')
                                              ->leftjoin('Customer','Customer.id','Feedback.customer_id')
                                              ->select('Customer.name as customer_name','Customer.avatar as customer_avt','Admin.name as admin_name','Admin.avatar as admin_avt','Feedback.*')
                                              ->where('Feedback.admin_id','!=','null')
                                              ->paginate(5);
                    }
                }
            }
            else{
                $feedback = Feedback::leftjoin('Admin','Admin.id','Feedback.admin_id')
                                    ->leftjoin('Customer','Customer.id','Feedback.customer_id')
                                    ->select('Customer.name as customer_name','Customer.avatar as customer_avt','Admin.name as admin_name','Admin.avatar as admin_avt','Feedback.*')
                                    ->paginate(5);
                
            }
        }
        $feedback_where_has_accept = Feedback::where('who_except','!=','null')->get();
        foreach ($feedback_where_has_accept as $key => $val) {
            if ($val->who_except != null) {
                $who_accept = Admin::where('id',$val->who_except)->first('name');
                $array[$val->id] = $who_accept;
            }
        }
        return view('admin.pages.feedback.manage',compact('feedback','array'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.feedback.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddFAQRequest $request)
    {
        $add_faq = Feedback::create([
            'solution'=>$request->solution,
            'answer'=>$request->answer,
            // 'admin_id'=>Auth::user()->id;
            'admin_id'=>1
        ]);
        if ($add_faq) {
            return redirect()->route('feedback.index')->with('add_success','Add FAQ successfully');
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
        $faq_found = Feedback::find($id);
        return view('admin.pages.feedback.edit',compact('faq_found'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditFAQRequest $request, $id)
    {
        if ($request->has('message')) {
            $request->validate([
                'message'=>'required'
            ]);
            $answer = $request->message;
            $feedback_found = Feedback::find($id);
            $update_feedback = $feedback_found->update([
                'answer'=>$answer,
                'who_except'=>Auth::user()->id
            ]);
            if ($update_feedback) {
                return redirect()->route('feedback.index',['keyword'=>$feedback_found->solution,'selection'=>'feedback'])->with('edit_success','Answer successfull');
            }else{
                return redirect()->route('feedback.index')->with('edit_success','Get error when answer, please try later');
            }
        }
        $faq_found = Feedback::find($id);
        $faq_found->update($request->only('solution','answer'));
        return redirect()->route('feedback.index')->with('edit_success','Update FAQ successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faq_found = Feedback::find($id);
        $faq_found->delete($id);
        return redirect()->back()->with('delete_success','Delete FAQ successfully');
    }
}
