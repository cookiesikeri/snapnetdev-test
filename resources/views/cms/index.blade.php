@extends('layouts.app')
@section('title')
Dashboard
@endsection
@section('content')
<section class="content-header">
   <h1>
      Dashboard
      <small>Welcome Back! </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-xs-12">
         <!-- /.box -->
         <div class="box">
            <div class="box-header">
               <h3 class="box-title">10 Latest Citizens (10)</h3>
               <h6 class="box-subtitle">The table below shows 10 latest citizens currently in the system</h6>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              @if (Session::has('success'))
              <div class="alert alert-success" role="alert">{{Session::get('success')}}</div>
              @endif
              <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="example">
               <thead>
                   <tr>
                       <th>S/N</th>
                       <th>FullName</th>
                       <th>Action</th>
                   </tr>
               </thead>
               <tfoot>
                   <tr>
                    <th>S/N</th>
                    <th>FullName</th>
                    <th>Action</th>
                   </tr>
               </tfoot>
               <tbody>
                   @if($citizens->count() == 0)
                   <tr><td colspan="12">
                       <font color="red">No Order Record Found...</font></td>
                   </tr>
                   @else
                   @foreach($citizens as $key =>$order_detail)
                   <tr>
                     <td>{{++$key}}</td>
                     <td>
                         <font color="green">{{ucfirst($order_detail->fullname)}}</font></td>
                       <td>
                        <a href="{{route('user.details', ['id' => $order_detail->id])}}">
                            <button type="button" class="btn btn-primary">View Details <i class="fa fa-eye" aria-hidden="true"></i> </button>
                            </a>
                        <a href="{{route('user.delete', ['id' => $order_detail->id])}}">
                            <button type="button" class="btn btn-danger">Delete<i class="fa fa-trash" aria-hidden="true"></i> </button>
                          </a>
                       </td>


                   </tr>
                    @endforeach

                   @endif
                   </tbody>
           </table>
            </div>
            </div>
            <!-- /.box-body -->
         </div>
         <!-- /.box -->
      </div>
      <!-- /.col -->
   </div>


</section>


{{-- @include('layouts.user-details') --}}
<!-- /.content -->

@endsection
