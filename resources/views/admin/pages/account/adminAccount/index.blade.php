@extends('admin.master.master')
@section('main')
@section('account','active')
@section('title', 'Account')
        <div class="dashboard-bread dashboard--bread dashboard-bread-2">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white">Manager Account</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="{{route('admin.home')}}" class="text-white">Home</a></li>
                                <li>Account</li>
                                <li>Manager Account</li>
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
                                    <div>
                                        <h3 class="title">Order Lists</h3>
                                    </div>
                                    <div class="select-contain">
                                        <div class="dropdown bootstrap-select select-contain-select">
                                            <div class="dropdown bootstrap-select select-contain-select">
                                                
                                                    <select class="select-contain-select" tabindex="-98" onchange="this.form.submit()" name="filter">
                                                        @if($filter=='any')   <option value="any" selected > Any Time </option>   @else   <option value="any"> Any Time </option>    @endif
                                                        @if($filter=='desc')   <option value="desc" selected > Latest </option>   @else   <option value="desc"> Latest </option>    @endif
                                                        @if($filter=='asc')   <option value="asc" selected> Oldest </option>   @else   <option value="asc"> Oldest </option>    @endif
                                                    </select>
                                                    <select class="select-contain-select" tabindex="-98" onchange="this.form.submit()" name="office">
                                                        @if($office=='all')   <option value="all" selected > All </option>   @else   <option value="all"> All </option>    @endif
                                                        @if($office=='admin')   <option value="admin" selected > Admin </option>   @else   <option value="admin"> Admin </option>    @endif
                                                        @if($office=='manager')   <option value="manager" selected > Manager </option>   @else   <option value="manager"> Manager </option>    @endif
                                                        @if($office=='staff')   <option value="staff" selected > Staff </option>   @else   <option value="manager"> Staff </option>    @endif
                                                        @if($office=='quit')   <option value="quit" selected> Quit </option>   @else   <option value="quit"> Quit </option>    @endif
                                                    </select>
                                                
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-title-wrap">
                                @if(Auth::user()->role!='staff')
                                <a href="{{route('accountAdmin.create')}}" class="theme-btn theme-btn-small" data-toggle="tooltip" data-placement="top" title="" data-original-title="Create">Create Account</a>
                                @endif
                            </div>
                            <div class="form-content">
                                <div class="table-form table-responsive">
                                    @if(Session::has('success'))
                                    <div class="alert alert-success">
                                        <strong>{{Session::get('success')}}</strong>
                                    </div>
                                    @endif
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Avatar</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Position</th>
                                            <th scope="col">Created Day</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($list_account as $value)
                                        <tr>
                                            <th scope="row">{{$loop->index+1}}</th>
                                            <td><img src="{{ url('admin') }}/images/{{$value->avatar}}" alt="view" style="width:50px;border:none"></td>
                                            <td>
                                                <div class="table-content">
                                                    <h3 class="title">{{$value->name}}</h3>
                                                </div>
                                            </td>
                                            <td>{{$value->email}}</td>
                                            <td>{{$value->phone}}</td>
                                            <td>{{$value->address}}</td>
                                            <td>{{$value->role}}</td>
                                            <td>{{$value->created_at}}</td>
                                            <td>
                                                <div class="table-content">
                                                    <a href="#" class="theme-btn theme-btn-small mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"><i class="la la-eye"></i></a>
                                                    @if((Auth::user()->role == 'admin' && $value->role != 'admin')||(Auth::user()->role == 'manager' && $value->role == 'staff')||(Auth::user()->id==$value->id))
                                                    <a href="{{route('accountAdmin.show',$value->id)}}" class="theme-btn theme-btn-small" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="la la-edit"></i></a>
                                                    @endif
                                                </div>
                                            </td>
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
                            <ul class="pagination">
                            {{ $list_account->links('pagination::bootstrap-4') }}
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="border-top mt-5"></div>
            </div><!-- end container-fluid -->
        </div>
        </form>
@stop
@section('searchForm')
<form action="{{route('accountAdmin.index')}}" method="GET">
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
                    <input class="form-control" type="text" name="search" id="search" placeholder="Search" value="{{$search_value}}">
                    <button class="search-btn" type="submit"><i class="la la-search"></i></button>
                </div>
        
        @endif
    </div>
</div>
@endsection