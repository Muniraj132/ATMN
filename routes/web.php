<?php
// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\PageController;

use App\Http\Controllers\MainController;
// URL::forceScheme('https');

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

Route::get('/', [MainController::class, 'index']);
Auth::routes();

Route::get('change-password/{id}',[App\Http\Controllers\Admin\HomeController::class, 'changePassword'])->name('user.change-password');
Route::post('updatePassword',[App\Http\Controllers\Admin\HomeController::class, 'updatePassword'])->name('password.update');
// password.update
// Route::post('update-password', array('as' => 'user.update-password', 'uses' => 'App\Http\Controllers\HomeController@updatePassword'));

Route::middleware([app::class])->group(function () { 
    Route::resource('recruitment/dashboard', AppController::class);
    // Route::resource('recruitment/brief', AtmnBriefHistoryController::class);
});

Route::get('get-started', [MainController::class, 'getstarted'])->name('getstarted');
Route::get('privacy-policy', [MainController::class, 'privacypolicy'])->name('PrivacyPolicy');
Route::get('/explore-find-out', [MainController::class, 'explorefindout'])->name('explorefindout');
Route::get('sendmessage', [MainController::class,'sendmessage'])->name('sendmessage');


Route::group(['middleware' => 'auth'], function()
{
    Route::resource('recruitment/dashboard', AppController::class);
    Route::resource('recruitment/brief', AtmnBriefHistoryController::class);

    Route::get('/recruitment/users-list', [App\Http\Controllers\UsersController::class, 'userslist'])->name('userslist');
    Route::get('/recruitment/district-staff-list', [App\Http\Controllers\UsersController::class, 'districtstafflist'])->name('districtstafflist');
    Route::post('statusupdate', [App\Http\Controllers\UsersController::class, 'statusupdate'])->name('statusupdate');
    Route::get('getusertype', [App\Http\Controllers\UsersController::class, 'getusertype'])->name('getusertype');
    Route::get('getuserstatus', [App\Http\Controllers\UsersController::class, 'getuserstatus'])->name('getuserstatus');
    Route::get('currentdistrictpastor', [App\Http\Controllers\UsersController::class, 'currentdistrictpastor'])->name('currentdistrictpastor');
    Route::post('roleassign', [App\Http\Controllers\UsersController::class, 'roleassign'])->name('roleassign');
    Route::post('userstatusupdate', [App\Http\Controllers\UsersController::class, 'userstatusupdate'])->name('userstatusupdate');
    Route::get('getstatus', [App\Http\Controllers\UsersController::class, 'getstatus'])->name('getstatus');
    Route::get('getname', [App\Http\Controllers\UsersController::class, 'getname'])->name('getname');
    Route::get('deleteuser', [App\Http\Controllers\UsersController::class, 'deleteuser'])->name('deleteuser');
    Route::get('restoreuser', [App\Http\Controllers\UsersController::class, 'restoreuser'])->name('restoreuser');
    Route::get('/recruitment/contact-us-report', [App\Http\Controllers\UsersController::class, 'contactusreport'])->name('contactusreport');
    Route::get('deletereport', [App\Http\Controllers\UsersController::class, 'deletereport'])->name('deletereport');
    Route::get('getreportdata', [App\Http\Controllers\UsersController::class, 'getreportdata'])->name('getreportdata');
    Route::get('permanentdelete', [App\Http\Controllers\UsersController::class, 'permanentdelete'])->name('permanentdelete');
    Route::get('recruitment/restore-user', [App\Http\Controllers\UsersController::class, 'trashlist'])->name('trash');

    Route::get('/recruitment/brief/show/{id}', [App\Http\Controllers\AtmnBriefHistoryController::class, 'show']);
    Route::get('/recruitment/brief/edit/{id}', [App\Http\Controllers\AtmnBriefHistoryController::class, 'edit']);
    Route::get('/recruitment/brief/dsshow/{id}', [App\Http\Controllers\AtmnBriefHistoryController::class, 'dsshow']);
    Route::get('/recruitment/brief/adminshow/{id}', [App\Http\Controllers\AtmnBriefHistoryController::class, 'adminshow']);
    Route::get('/recruitment/brief/dsedit/{id}', [App\Http\Controllers\AtmnBriefHistoryController::class, 'dsedit']);
    Route::post('/recruitment/brief/dsupdate/{id}', [App\Http\Controllers\AtmnBriefHistoryController::class, 'dsupdate']);
    Route::post('/recruitment/brief/update/{id}', [App\Http\Controllers\AtmnBriefHistoryController::class, 'update']);
    Route::post('/recruitment/brief/destroy/{id}', [App\Http\Controllers\AtmnBriefHistoryController::class, 'destroy']);

    Route::get('recruitment/brief-dspending-list', [App\Http\Controllers\AtmnBriefHistoryController::class, 'briefpendinglist'])->name('briefdspendinglist');
    Route::get('recruitment/brief-dsapproved-list', [App\Http\Controllers\AtmnBriefHistoryController::class, 'briefapprovedlist'])->name('briefdsapprovedlist');
    Route::get('recruitment/brief-adminpending-list', [App\Http\Controllers\AtmnBriefHistoryController::class, 'briefpendinglistadmin'])->name('briefadminpendinglist');
    Route::get('recruitment/brief-adminapproved-list', [App\Http\Controllers\AtmnBriefHistoryController::class, 'briefapprovedlistadmin'])->name('briefadminapprovedlist');

     Route::get('recruitment/new', [App\Http\Controllers\AtmnBriefHistoryController::class, 'new'])->name('new');

    Route::get('recruitment/profile', [App\Http\Controllers\AppController::class, 'profile'])->name('app.profile');

    Route::get('recruitment/adminapplicationlist', [App\Http\Controllers\AppController::class, 'admindashboard'])->name('app.adminapplicationlist');
    Route::get('recruitment/availablity-list', [App\Http\Controllers\AppController::class, 'adminplaceddashboard'])->name('app.adminavailabilitylist');
    Route::get('recruitment/district-placed-list/{id}', [App\Http\Controllers\AppController::class, 'districtavailablitylist'])->name('app.districtplacedlist');
    Route::get('recruitment/district-available-list/{id}', [App\Http\Controllers\AppController::class, 'districtavailablitylist'])->name('app.districtavailablelist');

    Route::get('recruitment/ds-available-list', [App\Http\Controllers\AppController::class, 'dsavailablelist'])->name('app.dsavailablelist');
    Route::get('recruitment/ds-placed-list', [App\Http\Controllers\AppController::class, 'dsplacedlist'])->name('app.dsplacedlist');
    Route::get('recruitment/dspendinglist', [App\Http\Controllers\AppController::class, 'dsdashboard'])->name('app.dspendinglist');
    Route::get('recruitment/dsapprovedlist', [App\Http\Controllers\AppController::class, 'dsdashboard'])->name('app.dsapprovedlist');

    Route::get('recruitment/districtpendinglist/{id}', [App\Http\Controllers\AppController::class, 'admindistrictview'])->name('app.districtpendinglist');
    Route::get('recruitment/districtapprovedlist/{id}', [App\Http\Controllers\AppController::class, 'admindistrictview'])->name('app.districtapprovedlist');
    Route::get('recruitment/userslist', [App\Http\Controllers\AppController::class, 'userslist'])->name('app.userslist');




    Route::get('recruitment/admin/app/{id}/edit', [App\Http\Controllers\AppController::class, 'adminedit'])->name('admin.app.edit');
    Route::get('recruitment/admin/app/{id}/show', [App\Http\Controllers\AppController::class, 'adminshow'])->name('admin.app.show');
    Route::get('recruitment/admin/app/{id}/showuser', [App\Http\Controllers\AppController::class, 'adminshowuserlist'])->name('admin.app.user.show');
    Route::get('recruitment/admin/app/{id}/show-user-profile', [App\Http\Controllers\AppController::class, 'userprofileview'])->name('admin.user.profile.show');
    Route::put('recruitment/admin/app/{id}', [App\Http\Controllers\AppController::class, 'adminupdate'])->name('admin.app.update');

    Route::get('recruitment/ds/app/{id}/show', [App\Http\Controllers\AppController::class, 'dsshow'])->name('ds.app.show');
    // Route::get('ds/app/{id}/edit', [App\Http\Controllers\AppController::class, 'dsedit'])->name('ds.app.edit');
    // Route::put('ds/app/{id}', [App\Http\Controllers\AppController::class, 'dsupdate'])->name('ds.app.update');

    Route::get('recruitment/dashboard', [App\Http\Controllers\AppController::class,'index'])->name('app.index');

    Route::get('recruitment/app/create', [App\Http\Controllers\AppController::class,'StepOne'])->name('app.step.one');
    Route::post('recruitment/app/store', [App\Http\Controllers\AppController::class,'postStepOne'])->name('app.step.one.post');
    Route::post('recruitment/app/storestep2', [App\Http\Controllers\AppController::class,'postStepTwo'])->name('app.step.two.post'); 
    
    Route::post('recruitment/app/storestep3', [App\Http\Controllers\AppController::class,'postStepThree'])->name('app.step.three.post');
    // Route::post('app/storestep4', [App\Http\Controllers\AppController::class,'postStepFour'])->name('app.step.four.post');
    Route::post('/pageUploadFile/{id}', [App\Http\Controllers\AppController::class, 'pageUploadFile'])->name('pageUploadFile');

    Route::get('recruitment/status-history', [App\Http\Controllers\AppController::class,'pastorstatushistory'])->name('status_history');
    Route::get('statushistory/{id}', [App\Http\Controllers\AppController::class,'statushistory'])->name('statushistory');

    Route::get('recruitment/pastor-availability', [App\Http\Controllers\AppController::class,'Pastorviewavailability'])->name('Pastorviewavailability');
    Route::get('recruitment/app/{id}/viewAvailability', [App\Http\Controllers\AppController::class,'pastoravailablity'])->name('pastoravailablity');
    Route::get('recruitment/app/{id}/viewAvailability', [App\Http\Controllers\AppController::class,'viewAvailablity'])->name('app.pastor.availabe.index');
    Route::get('recruitment/app/viewDataAvaliability', [App\Http\Controllers\AppController::class,'viewDataAvaliability'])->name('app.pastor.availabe.data');
    Route::post('recruitment/app/storeAvailability', [App\Http\Controllers\AppController::class,'postAvaliability'])->name('app.pastor.availabe.post');
    Route::post('recruitment/app/updateAvailability', [App\Http\Controllers\AppController::class, 'updateAvailability'])->name('app.pastor.availabe.update');
    Route::post('recruitment/app/destroyAvaliability', [App\Http\Controllers\AppController::class,'destroyAvaliability'])->name('app.pastor.availabe.data.delete');


    Route::post('getgeocode', [App\Http\Controllers\AppController::class,'getgeocode'])->name('getgeocode');
    Route::post('getlocations', [App\Http\Controllers\AppController::class,'getlocations'])->name('getlocations');


    Route::get('recruitment/admin/resourceindex', [App\Http\Controllers\ResourceFileController::class,'resourceindex'])->name('resourceindex');
    Route::post('ResourceUploadFile', [App\Http\Controllers\ResourceFileController::class,'ResourceUploadFile'])->name('ResourceUploadFile');
    Route::get('resourcefilesget', [App\Http\Controllers\ResourceFileController::class,'resourcefilesget'])->name('resourcefilesget');
    Route::get('resourcefilesview', [App\Http\Controllers\ResourceFileController::class,'resourcefilesview'])->name('resourcefilesview');
    Route::post('resourcefilesupdate', [App\Http\Controllers\ResourceFileController::class,'resourcefilesupdate'])->name('resourcefilesupdate');
    Route::post('updateresourcefile', [App\Http\Controllers\ResourceFileController::class,'updateresourcefile'])->name('updateresourcefile');
    Route::get('destroyresourcefile', [App\Http\Controllers\ResourceFileController::class,'destroyresourcefile'])->name('destroyresourcefile');

    Route::get('recruitment/ds/opportunitiesindex', [App\Http\Controllers\OpportunitiesController::class,'opportunitiesindex'])->name('opportunitiesindex');
    Route::post('opportunitiesstore', [App\Http\Controllers\OpportunitiesController::class,'opportunitiesstore'])->name('opportunitiesstore');
    Route::get('opportunitiesget', [App\Http\Controllers\OpportunitiesController::class,'opportunitiesget'])->name('opportunitiesget');
    Route::get('opportunitiesview', [App\Http\Controllers\OpportunitiesController::class,'opportunitiesview'])->name('opportunitiesview');
    Route::post('opportunitiesupdate', [App\Http\Controllers\OpportunitiesController::class,'opportunitiesupdate'])->name('opportunitiesupdate');
    Route::post('updateopportunities', [App\Http\Controllers\OpportunitiesController::class,'updateopportunities'])->name('updateopportunities');
    Route::get('destroyopportunities', [App\Http\Controllers\OpportunitiesController::class,'destroyopportunities'])->name('destroyopportunities');

    Route::get('recruitment/candidate-search', [App\Http\Controllers\CandidateSearchController::class,'searchindex'])->name('searchindex');
    Route::get('assignedpastordata', [App\Http\Controllers\CandidateSearchController::class,'assignedpastordata'])->name('assignedpastordata');
    Route::get('dsviewofcandidate', [App\Http\Controllers\CandidateSearchController::class,'dsviewofcandidate'])->name('dsviewofcandidate');
    
    Route::get('getpasteraddress', [App\Http\Controllers\CandidateSearchController::class,'getpasteraddress'])->name('getpasteraddress');
    Route::get('findpastor', [App\Http\Controllers\CandidateSearchController::class,'findpastor'])->name('findpastor');
    Route::get('getdistrict', [App\Http\Controllers\CandidateSearchController::class,'getdistrict'])->name('getdistrict');

    Route::get('search', [App\Http\Controllers\CandidateSearchController::class,'search'])->name('search');
    Route::get('getAvailableDates', [App\Http\Controllers\CandidateSearchController::class,'getAvailableDates'])->name('getAvailableDates');

    Route::get('recruitment/pastor-search', [App\Http\Controllers\PastorSearchController::class,'pastorsearchindex'])->name('pastorsearch');

    Route::post('pastorassign', [App\Http\Controllers\AssignmentController::class,'pastorassign'])->name('pastorassign');
    Route::get('pastorgetedit', [App\Http\Controllers\AssignmentController::class,'pastorgetedit'])->name('pastorgetedit');
    
    Route::post('pastorcomment', [App\Http\Controllers\CommentsController::class,'pastorcomment'])->name('pastorcomment');
    Route::get('commentview', [App\Http\Controllers\CommentsController::class,'commentview'])->name('commentview');
    Route::get('commentedit', [App\Http\Controllers\CommentsController::class,'commentedit'])->name('commentedit');
    Route::post('commentupdate', [App\Http\Controllers\CommentsController::class,'commentupdate'])->name('commentupdate');
    Route::get('commentdelete', [App\Http\Controllers\CommentsController::class,'commentdelete'])->name('commentdelete');
    Route::get('exportXlxs', [App\Http\Controllers\ExportController::class,'exportXlxs'])->name('exportXlxs');
     

});
 
Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();

    return Redirect::to('/');
})->name('logout');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
