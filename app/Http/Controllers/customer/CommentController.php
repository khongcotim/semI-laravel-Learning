<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\customer\Comments;
use App\Models\customer\Order_detail;
use App\Models\customer\Ratings;
use App\Models\customer\Reply;
use GuzzleHttp\RetryMiddleware;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
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
        if(!Auth::guard('customer')->check()){
            return redirect()->route('customer.login')->with('error',"You need to login first");
            exit;
        }elseif(Auth::guard('customer')->user()->status==2){
            return redirect()->back()->with('error',"Your Account Has Been Banned");
            exit;
        }

        if (strpos($request->type, 'blog') !== false) {
            $request->validate([
                'message'=>'required'
            ]);
            $find_blog_id = trim($request->type,'blog');
            $write_comment_blog = Comments::create([
                'id_customer'=>Auth::guard('customer')->user()->id,
                'id_blog'=>$find_blog_id,
                'contents'=>$request->message,
                'status'=>1
            ]);
            if ($write_comment_blog) {
                return redirect()->back()->with('add_success','Write Comment Successfull');
            }else{
                return redirect()->back()->with('error','Sorry, You can not comment on this blog');
            }
        }
        if ($request->has('tour')) {
            $request->validate([
                'message'=>'required'
            ]);
            $find_order_to_write_review = Order_detail::where('id_customer',Auth::guard('customer')->user()->id)->get();

            if (count($find_order_to_write_review)>0) {

                $write_comment_tour = Comments::create([
                    'id_customer'=>Auth::guard('customer')->user()->id,
                    'id_tour'=>$request->tour,
                    'contents'=>$request->message,
                    'status'=>1
                ]);
                if($request->has('review_rate')){
                    $review_rate=$request->review_rate;
                }else{
                    $review_rate='0';
                }
                $customer_rate=Ratings::where('id_customer','=',Auth::guard('customer')->user()->id)->where('id_tour','=',$request->tour)->first();
                if($customer_rate==null){
                    $write_rate_tour = Ratings::create([
                        'id_customer'=>Auth::guard('customer')->user()->id,
                        'id_tour'=>$request->tour,
                        'id_tour_guide'=>null,
                        'rating_star'=>$review_rate
                    ]);
                }else{
                    $customer_rate->update([
                        'id_tour_guide'=>null,
                        'rating_star'=>$review_rate
                    ]);
                }
                $scroll=$request->Y;
                if ($write_comment_tour) {
                    return redirect()->back()->with('add_success','Write Comment Successfull')->with('scroll',$scroll);
                }else{
                    return redirect()->back()->with('error','Sorry, You can not comment on this blog')->with(compact('scroll'));
                }
            }else{
                return redirect()->back()->with('warning','Please booking a tour to write reviews');
            }

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
        Reply::where('reply_to','=',$id)->delete();
        Comments::find($id)->delete();
        $scroll=0;
        return redirect()->back()->with(compact('scroll'));
    }
}
