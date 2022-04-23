<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\customer\blog\AddBlogRequest;
use App\Http\Requests\customer\blog\EditBlogRequest;
use App\Models\admin\Banner;
use App\Models\admin\Blog;
use App\Models\customer\Comments;
use App\Models\customer\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //search_blog
        $suggest = '';
        if ($request->has('search_key')) {
            $search_key = $request->search_key;
            $find_blog_follow_key = Blog::where('title','like',"%$search_key%")->get();
            foreach ($find_blog_follow_key as $key => $value) {
                $suggest .="<div class='card-item card-item-list recent-post-card mb-0'>
                <div class='card-img'>";
                $show_item = route('blogs.show', $value->slug);
                $url_blog = url('admin/images').'/'.$value->image;
                $format_time = Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('d F Y');
                $min_read = number_format((strlen($value->contents)/240));
                $suggest .= "
                    <a href='{$show_item}' class='d-block'>
                        <img src='{$url_blog}' width='93' height = '103' alt='{$value->image}'>
                    </a>
                </div>
                <div class='card-body'>
                    <h3 class='card-title'><a href='{$show_item}'>{$value->title}</a></h3>
                    <p class='card-meta'>
                        <span class='post__date'> {$format_time}</span>
                        <span class='post-dot'></span>
                        <span class='post__time'>{$min_read} Mins read</span>
                    </p>
                </div>
            </div><!-- end card-item -->";
            }
            return $suggest;
        }

        $blog_banner = Banner::where('page', '=', 'blog')->first();
        $blog = Blog::leftjoin('Admin', 'Admin.id', 'Blog.admin_id')
            ->leftjoin('Customer', 'Customer.id', 'Blog.customer_id')
            ->select('Customer.name as customer_name','Customer.id as cus_id', 'Customer.avatar as customer_avt', 'Admin.name as admin_name', 'Admin.avatar as admin_avt', 'Blog.*')
            ->where('Blog.who_accept', '!=', 'null')
            ->paginate(6);

        $data = '';
        if ($request->ajax()) {
            foreach ($blog as $item) {
                $data .= "<div class='col-lg-4 responsive-column'>
                        <div class='card-item blog-card'>
                            <div class='card-img'>";
                            $url_blog = url('admin/images').'/'.$item->image;
                            $data.="<img src='{$url_blog}' height='400' alt='blog_img'>";
                            $data.="
                                <div class='card-body'>
                                    <h3 class='card-title line-height-26'><a href='";
                                    $show_item = route('blogs.show', $item->slug);
                                    $data .="{$show_item}'>";
                                    $data .="$item->title</a></h3>";
                                    $data .= "
                                    <p class='card-meta'>";
                                    $format_time = Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)->format('d F Y');
                                    $data.="
                                        <span class='post__date'>{$format_time}</span>
                                        <span class='post-dot'></span>
                                        <span class='post__time'>";
                                        $min_read = number_format((strlen($item->contents)/240));
                                        $data .="{$min_read} Mins read</span>
                                    </p>
                                </div>
                            </div>
                            <div class='card-footer d-flex align-items-center justify-content-between'>
                                <div class='author-content d-flex align-items-center'>
                                    <div class='author-img'>";
                                        if ($item->customer_avt != null) {
                                            $url_customers = url('customers/images').'/'.$item->customer_avt;
                                            $data .= "<img src='{$url_customers}' height='400' alt='customer_avt'>";
                                        }
                                        if ($item->admin_id != null) {
                                            $url_admin = url('admin/images').'/'.$item->admin_avt;
                                            $data .= "<img src='{$url_admin}' height='400' alt='avatar_admin'>";
                                        }
                                        $data.="
                                        </div>
                                        <div class='author-bio'>";
                                            if ($item->customer_name != null){
                                                $cus_link = route('user_profile',$item->cus_id);
                                                $data .= "<a href='{$cus_link}' class='author__title'>{$item->customer_name}</a>";
                                            }
                                            if ($item->admin_name != null){
                                                $data .= "<a href='#' class='author__title'>{$item->admin_name}</a>";
                                            }
                                        $data .="
                                        </div>
                                    </div>
                                    <div class='post-share'>
                                    <ul>
                                        <li>
                                            <i class='la la-share icon-element'></i>
                                            <ul class='post-share-dropdown d-flex align-items-center'>
                                                <li><a href='#'><i class='lab la-facebook-f'></i></a></li>
                                                <li><a href='#'><i class='lab la-twitter'></i></a></li>
                                                <li><a href='#'><i class='lab la-instagram'></i></a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- end card-item -->
                    </div><!-- end col-lg-4 -->";
            }
            return $data;
        }
        return view('customer.pages.blog', compact('blog_banner', 'blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.pages.add_new_post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddBlogRequest $request)
    {
        if ($request->has('image')) {
            $file = $request->image;
            $file_name = time() . $file->getClientoriginalName();
            $file->move(public_path('admin/images'), $file_name);
        }
        Blog::create([
            'title' => $request->title,
            'slug' => $request->slug . '-' . Str::random(20),
            'customer_id' => Auth::guard('customer')->user()->id,
            'image' => $file_name,
            'contents' => $request->contents,
        ]);
        return redirect()->route('blogs.index')->with('add_success', 'Add Blog successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $blog_found = Blog::leftjoin('Admin', 'Admin.id', 'Blog.admin_id')
            ->leftjoin('Customer', 'Customer.id', 'Blog.customer_id')
            ->select('Customer.name as customer_name','Customer.id as cus_id', 'Customer.avatar as customer_avt', 'Admin.name as admin_name', 'Admin.avatar as admin_avt', 'Blog.*')
            ->where('Blog.slug', $slug)
            ->where('Blog.who_accept', '!=', 'null')
            ->first();
        $prev_blog = Blog::where('id', '<', $blog_found->id)->orderBy('id', 'desc')->where('Blog.who_accept', '!=', 'null')->first();
        $recent_post = '';
        if (Auth::guard('customer')->check()) {
            $recent_post = Blog::where('status',Auth::guard('customer')->user()->id)->orderBy('updated_at','DESC')->get();
            $blog_seeing = Blog::where('slug',$slug)->first();
            $blog_saw = Blog::find($blog_seeing->id);
            $blog_saw->update([
                'status'=>Auth::guard('customer')->user()->id,
                'updated_at'=>Carbon::now('Asia/Ho_Chi_Minh')
            ]);
        }
        $new_post = Blog::orderBy('created_at','DESC')->limit(3)->get();
        $next_blog = Blog::where('id', '>', $blog_found->id)->orderBy('id', 'asc')->where('Blog.who_accept', '!=', 'null')->first();
        $related_blog = Blog::where('id', '!=', $blog_found->id)->where('Blog.who_accept', '!=', 'null')->limit(2)->get();

        //Comments
        $find_blog = Blog::where('slug',$slug)->get();
        $id_blog = $find_blog[0]->id;
        $comments = Comments::leftjoin('Customer','Customer.id','=','Comments.id_customer')
                            ->leftjoin('Reply','Reply.reply_to','=','Comments.id')
                            ->leftjoin('Admin','Admin.id','=','Reply.admin_reply')
                            ->leftjoin('Blog','Blog.id','Comments.id_blog')
                            ->select('Customer.name as cus_name','Customer.id as cus_id','Customer.avatar as cus_avt','Comments.*')
                            ->where('Blog.id',$id_blog)
                            ->distinct()
                            ->get();
        $reply_cmt = [];
        foreach ($comments as $key => $value) {
            $find_reply = Reply::leftjoin('Comments','Comments.id','Reply.reply_to')
                                ->leftjoin('Customer','Reply.customer_reply','Customer.id')
                                ->leftjoin('Blog','Blog.id','Comments.id_blog')
                                ->leftjoin('Admin','Admin.id','Reply.admin_reply')
                                ->select('Reply.*','Admin.name as admin_name','Admin.avatar as admin_avt','Customer.name as cus_name','Customer.avatar as cus_avt')
                                ->where('Blog.id',$id_blog)
                                ->where('Reply.type','=','blog')
                                ->where('Reply.reply_to',$value->id)
                                ->distinct()
                                ->get();
            $reply_cmt[$value->id] = $find_reply;
        }
        $count_comment = count($comments);
        return view('customer.pages.blog_detail', compact('blog_found', 'prev_blog', 'next_blog', 'related_blog','recent_post','new_post','comments','count_comment','reply_cmt'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog_found = Blog::find($id);
        return view('customer.pages.edit_blog',compact('blog_found'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditBlogRequest $request, $id)
    {
        $find_blog = Blog::find($id);
        if ($request->has('image')) {
            $file = $request->image;
            $file_name = time() . $file->getClientoriginalName();
            $file->move(public_path('admin/images'), $file_name);
        }else{
            $file_name = $find_blog->image;
        }
        $update_blog = $find_blog->update([
            'title' => $request->title,
            'slug' => $find_blog->slug,
            'customer_id' => Auth::guard('customer')->user()->id,
            'image' => $file_name,
            'contents' => $request->contents,
        ]);
        if ($update_blog) {
            return redirect()->route('my_blog')->with('edit_success',"Update Blog successfull !!");
        }else{
            return redirect()->route('my_blog')->with('error',"Sorry. Can't edit your blog right now");
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
