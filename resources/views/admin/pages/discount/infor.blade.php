@extends('admin.master.master')
@section('main')
@section('discount','active')
@section('manage_discount','active')
@section('title','Discount Information')
<div class="dashboard-bread dashboard--bread dashboard-bread-2 ">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="breadcrumb-content">
                    <div class="section-heading">
                        <h2 class="sec__title font-size-30 text-white">Discount</h2>
                    </div>
                </div><!-- end breadcrumb-content -->
            </div><!-- end col-lg-6 -->
            <div class="col-lg-6">
                <div class="breadcrumb-list text-right">
                    <ul class="list-items">
                        <li><a href="{{route('admin.home')}}" class="text-white">Home</a></li>
                        <li>Discount</li>
                        <li><a href="{{route('discount.index')}}" class="text-white">Manage Discount</a></li>
                        <li>Discount Information</li>
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
                                <h3 class="title">Discount Information</h3>
                            </div>
                        </div>
                    </div>
                   <div class="form-content">
                       <div class="table-form table-responsive">
                           <table class="table">
                               <thead>
                               <tr>
                                   <th scope="col">Name</th>
                                   <th scope="col">Percent Reduce</th>
                                   <th scope="col">Limit</th>
                                   <th scope="col">Times</th>
                                   <th scope="col">Tour</th>
                                   <th scope="col">Action</th>
                                   <th scope="col">Apply for</th>
                               </tr>
                               </thead>
                               <tbody>
                                    <tr>
                                        <td>{{$discount_found->name}}</td>
                                        <td>{{$discount_found->percent_reduce}}%</td>
                                        <td>{{$discount_found->limit}}</td>
                                        <td>{{$discount_found->time}} hours</td>
                                        <td>{{$discount_found->tour_name}}</td>
                                        <form action="{{route('discount.destroy',$discount_found->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <td>
                                                <a href="{{route('discount.edit',$discount_found->id)}}" class="btn btn-primary">Edit</a>
                                                <button class="btn btn-danger" type="submit" onclick="return confirm('Do you want to delete this')">Delete</button>
                                            </td>
                                        </form>
                                        <td><a data-toggle="modal"
                                                data-target="#send_discount"  href="{{route('discount.show',$discount_found->id)}}" style="color: #fff" class="btn btn-primary">Send to...</a></td>
                                    </tr>
                               </tbody>
                           </table>
                       </div>
                   </div>
                </div><!-- end form-box -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container-fluid -->
</div><!-- end dashboard-main-content -->
@stop
@section('send_feedback')
<div class="modal-popup">
    <form action="{{route('discount.update',$discount_found->id)}}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="type" value="send_discount">
        <div class="modal fade" id="send_discount" tabindex="-1" role="dialog"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title title" id="exampleModalLongTitle3">Answer the feedback</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="la la-close"></span>
                        </button>
                    </div>
                    <div class="modal-body abc">
                        <input type="hidden" name="id" value="{{$discount_found->id}}">
                        
                        @foreach ($who_will_receive as $who)
                            @if ($old_customer != false)
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label" for="check_input_who{{$who->id}}">
                                        <input class="form-check-input" {{ in_array($who->id,json_decode($discount_found->who,true)) ? 'checked':''}} name="who[]" onclick="check_input_checked({{$who->id}})" id="check_input_who{{$who->id}}" type="checkbox" value="{{$who->id}}">{{$who->name}}
                                    </label>
                                </div>
                            @else
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label" for="check_input_who{{$who->id}}">
                                        <input class="form-check-input" name="who[]" id="check_input_who{{$who->id}}" type="checkbox" value="{{$who->id}}">{{$who->name}}
                                    </label>
                                </div>
                                @endif
                            @endforeach
                        </div>
                        <small class="ml-4" id="mess" style="color: red;">If you don't choose any one here <br> We will not send your discount to your customer</small>
                    <div class="modal-footer border-top-0 pt-0">
                        <button type="reset" class="btn font-weight-bold font-size-15 color-text-2 mr-2"
                            data-dismiss="modal">Cancel</button>
                        <button type="submit" class="theme-btn theme-btn-small send"
                            id="answer{{ $discount_found->id }}">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@section('js')
<script>
    $('#mess').hide();
    function check_input_checked(id_customer){
        var isCheckedInput = $('#check_input_who'+id_customer).is(':checked');
        if (isCheckedInput) {
            $('#mess').hide(200);
        }else{
            $('#mess').show(200);
        }
    }
</script>
@endsection