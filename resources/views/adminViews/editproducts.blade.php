@extends('adminLayouts.adminapp')

@section('content')
  <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Product Management
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Product Management</a></li>
        <li class="active">Add Product</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Product</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            @foreach($data as $product)
          <form action="/admin/edit/{{$product -> id}}/updateproduct" method="POST" enctype="multipart/form-data">
            @csrf
          <label>Product Name</label>
          <input type="text" name="productName" id="productName" class="form-control" value="{{$product -> productName}}">
          <label>Product Prize</label>
          <input type="text" name="productPrize" id="productPrize" class="form-control" value="{{$product -> productPrize}}">
          <label>Stock</label>
          <input type="text" name="stock" id="stock" class="form-control" value="{{$product -> stock}}">
          <br>
          <label>product Image</label><br>
           <img src="/images/{{$product -> image_name}}" width="100px">
           <a href="" class="btn btn-primary">Change image <i class="fa fa-edit"></i></a>
            <label>Product Discription</label>
           <textarea rows="5" cols="50" class="form-control" name="prod_info" id="prod_info">
            {{$product -> prd_info}}
            </textarea><br>
            <label>Manufactured By</label>
            <input type="text" name="prd_man" id="prd_man" class="form-control" value="{{$product -> prdmanu}}"> <br>
          <input type="submit" name="add_btn" id="add_btn" class="btn btn-success btn-block">

        @endforeach
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        </div>
          </form>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>


  @endsection