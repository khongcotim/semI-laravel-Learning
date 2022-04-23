@extends('admin.master.master')
@section('main')
@section('banner','active')
@section('manage_banner','active')
@section('title','Manage Banner')
<div class="dashboard-bread dashboard--bread dashboard-bread-2 ">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="breadcrumb-content">
                    <div class="section-heading">Banner</h2>
                    </div>
                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-6 -->
            <div class="col-lg-6">
                <div class="breadcrumb-list text-right">
                    <ul class="list-items">
                        <li><a href="{{route('admin.home')}}" class="text-white">Home</a></li>
                        <li>Banner</li>
                        <li>Manage Banner</li>
                    </ul>
                </div><!-- end breadcrumb-list -->
            </div><!-- end col-lg-6 -->
        </div><!-- end row -->
    </div>
</div><!-- end dashboard-bread -->
<div class="dashboard-main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-box">
                    <div class="form-title-wrap">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h3 class="title">Manage Banner</h3>
                                <p class="font-size-14">Showing {{$banner->firstItem()}} {{$banner->count()!=1 ? "to".' '.$banner->count():""}} of {{$banner->total()}} results</p>
                            </div>
                            <form>
                                @if ($get_keyword != '')
                                    <input type="hidden" name="keyword" value="{{ $get_keyword }}">
                                @else
                                @endif
                                <div class="select-contain">
                                    <div class="dropdown"><select onchange="this.form.submit()" name="condition" class="select-contain-select" tabindex="-98">
                                        <option value="all" {{Request::get('condition')=='all'?'selected':''}}>Any Time</option>
                                        <option value="desc" {{Request::get('condition')=='desc'?'selected':''}}>Latest</option>
                                        <option value="asc" {{Request::get('condition')=='asc'?'selected':''}}>Oldest</option>
                                    </select>
                                </div>
                            </form>
                           
                        </div>
                    </div>
                   <div class="form-content">
                       <div class="table-form table-responsive">
                           <table class="table">
                               <thead>
                               <tr>
                                   <th scope="col">STT</th>
                                   <th scope="col">Title</th>
                                   <th scope="col">Page</th>
                                   <th scope="col">Background</th>
                                   <th scope="col">Status</th>
                                   {{-- <th scope="col">Product Linked</th> --}}
                                   <th scope="col">Action</th>
                               </tr>
                               </thead>
                               <tbody>
                                   @foreach ($banner as $value)
                                        <tr>
                                            <td >{{$loop->index+1}}</td>
                                            <td title="Click to view Detail" style="cursor: pointer" onclick="view_detail({{$value->id}})">{{$value->title}}</td>
                                            <td>{{ucfirst(trans($value->page))}}</td>
                                            <td>
                                                <img width="225px" title="Link banner:{{$value->link}}" src="{{url('admin')}}/images/{{$value->image}}" alt="{{$value->image}}">
                                            </td>
                                            <td>{{$value->status==0?'Hidden':'Active'}}</td>
                                            
                                            <form action="{{route('banner.destroy',$value->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <td>
                                                    <a href="{{route('banner.edit',$value->id)}}" class="btn btn-primary">Edit</a>
                                                    @if(Auth::user()->role=='admin'||Auth::user()->role=='manager')
                                                    <button class="btn btn-danger" type="submit" onclick="return confirm('Do you want to delete this')">Delete</button>
                                                    @endif
                                                </td>
                                            </form>
                                        </tr>
                                   @endforeach
                               </tbody>
                           </table>
                       </div>
                   </div>
                </div><!-- end form-box -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="Page navigation example">
                    {{ $banner->appends($_GET) }}
                </nav>
            </div>
        </div>
       <!-- end row -->
    </div><!-- end container-fluid -->
</div><!-- end dashboard-main-content -->


@stop
@section('js')
<script>
    function view_detail(id) {
        var current_url = "{{route('banner.index')}}";
        window.location.href = ""+current_url+'/'+id;
    }
</script>
@endsection