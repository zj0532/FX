<?php
use think\Route;
Route::get('/','www/index/index');//FX主页

Route::get('/application','www/application/application');//应用

Route::get('/news','www/news/news');//新闻
Route::get('/newsInfo/:page','www/news/newsInfo');//新闻内容

Route::get('/about','www/about/about');//关于


?>
