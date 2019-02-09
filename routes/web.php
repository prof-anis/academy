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
//just testing

Route::get('/','Normal\DefaultController@index')->name('defaulthome');
Route::get('/about','Normal\DefaultController@about')->name('about');
Route::get('/staffs','Normal\DefaultController@staffs')->name('staffs');
Route::get('/profiles/{id}','Normal\DefaultController@profiles')->name('profiles');
Route::get('/blog','Normal\DefaultController@blog')->name('blog');
Route::get('/events','Normal\DefaultController@events')->name('events');
Route::get('/tour','Normal\DefaultController@tour')->name('tour');
Route::post('teacher/register','Normal\DefaultController@registerTeacher')->name('teacher.register');
Route::get('courses/{cat}','Normal\DefaultController@courses')->name('default.courses');
Route::any('ss',function(){
	
session(['anis_course'=>$_POST['course']]);
return $_POST['course'];
})->name('setCourseSession');

Auth::routes();

Route::group(['prefix'=>'payment'],function(){
	Route::post('pay',"Payment\PaymentController@redirectToGateway")->name('pay');
	Route::get('callback',"Payment\PaymentController@handleGatewayCallback")->name('paystack@responce');
});





Route::group(['prefix'=>'test'],function(){

Route::get('test-page/{test_id}','Assessment\TestController@testPage')->name('testpage');

Route::get('show-start-test/{test_id}','Assessment\TestController@showStartTest')->name('showstart@test');

Route::get('update','Assessment\ActivitiesController@checkUpdates')->name('checkupdates@test');
Route::post('mark/{test_id}','Assessment\TestController@markTest')->name('mark@test');
Route::get('past-test','Assessment\ActivitiesController@pastTest')->name('past@test');
Route::get('review-test/{test_id}','Assessment\ActivitiesController@reviewTest')->name('review@test');
Route::get('retake-test/{test_id}',"Assessment\TestController@retakeTest")->name('retake@test');
});

Route::get('/home', 'HomeController@index')->name('home');








Route::group(['prefix'=>'student'],function(){
	Route::get('course-setup','Student\Courses@courseSetup')->name('student@coursesetup');
	Route::any('register','Student\StudentController@registerUser')->name('registerstudent');
    Route::any('setup','Student\StudentController@showsetupForm')->name('studentsetup')->middleware('auth');
 	Route::any('code/{code}','Student\StudentController@CompareCode')->name('comparecode');
  Route::any('setup/process','Student\StudentController@process')->name('process');
 	Route::any('home','Student\Activities@home')->name('student@home');
 	Route::get('course-details/{course}','Student\Courses@details')->name('course@details');
 	Route::get('course-details/{type}/{course}/{specific?}','Student\Courses@viewMaterialDetails')->name('material@details');
 	Route::get('available-test','Assessment\TestController@availableTest')->name('available@test');
 	Route::get('my-course','Student\Courses@getCourse')->name('get@courses');
 	Route::get('/available-courses','Student\Courses@showAllCourses')->name('showall@courses');

});


Route::group(['prefix'=>'teacher'],function(){
	Route::get('home','Teacher\TeacherController@home')->name('teacher@home');
	Route::get('course/{id}','Teacher\TeacherController@courseDetails')->name('coursedetails@teacher');
	Route::get('student-course-details/{student_id}/{course}','Teacher\TeacherController@studentDetails')->name('studentdetails@teacher');
	Route::post('add-to-student-test','Teacher\TeacherController@addToStudentTest')->name('add@test_teacher');
		Route::post('add-to-student-material','Teacher\TeacherController@addToStudentMaterial')->name('add@material_teacher');
		Route::get('create-test/{subject}','Teacher\TeacherController@createTest')->name('teacher.createtest');

		Route::post('store-test','Teacher\TeacherController@storeTest')->name('storetest');

		Route::get('add-material/{course}','Teacher\TeacherController@addMaterial')->name('addmaterial');
		Route::post('add-materail/{course}','Teacher\TeacherController@fixAddMaterials')->name('fixaddmaterials');
		Route::get('all-materials/{course}','Teacher\TeacherController@viewAllMaterialForCourse')->name('allcoursematerials');
		Route::get('view-file/{material}','Teacher\TeacherController@viewFile')->name('viewfile');
		Route::post('save-test-name','Teacher\TeacherController@saveTestName')->name('savetestname');
		Route::get('remove-test/{testid}','Teacher\TeacherController@removeTestFromStudentList')->name('removetest@student');
		Route::get('view-all-test/{course}','Teacher\TeacherController@viewAllTest')->name('viewalltest');
		Route::get('preview-test/{test_id}','Assessment\TestPreview@preview')->name('previewtest');
		Route::get('code/{mycode}','SuperAdmin\AdminTeachersController@checkCode')->name('checkcode');

});





Route::any('back',function(){
	return back();
})->name('back');

Route::group(['prefix'=>'chat'],function(){
	Route::get('messanger','Chat\MessagesController@showMessanger')->name('show@messanger');
	Route::post('messanger/getchat','Chat\MessagesController@getMessages')->name('get@messanger');
	Route::post('messanger/sendchat','Chat\MessagesController@sendMessages')->name('send@chat');

});


Route::get('logout',function(){
	Auth::logout();
	return redirect()->route('login');
})->name('manual-logout');


Route::group(['prefix'=>'admin'],function(){
	Route::get('index','SuperAdmin\AdminController@index')->name('index.admin');

	Route::get('course-create','SuperAdmin\AdminCourseController@create')->name('course.admin.create');
	Route::post('course-add','SuperAdmin\AdminCourseController@store')->name('admin.addcourse');
	Route::get('all-course','SuperAdmin\AdminCourseController@index')->name('admin.allcourse');
	Route::get('delete-course/{course}','SuperAdmin\AdminCourseController@destroy')->name('admin.deletecourse');
	Route::get('show-edit-course/{course}','SuperAdmin\AdminCourseController@show')->name('admin.showedit');
	Route::post('do-edit-course/{subject}','SuperAdmin\AdminCourseController@update')->name('admin.courseupdate');

	Route::get('create-teacher/{id?}','SuperAdmin\AdminTeachersController@create')->name('admin.createteacher');
	Route::post('store-teacher/{id}','SuperAdmin\AdminTeachersController@store')->name('admin.storeteacher');
	Route::get('requests','SuperAdmin\AdminTeachersController@viewRequests')->name('admin.requests');
	Route::get('requests/delete/{id}','SuperAdmin\AdminTeachersController@deleteRequest')->name('admin.deleterequest');
	Route::get('/view-all-teachers','SuperAdmin\AdminTeachersController@viewAllTeachers')->name('admin.viewall');
	
});


Route::get('/teacher/code/{email}/{code}','SuperAdmin\AdminTeachersController@confirmCode')->name('teacher.confirmcode');

