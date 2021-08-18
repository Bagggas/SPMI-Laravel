<?php

use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLogin'])->name('login');

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'showLogout']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


Route::group(['middleware' => ['role:admin']], function () {

    //    tambahauditee
    Route::post('/tambahAuditee', [App\Http\Controllers\AdminController::class, 'tambahAuditee'])->name('tambahAuditee');
    Route::post('/userAuditee/edit', [App\Http\Controllers\AdminController::class, 'edit'])->name('userAuditee.edit');
    Route::get('/pageTambahAuditee', [App\Http\Controllers\AdminController::class, 'pageTambahAuditee'])->name('pageTambahAuditee');


    //    reset pw
    Route::post('/reset/{user}/user', [App\Http\Controllers\AdminController::class, 'update']);

    //    tambah auditor
    Route::post('/tambahAuditor', [App\Http\Controllers\AdminController::class, 'tambahAuditor'])->name('tambahAuditor');
    Route::get('/pageTambahAuditor', [App\Http\Controllers\AdminController::class, 'pageTambahAuditor'])->name('pageTambahAuditor');

    //    deleteUser
    Route::delete('/destroy/{id}', [App\Http\Controllers\AdminController::class, 'destroy'])->name('destroy');

    //    tambahstandart
    Route::post('/tambahStandart', [App\Http\Controllers\StandartController::class, 'create'])->name('tambahStandart');
    Route::get('/standarts/{standart}', [App\Http\Controllers\StandartController::class, 'show']);
    //    deletestandart
    Route::delete('/standarts/{standart}', [App\Http\Controllers\StandartController::class, 'destroy']);
    //    editstandart
    Route::get('/standarts/{standart}/edit', [App\Http\Controllers\StandartController::class, 'view']);
    Route::post('/standarts/{standart}/updates', [App\Http\Controllers\StandartController::class, 'update']);

    //    tambahQuestions
    Route::post('/standarts/{standart}/questions', [App\Http\Controllers\StandartController::class, 'store']);
    //    editQuestions
    Route::get('/questions/{question}/edit', [App\Http\Controllers\QuestionController::class, 'edit']);
    //    updateQuestions
    Route::post('/questions/{question}/update', [App\Http\Controllers\QuestionController::class, 'update']);
    //    deleteQuestions
    Route::delete('/questions/{standart}/delete', [App\Http\Controllers\QuestionController::class, 'destroy']);


    //    dashboard
    Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/dashboardAuditee', [App\Http\Controllers\AdminController::class, 'dashboardAuditee'])->name('admin.dashboardAuditee');
    Route::get('/admin/dashboardAuditor', [App\Http\Controllers\AdminController::class, 'dashboardAuditor'])->name('admin.dashboardAuditor');

});

Route::group(['middleware' => ['role:auditee']], function () {

    Route::get('/auditee/dashboard', [App\Http\Controllers\AuditeeController::class, 'index'])->name('auditee.dashboard');
    Route::get('/auditee/profile', [App\Http\Controllers\AuditeeController::class, 'profile'])->name('auditee.profile');
    Route::get('/auditee/grade', [App\Http\Controllers\AuditeeController::class, 'grade'])->name('auditee.grade');

    //grade auditee
    Route::get('/auditee/{standart}/{year}/grade', [App\Http\Controllers\AuditeeController::class, 'auditeeGrade'])->name('auditee.auditeeGrade');

    //update profile
    Route::post('/auditee/{user}/update/profile', [App\Http\Controllers\AuditeeController::class, 'update']);

    //data pendahuluan
    Route::post('/auditee/{user}/dataPendahuluan', [App\Http\Controllers\AuditeeController::class, 'insert_dataPendahuluan']);

    //change password
    Route::get('/auditee/{user}/change_password', [App\Http\Controllers\PasswordController::class, 'change_password'])->name('auditee.change.password');
    Route::post('/auditee/change_password', [App\Http\Controllers\PasswordController::class, 'store']);

    //postRespons
    Route::post('/standart/{question}/answer/post', [App\Http\Controllers\ResponsController::class, 'create']);

    // filter
    Route::post('/auditee/filter', [App\Http\Controllers\AuditeeController::class, 'filter']);
    Route::post('/auditee/filter/grade', [App\Http\Controllers\AuditeeController::class, 'filterGrade']);

    //download pdf
    Route::get('/auditee/{userId}/{year}/downloadPdf', [App\Http\Controllers\AuditorController::class, 'uploadPdf'])->name('auditee.downloadPdf');

    // respon
    Route::get('/auditee/{standart}/respons/', [App\Http\Controllers\ResponsController::class, 'index']);
});

Route::group(['middleware' => ['role:auditor']], function () {

    //change password
    Route::get('/auditor/{user}/change_password', [App\Http\Controllers\PasswordController::class, 'change_passwordAuditor'])->name('auditor.change.password');
    Route::post('/auditor/change_password', [App\Http\Controllers\PasswordController::class, 'store']);


    Route::get('/auditor/dashboard', [App\Http\Controllers\AuditorController::class, 'index'])->name('auditor.dashboard');

    //response
    Route::get('/auditor/{user}/{year}/respons/', [App\Http\Controllers\AuditorController::class, 'auditorResponse'])->name('auditor.response');
    //view
    Route::get('/auditor/{standart}/{userId}/{year}/view', [App\Http\Controllers\AuditorController::class, 'viewData'])->name('auditor.viewData');

    //auditing
    Route::get('/auditor/{standart}/{userId}/{year}/auditing', [App\Http\Controllers\AuditorController::class, 'auditing'])->name('auditor.auditing');
    Route::post('/standart/{standartId}/{userId}/auditor/grade/post', [App\Http\Controllers\AuditorController::class, 'create']);

    //download pdf
    Route::get('/auditor/{userId}/{year}/downloadPdf', [App\Http\Controllers\AuditorController::class, 'uploadPdf'])->name('auditor.uploadPdf');

    //profile
    Route::get('/auditor/profile', [App\Http\Controllers\AuditorController::class, 'profile'])->name('auditor.profile');

    //updateprofile
    Route::post('/auditor/{user}/update/profile', [App\Http\Controllers\AuditorController::class, 'update']);

});

Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return 'Routes cache cleared';
});

Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return 'Config cache cleared';
});


Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return 'Application cache cleared';
});


Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return 'View cache cleared';
});

Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return 'View cache cleared';
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
