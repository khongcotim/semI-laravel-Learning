<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Blog;
use App\Http\Requests\admin\blog\AddBlogRequest;
use App\Http\Requests\admin\blog\EditBlogRequest;
use App\Models\customer\Comments;
use App\Models\customer\Reply;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $suggest = '';
        if ($request->has('search_key')) {
            $search_key = $request->search_key;
            $find_blog_follow_key = Blog::where('title','like',"%$search_key%")->get();
            foreach ($find_blog_follow_key as $key => $value) {
                $suggest .="<div class='card-item card-item-list recent-post-card mb-0'>
                <div class='card-img'>";
                $show_item = route('blog.show', $value->id);
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
        if ($request->has('keyword')) {
            $keyword = $request->keyword;
            if ($request->has('condition')) {
                $condition = $request->condition;
                if ($condition == 'all') {
                     $blog = Blog::leftjoin('Admin','Admin.id','Blog.admin_id')
                                ->leftjoin('Customer','Customer.id','Blog.customer_id')
                                ->select('Customer.name as customer_name','Customer.avatar as customer_avt','Admin.name as admin_name','Admin.avatar as admin_avt','Blog.*')
                                ->where('Blog.title','like',"%$keyword%")
                                ->paginate(5);
                }elseif ($condition=='desc' || $condition == 'asc') {
                    $blog = Blog::leftjoin('Admin','Admin.id','Blog.admin_id')
                                ->leftjoin('Customer','Customer.id','Blog.customer_id')
                                ->select('Customer.name as customer_name','Customer.avatar as customer_avt','Admin.name as admin_name','Admin.avatar as admin_avt','Blog.*')
                                ->where('Blog.title','like',"%$keyword%")
                                ->orderBy('created_at',$condition)
                                ->paginate(5);
                }
            }else{
                $blog = Blog::leftjoin('Admin','Admin.id','Blog.admin_id')
                            ->leftjoin('Customer','Customer.id','Blog.customer_id')
                            ->select('Customer.name as customer_name','Customer.avatar as customer_avt','Admin.name as admin_name','Admin.avatar as admin_avt','Blog.*')
                            ->where('Blog.title','like',"%$keyword%")
                            ->paginate(5);
            }
        }else{
            if ($request->has('condition')) {
                $condition = $request->condition;
                if ($condition == 'all') {
                     $blog = Blog::leftjoin('Admin','Admin.id','Blog.admin_id')
                                ->leftjoin('Customer','Customer.id','Blog.customer_id')
                                ->select('Customer.name as customer_name','Customer.avatar as customer_avt','Admin.name as admin_name','Admin.avatar as admin_avt','Blog.*')
                                ->paginate(5);
                }elseif ($condition=='desc' || $condition == 'asc') {
                    $blog = Blog::leftjoin('Admin','Admin.id','Blog.admin_id')
                                ->leftjoin('Customer','Customer.id','Blog.customer_id')
                                ->select('Customer.name as customer_name','Customer.avatar as customer_avt','Admin.name as admin_name','Admin.avatar as admin_avt','Blog.*')
                                ->orderBy('created_at',$condition)
                                ->paginate(5);
                }
            }else{
                $blog = Blog::leftjoin('Admin','Admin.id','Blog.admin_id')
                            ->leftjoin('Customer','Customer.id','Blog.customer_id')
                            ->select('Customer.name as customer_name','Customer.avatar as customer_avt','Admin.name as admin_name','Admin.avatar as admin_avt','Blog.*')
                            ->paginate(5);
            }
        }
        
        return view('admin.pages.blog.list',compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.blog.create');
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
            $file_name = time().$file->getClientoriginalName();
            $file->move(public_path('admin/images'),$file_name);
        }
        Blog::create([
            'title'=>$request->title,
            'slug'=>$request->slug.'-'.Str::random(20),
            'admin_id'=>Auth::user()->id,
            'image'=>$file_name,
            'contents'=>$request->contents,
            'who_accept'=>Auth::user()->id,
        ]);
        return redirect()->route('blog.index')->with('add_success','Add Blog successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog_found = Blog::leftjoin('Admin', 'Admin.id', 'Blog.admin_id')
            ->leftjoin('Customer', 'Customer.id', 'Blog.customer_id')
            ->select('Customer.name as customer_name', 'Customer.avatar as customer_avt', 'Admin.name as admin_name', 'Admin.avatar as admin_avt', 'Blog.*')
            ->where('Blog.id', $id)
            ->where('Blog.who_accept', '!=', 'null')
            ->first();
        $prev_blog = Blog::where('id', '<', $blog_found->id)->orderBy('id', 'desc')->where('Blog.who_accept', '!=', 'null')->first();
        $new_post = Blog::orderBy('created_at','DESC')->limit(3)->get();
        $next_blog = Blog::where('id', '>', $blog_found->id)->orderBy('id', 'asc')->where('Blog.who_accept', '!=', 'null')->first();
        $related_blog = Blog::where('id', '!=', $blog_found->id)->where('Blog.who_accept', '!=', 'null')->limit(2)->get();

        //Comments
        $find_blog = Blog::find($id);
        $comments = Comments::leftjoin('Customer','Customer.id','=','Comments.id_customer')
                            ->leftjoin('Reply','Reply.reply_to','=','Comments.id')
                            ->leftjoin('Admin','Admin.id','=','Reply.admin_reply')
                            ->leftjoin('Blog','Blog.id','Comments.id_blog')
                            ->select('Customer.name as cus_name','Customer.id as cus_id','Customer.avatar as cus_avt','Comments.*')
                            ->where('Blog.id',$id)
                            ->distinct()
                            ->get();
        $reply_cmt = [];
        foreach ($comments as $key => $value) {
            $find_reply = Reply::leftjoin('Comments','Comments.id','Reply.reply_to')
                                ->leftjoin('Customer','Reply.customer_reply','Customer.id')
                                ->leftjoin('Blog','Blog.id','Comments.id_blog')
                                ->leftjoin('Admin','Admin.id','Reply.admin_reply')
                                ->select('Reply.*','Admin.name as admin_name','Admin.avatar as admin_avt','Customer.name as cus_name','Customer.avatar as cus_avt')
                                ->where('Blog.id',$id)
                                ->where('Reply.type','=','blog')
                                ->where('Reply.reply_to',$value->id)
                                ->distinct()
                                ->get();
            $reply_cmt[$value->id] = $find_reply;
        }
        $count_comment = count($comments);
        return view('admin.pages.blog.infor', compact('blog_found', 'prev_blog', 'next_blog', 'related_blog','new_post','comments','count_comment','reply_cmt'));
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
        return view('admin.pages.blog.edit',compact('blog_found'));
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
        $blog_found = Blog::find($id);
        if ($request->has('who_accept_blog')) {
            $who_accept_blog = $request->who_accept_blog;
            $accept_blog = $blog_found->update([
                'who_accept'=>$who_accept_blog
            ]);
            if ($accept_blog) {
                return redirect()->back()->with('edit_success','Accept this blog');
            }else{
                return redirect()->back()->with('error',"Get error when update this blog. Please try again");
            }
        }else{
            if ($request->has('image')) {
                $file = $request->image;
                $file_name = time().$file->getClientoriginalName();
                $file->move(public_path('admin/images'),$file_name);
            }else{
                $file_name = $blog_found->image;
            }
            $blog_found->update([
                'title'=>$request->title,
                'admin_id'=>Auth::user()->id,
                'slug'=>$request->slug.'-'.Str::random(20),
                'image'=>$file_name,
                'contents'=>$request->contents,
            ]);
            return redirect()->route('blog.index')->with('edit_success','Update Blog successfully');
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
        $blog= Blog::find($id);
        $blog->delete($id);
        if ($blog) {
            return redirect()->route('blog.index')->with('delete_success','Delete Blog successfully');
        }else{
            echo ('lỗi rồi');
        }
    }
}
