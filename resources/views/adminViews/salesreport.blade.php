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
              <h3 class="box-title">Hover Data Table </h3>
            </div>
            <!-- /.box-header -->
            <div ng-app="MyApp">
            <div class="box-body" ng-controller="Mycntrl">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Customer Name</th>
                  <th>Pur.Date</th>
                  <th>Product Name</th>
                  <th>quantity</th>
                  <th>Amount</th>
                  <th>Total</th>
                </tr>
                </thead>
                <tbody>    
                <tr ng-repeat="cart in cartdetails">
                  <td><% cart.name %></td>
                  <td>NetFront 3.1</td>
                  <td><% cart.productName %></td>
                  <td><% cart.quantity %></td>
                  <td><% cart.productPrize | currency %></td>
                  <td><% cart.productPrize * cart.quantity | currency %></td>
                </tr>
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Total Amount</th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th><% total | currency %></th>
                </tr>
                </tfoot>
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
    <script>
      var app = angular.module('MyApp', [],function ($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
      });
      app.controller('Mycntrl', ['$scope','$http', function($scope,$http){

        $scope.cartdetails ="";
        $scope.total ="";

        $http({
          url : "/salesreport",
        }).then(function MySuccess(response) {
          // console.log(response.data);
          $scope.cartdetails = response.data;

         $scope.total = 0;
          for(var i = 0; i < $scope.cartdetails.length; i++){
              var product = $scope.cartdetails[i];
              // console.log(product);
              $scope.total += (product.productPrize * product.quantity);
          }
          return $scope.total;
          
        })
        
      }])
    </script>
    <!-- /.content -->
@endsection