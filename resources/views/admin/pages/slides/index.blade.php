@extends('admin.master.master')
@section('main')
@section('slides','active')
@section('manage_slides','active')
@section('title','Manage Slides')
<div class="dashboard-bread dashboard--bread dashboard-bread-2 ">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="breadcrumb-content">
                    <div class="section-heading">Slides</h2>
                    </div>
                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-6 -->
            <div class="col-lg-6">
                <div class="breadcrumb-list text-right">
                    <ul class="list-items">
                        <li><a href="{{route('admin.home')}}" class="text-white">Home</a></li>
                        <li>Slides</li>
                        <li>Manage Slides</li>
                    </ul>
                </div><!-- end breadcrumb-list -->
            </div><!-- end col-lg-6 -->
        </div><!-- end row -->
    </div>
</div><!-- end dashboard-bread -->
<div class="dashboard-main-content ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-box">
                    <div class="form-title-wrap">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h3 class="title">Manage Slides</h3>
                                <p class="font-size-14">Showing {{$slides->firstItem()}} {{$slides->count()!=1 ? "to".' '.$slides->count():""}} of {{$slides->total()}} results</p>
                            </div>
                            <form action="">
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
                                   <th scope="col">Position</th>
                                   <th scope="col">Title</th>
                                   <th scope="col">Image</th>
                                   <th scope="col">Max Slide</th>
                                   <th scope="col" title="Change status to display your slide in user page">Status</th>
                                   <th scope="col">Action</th>
                               </tr>
                               </thead>
                               <tbody>
                                   @foreach ($slides as $value)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$value->position}}</td>
                                            <td>{{$value->title}}</td>
                                            <td>
                                                <img title="Link is {{$value->link}}" width="225px" src="{{url('admin')}}/images/{{$value->image}}" alt="{{$value->image}}">
                                            </td>
                                            <td>{{$value->max}}</td>
                                            <td>
                                                <form action="{{route('slide.update_status')}}" method="GET">
                                                    <div class="select-contain" id="update_status" >
                                                        <input type="hidden" name="id_slide" name="id_slide" value="{{$value->id}}">
                                                        <div class="dropdown"><select class="select-contain-select" onchange="this.form.submit()" name="status" tabindex="-98">
                                                            <option value="0" {{$value->status==0?'selected':''}}>Hidden</option>
                                                            <option value="1" {{$value->status==1?'selected':''}}>Active</option>
                                                        </select>
                                                    </div>
                                                </form>
                                            </td>
                                            <form action="{{route('slides.destroy',$value->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <td>
                                                    <a href="{{route('slides.edit',$value->id)}}" class="btn btn-primary">Edit</a>
                                                    <button class="btn btn-danger" type="submit" onclick="return confirm('Do you want to delete this')">Delete</button>
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
                    {{$slides->appends($_GET)}}
                </nav>
            </div>
        </div>
        
        
       <!-- end row -->
    </div><!-- end container-fluid -->
</div><!-- end dashboard-main-content -->
@stop
@section('js')
    <script>
        $('#update_status').on('change', function(){
            var status = $('#status').val();
            var id_slide = $('#id_slide').val();
            var url = window.location.href;
           $.ajax({
               type: "GET",
               url: "{{route('slide.update_status')}}",
               data: {
                status:status,
                id_slide:id_slide,
               },
               success: function (response) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                        })
                        Toast.fire({
                        icon: 'success',
                        title: response
                    })
               }
           });
        })
    </script>
@endsection