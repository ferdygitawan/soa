var id = 1;
angular.module('saleApp', ['ngRoute'])

.controller('ProductListCtrl', ['$scope', '$compile', '$http', '$rootScope', function ($scope, $compile, $http, $rootScope){
	$rootScope.counter = 1;
	$rootScope.totalAmount = 0;
	$http.get(baseUrl +'api/product/get-all-json')
		.success(function(data) {
			$scope.products = data;
		});

  // sale = 1, purchase = 2
	$scope.addProduct = function() {
    var filter = '';
    if ($scope.purchaseOrSale == 2) {
      filter = ' | filter: { supplier_id: supplierId}';
    } else if ($scope.purchaseOrSale == 1) {
      filter = ' | filter: { active: 1 }'
    }
		var el =  '<tr ng-controller="ProductSingleCtrl" id="row{{ counter }}">' +
                '<td>' +
                  '<select name="product_id{{ counter }}" id="product_id{{ counter }}" ng-model="selectedProduct" ng-change="changeProduct(' + $scope.purchaseOrSale + ')" ng-options="product as product.name for product in products' + filter + ' track by product.id" class="form-control" required="required"></select>' +
                '</td>' +
                '<td>' +
                  '<input type="number" name="product_qty{{ counter }}" id="product_qty{{ counter }}" class="form-control" ng-model="productQty" ng-change="changeAmount()">' +
                '</td>' +
				'<td>' +
				'<input type="text" class="form-control" name="diskon_price{{ counter }}" id="diskon_price{{ counter }}" ng-model="diskonPrice" ng-change="changeAmount()">' +
				'</td>' +
                '<td>' +
                  '<input type="text" class="form-control" name="product_price{{ counter }}" id="product_price{{ counter }}" ng-model="productPrice" ng-change="changeAmount()">' +
                '</td>' +
                '<td>' +
                  '<input type="text" class="form-control" name="product_amount{{ counter }}" ng-model="productAmount" id="productAmount{{ counter }}" disabled>' +
                '</td>' +
                '<td>' +
                  '<a ng-click="removeProduct(counter)"><i class="fa fa-times"></i></a>' +
                '</td>' +
              '</tr>';

    var $el = $(el).appendTo("#productList");
    $compile($el)($scope);
    $rootScope.counter += 1;
	}

	$scope.removeProduct = function(id) {
		$("#row" + id).attr("id", "removed");
		$("#product_id" + id).attr("name", "removed");
		$("#product_qty" + id).attr("name", "removed");
		$("#product_price" + id).attr("name", "removed");
		$("#diskon_price" + id).attr("name", "removed");
		$("#removed" ).remove();
	}

	$scope.calculateTotalAmount = function() {
		var length = $rootScope.counter;
		var total = 0;

		for (var i = 1; i < length; i++) {
			if ($('#productAmount' + i).val()) {
				total += parseInt($('#productAmount' + i).val());
			}
		}
		$rootScope.totalAmount = total;
	}
}])

.controller('ProductSingleCtrl', ['$scope', '$compile', '$http', '$rootScope', function ($scope, $compile, $http, $rootScope) {
	var c = $rootScope.counter;
	$scope.counter = c;
	$scope.productQty = 1;

	// $scope.productStock =  $scope.selectedProduct.stock;

  // sale = 1, purchase = 2
	$scope.changeProduct = function(purchase_or_sale) {
    if (purchase_or_sale == 1) {
      $scope.productPrice = $scope.selectedProduct.retail_price;
    } else if(purchase_or_sale == 2) {
      $scope.productPrice = $scope.selectedProduct.buy_price;
    }
		
		$scope.productAmount = ($scope.productQty * $scope.productPrice)-(($scope.productQty * $scope.productPrice)*(($scope.diskonPrice)/100));
		$rootScope.totalAmount = 0
	}

	$scope.changeAmount = function() {
		$scope.productAmount = ($scope.productQty * $scope.productPrice)-(($scope.productQty * $scope.productPrice)*(($scope.diskonPrice)/100));
		$rootScope.totalAmount = 0;
	}
}]);


$(document).ready(function() {
    $('#dataTable').DataTable();
} )