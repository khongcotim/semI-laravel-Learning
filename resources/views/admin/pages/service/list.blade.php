@extends('admin.master.master')
@section('main')
@section('service', 'active')
@section('list_service', 'active')
@section('title', 'List Service')
<div class="dashboard-bread dashboard--bread dashboard-bread-2 ">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="breadcrumb-content">
                    <div class="section-heading">
                        <h2 class="sec__title font-size-30 text-white">Service</h2>
                    </div>
                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-6 -->
            <div class="col-lg-6">
                <div class="breadcrumb-list text-right">
                    <ul class="list-items">
                        <li><a href="{{ route('admin.home') }}" class="text-white">Home</a></li>
                        <li>Service</li>
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
                                    <h3 class="title">Service Lists</h3>
                                    <p class="font-size-14">Showing {{ $service->firstItem() }}
                                        {{ $service->count() != 1 ? 'to' . ' ' . $service->count() : '' }} of
                                        {{ $service->total() }} results</p>
                                </div>
                                <div class="select-contain">
                                    <div class="dropdown">
                                        <select name="condition" onchange="this.form.submit()"
                                            class="select-contain-select" tabindex="-98">
                                            <option value="all" {{ Request::get('condition') == 'all' ? 'selected' : '' }}>Any
                                                Time</option>
                                            <option value="desc" {{ Request::get('condition') == 'desc' ? 'selected' : '' }}>
                                                Latest</option>
                                            <option value="asc" {{ Request::get('condition') == 'asc' ? 'selected' : '' }}>
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
                                        <th scope="col">Price</th>
                                        @if(Auth::user()->role=='admin'||Auth::user()->role=='manager')
                                        <th scope="col">Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($service as $value)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{number_format($value->price) }}</td>
                                            @if (Auth::user()->role == 'admin' || Auth::user()->role == 'manager')
                                                <form action="{{ route('service.destroy', $value->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <td>
                                                        <a href="{{ route('service.edit', $value->id) }}"
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
                    {{ $service->appends($_GET) }}
                </nav>
            </div>
        </div>
        <!-- end row -->
    </div><!-- end container-fluid -->
</div><!-- end dashboard-main-content -->


@stop