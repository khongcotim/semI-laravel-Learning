@extends('customer.master.master_two')
@section('main')
@section('title')
Profile | {{$find_user->name}}
@endsection
<section class="breadcrumb-area bread-bg-9">
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="breadcrumb-content">
                        <div class="section-heading">
                            <h2 class="sec__title text-white">User Profile</h2>
                        </div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="breadcrumb-list text-right">
                        <ul class="list-items">
                            <li><a href="{{ route('customer.index') }}">Home</a></li>
                            <li>User Profile</li>
                        </ul>
                    </div><!-- end breadcrumb-list -->
                </div><!-- end col-lg-6 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end breadcrumb-wrap -->
    <div class="bread-svg-box">
        <svg class="bread-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none">
            <polygon points="100 0 50 10 0 0 0 10 100 10"></polygon>
        </svg>
    </div><!-- end bread-svg -->
</section><!-- end breadcrumb-area -->
<section class="user-area padding-top-100px padding-bottom-60px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
               <h3 class="title font-size-24">User Information</h3>
                <div class="card-item user-card card-item-list mt-4 mb-0">
                    <div class="card-img">
                        <img src="{{url('customers')}}/images/{{$find_user->avatar}}" style="object-fit: cover" alt="user avatar" class="h-auto">
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">{{$find_user->name}}</h3>
                        <p class="card-meta">Member since  {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $find_user->created_at)->format('F Y') }}</p>
                        <div class="d-flex justify-content-between pt-3">
                            <ul class="list-items list-items-2 flex-grow-1">
                                <li><span>Email:</span>{{$find_user->email}}</li>
                                <li><span>Phone:</span>{{$find_user->phone}}</li>
                                <li><span>Address:</span>{{$find_user->address}}</li>
                            </ul>
                             <ul class="list-items flex-grow-1">
                                <li><h3 class="title">Verifications</h3></li>
                                <li class="d-flex justify-content-between align-items-center"><span class="color-text-2 font-weight-medium mr-2">Phone</span><span class="theme-btn theme-btn-small theme-btn-rgb">Verified</span></li>
                                <li class="d-flex justify-content-between align-items-center"><span class="color-text-2 font-weight-medium mr-2">Email</span><span class="theme-btn theme-btn-small theme-btn-rgb">Verified</span></li>
                                @if ($find_user->id_card != null)
                                    <li class="d-flex justify-content-between align-items-center"><span class="color-text-2 font-weight-medium mr-2">ID Card</span><span class="theme-btn theme-btn-small theme-btn-rgb">Verified</span></li>
                                @else
                                    <li class="d-flex justify-content-between align-items-center"><span class="color-text-2 font-weight-medium mr-2">ID Card</span><span class="theme-btn theme-btn-small theme-btn-rgb theme-btn-danger-rgb">Not verified</span></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div><!-- end card-item -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end user-area -->
@stop
