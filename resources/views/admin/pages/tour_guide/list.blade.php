@extends('admin.master.master')
@section('main')
@section('tour_guide', 'active')
@section('list_tour_guide', 'active')
@section('title', 'List tour_guide')
<div class="dashboard-bread dashboard--bread dashboard-bread-2 ">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="breadcrumb-content">
                    <div class="section-heading">
                        <h2 class="sec__title font-size-30 text-white">Tour Guide</h2>
                    </div>
                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-6 -->
            <div class="col-lg-6">
                <div class="breadcrumb-list text-right">
                    <ul class="list-items">
                        <li><a href="{{ route('admin.home') }}" class="text-white">Home</a></li>
                        <li>Tour Guide</li>
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
                    <form method="GET">
                        @if ($get_keyword != '')
                            <input type="hidden" name="keyword" value="{{ $get_keyword }}">
                        @else
                        @endif
                        <div class="form-title-wrap">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="title">Tour Guide Lists</h3>
                                    <p class="font-size-14">Showing {{ $tour_guide->firstItem() }}
                                        {{ $tour_guide->count() != 1 ? 'to' . ' ' . $tour_guide->count() : '' }} of
                                        {{ $tour_guide->total() }} results</p>
                                </div>
                                <div class="select-contain">
                                    <div class="dropdown">
                                        <select name="condition" onchange="this.form.submit()"
                                            class="select-contain-select" tabindex="-98">
                                            <option value="all"
                                                {{ Request::get('condition') == 'all' ? 'selected' : '' }}>Any
                                                Time</option>
                                            <option value="desc"
                                                {{ Request::get('condition') == 'desc' ? 'selected' : '' }}>
                                                Latest</option>
                                            <option value="asc"
                                                {{ Request::get('condition') == 'asc' ? 'selected' : '' }}>
                                                Oldest</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="form-content">
                        <div class="table-form table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Avatar</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Gender</th>
                                        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'manager')
                                            <th scope="col">Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tour_guide as $value)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->phone }}</td>
                                            <td><img src="{{ url('customers/images') }}/{{ $value->avatar }}" alt=""
                                                    width="100px"></td>
                                            <td>{{ number_format($value->price) }}</td>
                                            <td>{{ $value->email }}</td>
                                            <td>{{ $value->address }}</td>
                                            <td>{{ $value->description }}</td>
                                            <td>{{ $value->gender == 0 ? 'Nam' : 'Nữ' }}</td>
                                            @if (Auth::user()->role == 'admin' || Auth::user()->role == 'manager')
                                                <form action="{{ route('tour_guide.destroy', $value->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <td>
                                                        <a href="{{ route('tour_guide.edit', $value->id) }}"
                                                            class="btn btn-primary">Edit</a>
                                                        <button class="btn btn-danger" type="submit"
                                                            onclick="return confirm('Do you want to delete this')">Delete</button>
                                                    </td>
                                                </form>
                                            @else
                                            @endif
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
                    {{ $tour_guide->appends($_GET) }}
                </nav>
            </div>
        </div>
        <!-- end row -->
    </div><!-- end container-fluid -->
</div><!-- end dashboard-main-content -->


@stop
