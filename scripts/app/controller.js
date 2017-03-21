
app.controller('myController1', ['$scope', function($scope) {
    $scope.clocks = [
        { name: 'Fast Track', price: 1200, image: './images/fasttrack.jpg'},
        { name: 'Casio', price: 1400, image: './images/casio.jpg' },
        { name: 'Omax', price: 1300, image: './images/omax.jpg' },
        { name: 'Titan', price: 1800, image: './images/titan.jpg' },
        { name: 'Rado', price: 2500, image: './images/rado.jpg' },
        { name: 'Current', price: 3000, image: './images/titan.jpg' },
        { name: 'Tissot', price: 2500, image: './images/tissot.jpg' },
        { name: 'Rolex', price: 3000, image: './images/rolex.jpg' },
        { name: 'Roland', price: 1800, image: './images/roland.jpg' }
       
        
    ];

   

    $scope.list = [];

    $scope.ButtonName = "Add To Cart";

    $scope.addItem = function(product) {

       
        $scope.list.push(product);
        
    };


    $scope.getTotal = function() {
        var total = 0;
        for (var i = 0; i < $scope.list.length; i++) {
            var product = $scope.list[i];
            total += product.price;
        }
        return total;
    };

    $scope.delete = function(rv) {
        var index = $scope.list.indexOf(rv);
        $scope.list.splice(index, 1); 
    };
}]);

