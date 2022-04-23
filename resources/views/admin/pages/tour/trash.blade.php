@extends('admin.master.master')
@section('main')
@section('tour','active')
@section('title', 'Trash')
        <div class="dashboard-bread dashboard--bread dashboard-bread-2">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white">Manage Tour</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="{{route('admin.home')}}" class="text-white">Home</a></li>
                                <li>Tour</li>
                                <li>Trash</li>
                            </ul>
                        </div><!-- end breadcrumb-list -->
                    </div><!-- end col-lg-6 -->
                </div><!-- end row -->
            </div>
        </div>
        <div class="dashboard-main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-box">
                            <div class="form-title-wrap">
                               
                                <div class="d-flex align-items-center justify-content-between">
                                    <h3 class="title">Tour List</h3>
                                    @if(Session::has('success'))
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <strong>{{Session::get('success')}}</strong>
                                    </div>
                                    @endif
                                   
                                    <div class="select-contain">
                                            <select class="select-contain-select" tabindex="-98" onchange="this.form.submit()" name="filterCate">
                                                    @if($filterCate=='all')   <option value="all" selected > All Category </option>   @else   <option value="all"> All Category </option>    @endif
                                                @foreach($cate as $cate)
                                                    @if($filterCate==$cate->id)   <option value="{{$cate->id}}" selected > {{$cate->name}} </option>   @else   <option value="{{$cate->id}}"> {{$cate->name}} </option>    @endif
                                                @endforeach
                                            </select>
                                        
                                    </div>
                                    <div class="select-contain">
                                        
                                            <select class="select-contain-select" tabindex="-98" onchange="this.form.submit()" name="filterVehicle">
                                                    @if($filterVehicle=='all')   <option value="all" selected > All Vehicle </option>   @else   <option value="all"> All Vehicle </option>    @endif
                                                @foreach($vehicle as $vehicle)
                                                    @if($filterVehicle==$vehicle->id)   <option value="{{$vehicle->id}}" selected > {{$vehicle->name}} </option>   @else   <option value="{{$vehicle->id}}"> {{$vehicle->name}} </option>    @endif
                                                @endforeach
                                            </select>
                                     
                                    </div>
                                    <div class="select-contain">
                                       
                                            <select class="select-contain-select" tabindex="-98" onchange="this.form.submit()" name="filterTime">
                                                @if($filterTime=='any')   <option value="any" selected > Any Time </option>   @else   <option value="any"> Any Time </option>    @endif
                                                @if($filterTime=='desc')   <option value="desc" selected > Latest </option>   @else   <option value="desc"> Latest </option>    @endif
                                                @if($filterTime=='asc')   <option value="asc" selected> Oldest </option>   @else   <option value="asc"> Oldest </option>    @endif
                                            </select>
                                        </div>
                                    </div>
                               
                            </div>
                            @foreach($tour as $value)
                            <div class="form-content pb-2">
                                
                                <div class="card-item card-item-list ">
                                    <div class="card-item justify-content-between d-flex align-items-center p-2">
                                        <input class="title" type="checkbox" name="tourChecked[]" id="" value="{{$value->id}}">

                                    </div>
                                    <div class="card-img">
                                        <a href="{{route('tour.show',$value->id)}}" class="d-block">
                                            <img src="{{ url('customers') }}/images/{{$value->image}}" alt="{{$value->image}}">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title"><a href="{{route('tour.show',$value->id)}}">{{$value->name}}</a></h3>
                                        <p class="card-meta">{{$value->from}} – {{$value->to}}</p>
                                        <div class="card-rating">
                                            <span class="badge text-white"><?php $check=0 ?>@foreach($rating as $rate)  @if(!empty($rating[$value->id]))  {{$rating[$value->id]}} @break @else <?php $check++ ?> @endif @endforeach @if($check!=0) 0 @endif /5</span>
                                            <span class="review__text">Average</span>
                                            <span class="rating__text"><?php $check=0 ?>(@foreach($review as $r)  @if(!empty($review[$value->id]))   {{$review[$value->id]}} @break @else <?php $check++ ?> @endif  @endforeach @if($check!=0) 0 @endif Reviews)</span>
                                        </div>
                                        <div class="card-price d-flex align-items-center justify-content-between">
                                            <p>
                                                <span class="price__from">From</span>
                                                <span class="price__num">{{$value->price}}$</span>
                                            </p>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="form-content pb-2">
                                <button onclick="checked()" class="theme-btn theme-btn-small theme-btn-transparent" type="submit">Restore all tour checked</button>
                            </div>
                        </div><!-- end form-box -->
                    </div><!-- end col-lg-12 -->
                </div><!-- end row -->
                <div class="row">
                    <div class="col-lg-12">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                            {{ $tour->links('pagination::bootstrap-4') }}
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="border-top mt-5"></div>
            </div><!-- end container-fluid -->
        </div>
       
        </form>
@stop
@section('js')
<script>
    
    function checked(){
        $('#formBladeDelete').attr('action', "{{route('tour.restoreByCheck',)}}");
    }
    // $('#formBlade').attr('method', "PUT");
</script>
@endsection
@section('searchForm')
<form action="{{route('trash.index')}}" method="GET" id="formBladeDelete" >

@csrf
@endsection

@section('search')
<div class="dashboard-search-box">
    <div class="contact-form-action">
        <?php
            $current_url=strtok(substr(Request::path('adminstrator'),13),'/');
            
            $admin_url=substr(Request::path('adminstrator'),0);
                
        ?>
        @if ($current_url == false)

        @else
          
                <div class="form-group mb-0" >
                    <input class="form-control" type="text" name="search" id="search" placeholder="Search">
                    <button class="search-btn" type="submit"><i class="la la-search"></i></button>
                </div>
        
        @endif
    </div>
</div>
@endsection
