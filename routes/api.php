<?php


$router->GROUP(['prefix'=>'v1','namespace'=>'v1'],function($router){
  
  $router->GET('courses','CourseController@index');
  $router->GET('courses/{course_id}','CourseController@single');
  $router->POST('login','UserController@login');
  $router->POST('register','UserController@register');
  	
  $router->GROUP(['middleware'=>'auth:api'],function($router){
  $router->GET('user','UserController@user');
  $router->GET('my','UserController@my');

});
});