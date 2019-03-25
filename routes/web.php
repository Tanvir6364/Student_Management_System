<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('login');
});*/

/*Route::get('/dashboard',function (){
   return view('dashboard.master');
});*/

Route::get('/','HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'AutthenticateMiddleware'], function (){

    //===========================Course Register=================================
    Route::get('/manage/course/create','CourseController@getManageCourse');
    Route::post('/manage/course/insertAcademic','CourseController@postInsertAcademic');
    Route::post('/manage/course/insertProgram','CourseController@postInsertProgram');
    Route::post('/manage/course/insertLevel','CourseController@postInsertLevel');
    Route::get('/manage/course/showLevel','CourseController@showLevel');
    Route::post('/manage/course/insertShift','CourseController@postInsertshift');
    Route::post('/manage/course/insertTime','CourseController@postInserttime');
    Route::post('/manage/course/insertBatch','CourseController@postInsertbatch');
    Route::post('/manage/course/insertGroup','CourseController@postInsertgroup');
    Route::post('/manage/course/createClass','CourseController@createClass');
    Route::get('/manage/course/classInfo','CourseController@showClassInformation');
    Route::post('/manage/course/deleteClass','CourseController@deleteClass');
    Route::get('/manage/course/editClass','CourseController@editClass');
    Route::post('/manage/course/updateClass','CourseController@updateClass');
            //================Course Edit======================
    Route::get('/manage/course/edit','CourseController@editCourse');
    Route::get('/manage/course/delAcademic/{academic_id}/','CourseController@delAcademic');


    //==============================Student Register==================
    Route::get('/student/studentRegister','StudentController@getStudentRegister');
    Route::post('/student/postStudentRegister','StudentController@postStudentRegister');
    Route::get('/student/studentInfo','StudentController@studentInfo');
    Route::post('/student/delStudentInfo','StudentController@delStudentInfo');
    Route::get('/student/editStudentInfo','StudentController@editStudentInfo');


    //==============================Student Fee=======================
    Route::get('/student/payment','FeeController@getPayment');
    Route::get('/student/showPayment','FeeController@showStudentPayment');
    Route::get('/student/goPayment/{student_id}/','FeeController@goPayment');
    Route::post('/student/savePayment','FeeController@savePayment');
    Route::post('/student/createFee','FeeController@createFee');
    Route::get('/student/pay','FeeController@pay');
    Route::post('/student/extraPay','FeeController@extraPay');
    Route::get('/student/printInvoice/{receiptId}/','FeeController@printInvoice');
    Route::get('/student/invoice/studentLevel','FeeController@showLevelStudent');
    Route::get('/student/deleteTransaction/{transactId}/','FeeController@deleteTransaction');
                //===========================Fee Report====================================
    Route::get('/fee/report/getFeeReport','FeeController@getFeeReport');
    //Route::get('/fee/report/showFeeReport','FeeController@showFeeReport');
    Route::post('/fee/report/showFeeReport','FeeController@showFeeReport');


    //==============================Student Report================================
    Route::get('/report/student/studentList','ReportController@getStudentList');
    Route::get('/report/student/studentInfo','ReportController@getStudentInfo');
    Route::get('/report/student/studentMultiClassList','ReportController@getStudentMultiClassList');
    Route::get('/report/student/studentMultiClass','ReportController@showStudentMultiClass');
    Route::get('/report/student/newStudentRegChart','ReportController@newStudentRegChart');
    //Route::get('/report/student/newStudentRegChart','ReportController@pieChart');

    //============================= User ===================================================
    Route::get('/user/getUser','UserController@getUser');
    Route::post('/user/addUser','UserController@addUser');
    Route::get('/user/manageUser','UserController@manageUser');
    Route::get('/user/delUser/{id}/','UserController@delUser');

});