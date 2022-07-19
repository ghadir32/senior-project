var myApp = angular.module('myApp', ['ngAnimate']);



myApp.controller("myFirstController", ['$scope', '$timeout', '$filter','$http', function($scope, $time, $filter, $http){

  $scope.fname ="ghadir";
  $scope.lname = "fawaz";
  $scope.handle= '';
  $scope.jobtitle = "";
  $scope.job = $scope.jobtitle;
  $scope.charnb = 5;
  $scope.practicefill="";
  $scope.practice = function(){
    return $scope.practicefill;
  }

  $scope.newh = function(){
     return $filter('uppercase')($scope.handle);
  };

  $scope.job = function(){
    return $scope.jobtitle;
 };

  // $scope.$watch('handle', function(newval, oldval){
  //    console.log('new ' + newval);
  //    console.log('old ' + oldval);

  // });


//old get version not working
  // $http.get('http://localhost/AngularEx1/admin/ws/ws_Customers.php?op=5')
  // .success(function(result){
  //   $scope.rules = result;
  // })
  // .error(function(data, status){
  //   console.log(data);
  // });


  //working get version///////
  $http({
    method: 'get', 
    url: 'http://localhost/AngularEx1/admin/ws/ws_Customers.php?op=5'
  }).then(function (response) {
    console.log(response, 'res');
    data = response.data;
    $scope.rules = response.data;
},function (error){
    console.log(error, 'can not get data.');
});
//////////////////

  $scope.newEmail="";
  $scope.newemail = function(){

    $http.post('http://localhost/AngularEx1/admin/ws/ws_Customers.php?op=1', { username:"ghadir", email: $scope.newEmail, password:"aas", address:"mdree", status:1}).then(function(response){
      $scope.rules = response.data;
      $scope.newEmail="";
    },function(error){
      console.log(error.data);
    })
  }


  
  $scope.arr = [
    {arrname: "what the hell"},
    {arrname: "is thi"},
    {arrname: "heeree broww"}

  ];

  console.log($scope.arr);

  setTimeout(function(){
    $scope.handle = 'hey new scope';
    console.log("t8ayyar");
  }, 2000);
  // console.log($scope.newh);
  $time(function(){
    $scope.fname = "new name";
    $scope.jobvalue ="new job";
  }, 3000);

}] );

// var testt = document.getElementById('test');
 
//  testt.addEventListener("keyup", function(){
//   // alert("pressed");
//  });


myApp.animation('.fold-animation', ['$animateCss', function($animateCss) {
  return {
    enter: function(element, doneFn) {
      var height = element[0].offsetHeight;
      return $animateCss(element, {
        from: { height:'0px' },
        to: { height:height + 'px' },
        duration: 3 // one second
      });
    }
  }
}]);