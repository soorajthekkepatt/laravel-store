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
              <h3 class="box-title">Products Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Product Name</th>
                  <th>product Prize</th>
                  <th>Stock</th>
                  <th>Action</th>
                 <!--  <th>CSS grade</th> -->
                </tr>
                </thead>
                <tbody>
                  @foreach($data as $tabledata)
                <tr>
                  <td>{{$tabledata -> productName}}</td>
                  <td>{{$tabledata -> productPrize}}
                  </td>
                  <td>{{$tabledata -> stock}}</td>
                  <td><a href="/admin/edit/{{$tabledata -> id}}"><i class="fa fa-edit"></i></a>
                    <a href="/admin/delete/{{$tabledata -> id}}" ><i class="fa fa-trash" ></i></a></td>
                
                </tr>
                @endforeach
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Total</th>
                  <th>{{$data[0]->prizetotal}}</th>
                  <th>{{$data[0]->stkqty}}</th>
                  <th></th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

  @endsection