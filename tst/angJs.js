var myApp = angular.module('myApp', ['ngAnimate']);


myApp.controller("myFirstController", ['$scope', '$log', '$timeout', '$filter', '$location', function($scope, $log, $time, $filter, $location){

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


 
   $log.info($location.path());

 

  // $scope.$watch('handle', function(newval, oldval){
  //    console.log('new ' + newval);
  //    console.log('old ' + oldval);

  // });

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