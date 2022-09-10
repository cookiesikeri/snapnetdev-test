@extends('layouts.app')
@section('title')
{{-- {{$order->order_id}} --}}
User Details
@endsection
@section('content')
<section class="content">
    <!-- Input -->
    <div class="row">
        <div class="col-md-12">

           <div class="box box-warning">
              <!-- /.box-header -->
              <div class="box-body">
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
                    <div class="header">
                        <h2> User Details for {{ucfirst($citizens->fullname)}}</h2>

                        <a href="{{url('/')}}">
                            <button type="button" class="btn btn-primary">Go Back <i class="fa fa-arrow-left" aria-hidden="true"></i> </button>
                          </a>

                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="example">
                                <thead>
                                    <tr>

                                        <th>FullName</th>
                                        <th>Gender</th>
                                        <th>Address</th>
                                        <th>Phone </th>
                                        <th>Ward </th>
                                        <th>Date Created</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>

                                     <th>FullName</th>
                                     <th>Gender</th>
                                     <th>Address</th>
                                     <th>Phone </th>
                                     <th>Ward </th>
                                     <th>Date Created</th>
                                     <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                      <td>
                                          <font color="green">{{ucfirst($citizens->fullname)}}</font></td>
                                      <td>{{ucfirst($citizens->gender)}}</td>
                                      <td>{!! $citizens->address !!}</td>
                                      <td>{{ucfirst($citizens->phone)}}</td>
                                      <td>
                                         {{ucWords(App\Models\Ward::find($citizens->ward_id)->name)}}
                                      </td>
                                        <td>{{$citizens->created_at->toDayDateTimeString()}}</td>
                                        <td>
                                         <a href="{{route('user.details', ['id' => $citizens->id])}}">
                                             <button type="button" class="btn btn-primary">View Details <i class="fa fa-eye" aria-hidden="true"></i> </button>
                                             </a>
                                         <a href="{{route('user.delete', ['id' => $citizens->id])}}">
                                             <button type="button" class="btn btn-danger">Delete<i class="fa fa-trash" aria-hidden="true"></i> </button>
                                           </a>
                                        </td>


                                    </tr>

                                    </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>



@endsection
