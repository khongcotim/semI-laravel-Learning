@extends('admin.master.master')
@section('main')
@section('blog', 'active')
@section('list_blog', 'active')
@section('title', 'Manage Blog')
<div class="dashboard-bread dashboard--bread dashboard-bread-2 ">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="breadcrumb-content">
                    <div class="section-heading">Blog</h2>
                    </div>
                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-6 -->
            <div class="col-lg-6">
                <div class="breadcrumb-list text-right">
                    <ul class="list-items">
                        <li><a href="{{ route('admin.home') }}" class="text-white">Home</a></li>
                        <li>Blog</li>
                        <li>Manage Blog</li>
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
                                <h3 class="title">Blog Lists</h3>
                                <p class="font-size-14">Showing {{ $blog->firstItem() }}
                                    {{ $blog->count() != 1 ? 'to' . ' ' . $blog->count() : '' }} of {{ $blog->total() }} results
                                </p>
                            </div>
                            <form>
                                @if ($get_keyword != '')
                                    <input type="hidden" name="keyword" value="{{ $get_keyword }}">
                                @else
                                @endif
                                <div class="select-contain">
                                    <div class="dropdown"><select name="condition" class="select-contain-select"
                                            tabindex="-98" onchange="this.form.submit()">
                                            <option value="all"
                                                {{ Request::get('condition') == 'all' ? 'selected' : '' }}>Any
                                                Time</option>
                                            <option value="desc"
                                                {{ Request::get('condition') == 'desc' ? 'selected' : '' }}>
                                                Latest</option>
                                            <option value="asc"
                                                {{ Request::get('condition') == 'asc' ? 'selected' : '' }}>Oldest
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="form-content">
                            <div class="table-form table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Type</th>
                                            <th scope="col">Avatar's Creator</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Created At</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($blog as $value)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                @if ($value->admin_name != '')
                                                    <td title="Click to view Detail" style="cursor: pointer"
                                                        onclick="view_detail({{ $value->id }})">
                                                        {{ $value->admin_name }}</td>
                                                @elseif($value->customer_name !='')
                                                    <td title="Click to view Detail" style="cursor: pointer"
                                                        onclick="view_detail({{ $value->id }})">
                                                        {{ $value->customer_name }}</td>
                                                @endif
                                                @if ($value->admin_name != '')
                                                    <td>Admin</td>
                                                @elseif($value->customer_name !='')
                                                    <td>Customer</td>
                                                @endif
                                                @if ($value->customer_avt != '')
                                                    <td>
                                                        <img width="125px"
                                                            src="{{ url('admin') }}/images/{{ $value->customer_avt }}"
                                                            alt="{{ $value->customer_avt }}">
                                                    </td>
                                                @elseif($value->admin_avt !='')
                                                    <td>
                                                        <img width="125px"
                                                            src="{{ url('admin') }}/images/{{ $value->admin_avt }}"
                                                            alt="{{ $value->admin_avt }}">
                                                    </td>
                                                @endif
                                                <td>{{ $value->title }}</td>
                                                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('d F Y');}}</td>
                                                @if ($value->admin_avt != '')
                                                    @if (Auth::user()->role == 'admin' || Auth::user()->role == 'manager')
                                                        @if (Auth::user()->role == 'admin')
                                                            <form action="{{ route('blog.destroy', $value->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <td>
                                                                    <a href="{{ route('blog.edit', $value->id) }}"
                                                                        class="btn btn-primary">Edit</a>
                                                                    <button class="btn btn-danger" type="submit"
                                                                        onclick="return confirm('Do you want to delete this')">Delete</button>
                                                                </td>
                                                            </form>
                                                        @endif
                                                        @if (Auth::user()->role == 'manager')
                                                            @if (Auth::user()->id == $value->admin_id)
                                                                <td>
                                                                    <a href="{{ route('blog.edit', $value->id) }}"
                                                                        class="btn btn-primary">Edit</a>
                                                                    <button class="btn btn-danger" type="submit"
                                                                        onclick="return confirm('Do you want to delete this')">Delete</button>
                                                                </td>
                                                            @else
                                                                <td>
                                                                    <a href="{{ route('blog.show', $value->id) }}"
                                                                        class="btn btn-primary">View</a>
                                                                </td>
                                                            @endif
                                                        @endif
                                                    @endif
                                                    @if (Auth::user()->role == 'staff')
                                                        @if (Auth::user()->id == $value->admin_id)
                                                            <td>
                                                                <a href="{{ route('blog.edit', $value->id) }}"
                                                                    class="btn btn-primary">Edit</a>
                                                                <button class="btn btn-danger" type="submit"
                                                                    onclick="return confirm('Do you want to delete this')">Delete</button>
                                                            </td>
                                                        @else
                                                            <td>
                                                                <a href="{{ route('blog.show', $value->id) }}"
                                                                    class="btn btn-primary">View</a>
                                                            </td>
                                                        @endif
                                                   @endif
                                                @elseif($value->customer_avt !='')
                                                    @if ($value->who_accept == null)
                                                        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'manager')
                                                            <form action="{{ route('blog.update', $value->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="who_accept_blog"
                                                                    value="{{ Auth::user()->id }}">
                                                                <td>
                                                                    <a href="{{ route('blog.show', $value->id) }}"
                                                                        class="btn btn-primary">View</a>
                                                                    <button title="Accept this blog"
                                                                        class="btn btn-primary" type="submit"><i
                                                                            class="las la-check"></i></button>
                                                                </td>
                                                            </form>
                                                        @endif
                                                        @if (Auth::user()->role == 'staff' || Auth::user()->role != 'staff')
                                                        @endif
                                                    @else
                                                    @endif
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
                        {{ $blog->appends($_GET) }}
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
            var current_url = "{{ route('blog.index') }}";
            window.location.href = "" + current_url + '/' + id;
        }
    </script>
@endsection
