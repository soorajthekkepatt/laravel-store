@extends('userLayouts.userapp')

@section('content')
<style>
.table>tbody>tr>td, .table>tfoot>tr>td{
vertical-align: middle;
}
@media screen and (max-width: 600px) {
    table#cart tbody td .form-control{
		width:20%;
		display: inline !important;
	}
	.actions .btn{
		width:36%;
		margin:1.5em 0;
	}
	
	.actions .btn-info{
		float:left;
	}
	.actions .btn-danger{
		float:right;
	}
	
	table#cart thead { display: none; }
	table#cart tbody td { display: block; padding: .6rem; min-width:320px;}
	table#cart tbody tr td:first-child { background: #333; color: #fff; }

	table#cart tbody td:before {
		content: attr(data-th); font-weight: bold;
		display: inline-block; width: 8rem;
	}	
	
	table#cart tfoot td{display:block; }
	table#cart tfoot td .btn{display:block;}
	
}
</style>
<div class="container" ng-app="MyApp">
	<div ng-controller="Mycntrl">
		<input type="text" id="userid" name="userid" value="{{Auth::user()->id}}" hidden="true">
		<table id="cart" class="table table-hover table-condensed">
	    				<thead>
							<tr>
								<th style="width:50%">Product</th>
								<th style="width:10%">Price</th>
								<th style="width:8%">Quantity</th>
								<th style="width:22%" class="text-center">Subtotal</th>
								<th style="width:10%"></th>
							</tr>
						</thead>
						<tbody  ng-repeat=" product in products">

							<tr>
								<td data-th="Product">
									<div class="row">
										<div class="col-sm-2 hidden-xs"><img src="/images/<% product.image_name %>" alt="..." class="img-responsive"/></div>
										<div class="col-sm-10">
											<h4 class="nomargin"><% product.productName %></h4>
											<p><% product.prd_info  | limitTo: 100 %></p>
											<p><a href="#"><% product.prdmanu %></a></p>
										</div>
									</div>
								</td>
								<td data-th="Price"><label class="prdprize"><%product.productPrize | currency %></label></td>
								<td data-th="Quantity">
									<input type="number" class="form-control text-center prdqty" value="<% product.quantity %>">
								</td>
								<td data-th="Subtotal" class="text-center"><label id="total_label" class="labeltot"><% product.quantity * product.productPrize | currency %></label></td>
								<td class="actions" data-th="">
									<!-- <button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button> -->
									<!-- <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>								 -->
								</td>
							</tr>
						</tbody>
						<tfoot>
							<tr class="visible-xs">
								<td class="text-center"><strong>Total </strong></td>
							</tr>
							<tr>
								<td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
								<td colspan="2" class="hidden-xs"></td>
								<td class="hidden-xs text-center"><strong>Total <% getTotal() | currency %></strong></td>
								<td><a href="#" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
							</tr>
						</tfoot>
					</table>
	</div>

</div>
<script>
	var app = angular.module('MyApp', [],function ($interpolateProvider) {
		$interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
	});
	app.controller('Mycntrl', ['$scope','$http', function($scope,$http){
		$scope.qty ="";
		$scope.prize ="";
		$scope.total ="";
		angular.element(document).ready(function () {
		// console.log("hai");
		$scope.cartproducts();

		});

// ---------get cartproduct details of the user-------------

		$scope.cartproducts = function () {
			var userid = $('#userid').val();
			console.log(userid);
			$http({
				method: "get",
				url : "/getcartproducts/"+userid
			}).then(function mySuccess(response) {
				console.log(response.data);
				if(response.data.length == 0)
				{
					$('#userid').after('<div><h2 style="color:red">Your Cart Is Empty....</h2></div>')
				}
				else{
				$scope.products = response.data;
				}
				$scope.getTotal = function(){
				    var total = 0;
				    for(var i = 0; i < $scope.products.length; i++){
				        var product = $scope.products[i];
				        console.log(product);
				        total += (product.productPrize * product.quantity);
				    }
				    return total;
				}
			})
		}
	}])
</script>
@endsection