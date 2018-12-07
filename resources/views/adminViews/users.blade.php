@extends('adminLayouts.adminapp')

@section('content')
@csrf
 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            	<!-- <?php print_r($data); ?> -->
              <h3 class="box-title">Hover Data Table </h3>
            </div>
            <!-- /.box-header -->
            <div>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Created AT</th>
                  <th>Action</th>
                  <!-- <th>Total</th> -->
                </tr>
                </thead>

                <tbody> 
                @foreach($data as $details)   
                <tr >
                  <td>{{$details -> name}}</td>
                  <td>{{$details -> email}}</td>
                  <td>{{$details -> password}}</td>
                  <td>{{$details -> created_at}}</td>
                  <td><a href="/admin/deleteuser/{{$details -> id}}" class="btn btn-danger deleteuser"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
  <!--                 <td><% cart.productPrize | currency %></td>
                  <td><% cart.productPrize * cart.quantity | currency %></td> -->
                </tr>
                
                </tbody>
                <tfoot>
                <tr>
                  <!-- <th>Total Amount</th> -->
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>

                </tr>
                </tfoot>
                @endforeach
              </table>
            </div>
          </div>

            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
@endsection