<?php
/**
 * Created by PhpStorm.
 * User: lee
 * Date: 2021/12/29
 * Time: 10:37
 */
use think\Route;

Route::post('getUserInfo','index/Order/getUserInfo');
Route::post('editUserInfo','index/Order/editUserInfo');
Route::group('order',function(){
    Route::post('add','index/Order/postOrder');
    Route::post('receive','index/Order/postReceive');
    Route::post('addLog','index/Order/addOrderLog');
    Route::post('logList','index/Order/getOrderLogList');
    Route::post('info','index/Order/getOrderInfo');
    Route::post('list','index/Order/getOrderList');
    Route::post('total','index/Order/getOrderNum');
    Route::post('end','index/Order/postEnd');
    Route::post('auth','index/Order/getAuth');
    Route::post('look','index/Order/postLook');
    Route::post('grade','index/Order/postGrade');
    Route::post('glist','index/Order/getGradeList');
    Route::post('ginfo','index/Order/getGradeInfo');
});
Route::post('upload','index/Order/getToken');
Route::post('uploadPic','index/Order/getPicUrl');
Route::group('Login',function(){
    Route::post('index','index/Logins/Login');
    Route::get('send','index/Logins/postSend');
    Route::any('register','index/Logins/zdLogin');
    Route::post('addIdea','index/Logins/postIdea');
});