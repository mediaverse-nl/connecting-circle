<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

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

Route::get('/symlink', function (){
    $baseTarget = '/home/mediaver/domains/web-assembled.nl/laravel-connecting-circle/storage/app';
    $baseLink = '/home/mediaver/domains/web-assembled.nl/public_html/connecting-circle';

    symlink(
        $baseTarget.'/image',
        $baseLink.'/image'
    );
    symlink(
        $baseTarget.'/file',
        $baseLink.'/file'
    );
    symlink(
        $baseTarget.'/storage',
        $baseLink.'/storage'
    );

    return 'symlink';
});

Auth::routes(['register' => true]);

Route::get('/test-storage-link', function () {
//    phpinfo();
    Artisan::call('storage:link');
});

Route::get('/clear-test', function () {
//    phpinfo();
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    return 'fin...';
});

Route::namespace('Site')->name('site.')->group(function () {
    Route::get('/site-map', 'SiteMapController');

    Route::get('/', 'HomeController')->name('home');
    Route::get('/home', 'HomeController');
    Route::get('/contact', 'ContactController@index')->name('contact.index');
    Route::post('/contact', 'ContactController@store')->name('contact.store');
    Route::get('/vacatures', 'JobsController@index')->name('jobs.index');
    Route::get('/vacature/{title}/{id}', 'JobsController@index')->name('jobs.show');
    Route::get('/cv-uploaden', 'CandidatesController@index')->name('candidates.index');
    Route::post('/cv-versturen', 'CandidatesController@store')->name('candidates.store');
    Route::get('/werkgevers', 'EmployersController@index')->name('employers.index');
    Route::post('/werkgevers', 'EmployersController@store')->name('employers.store');
    Route::get('/over-ons', 'AboutController@index')->name('about.index');
    Route::get('/{page}', 'PageController@show');
});

Route::namespace('Admin')->prefix('admin/')->middleware(['web', 'auth'])->name('admin.')->group(function () {
    Route::get('/candidate-cv-pdf-{id}', function ($id){
        $data = \App\Candidate::find($id);
        $pdf = PDF::loadView('admin.pdf.cv', compact('data'));
        return $pdf->stream('admin.pdf.cv');
    })->name('candidate.cv') ;
    Route::get('/dashboard', 'DashboardController')->name('dashboard');
    Route::get('file-manager', 'FileManagerController@index')->name('file-manager.index');

    Route::get('/calendar', 'CalendarController@index')->name('calendar.index');

    Route::get('/vakgebieden', 'SpecialtyController@index')->name('specialty.index');
    Route::post('/vakgebieden-opslaan', 'SpecialtyController@store')->name('specialty.store');
    Route::patch('/vakgebieden-wijzigen-{id}', 'SpecialtyController@update')->name('specialty.update');
    Route::patch('/vakgebieden-aanmaken', 'SpecialtyController@create')->name('specialty.create');
    Route::get('/vakgebieden-bekijken-{id}', 'SpecialtyController@edit')->name('specialty.edit');
    Route::delete('/vakgebieden-delete/{id}', 'SpecialtyController@destroy')->name('specialty.destroy');

    Route::get('/kandidaten', 'CandidateController@index')->name('candidate.index');
    Route::patch('/kandidaat-wijzigen-{id}', 'CandidateController@update')->name('candidate.update');
    Route::get('/kandidaat-bekijken-{id}', 'CandidateController@edit')->name('candidate.edit');
    Route::delete('/kandidaat-delete-{id}', 'CandidateController@destroy')->name('candidate.destroy');

    Route::get('/vacatures', 'JobsController@index')->name('jobs.index');
    Route::get('/vacature-aanmaken', 'JobsController@create')->name('jobs.create');
    Route::post('/vacature-opslaan', 'JobsController@store')->name('jobs.store');
    Route::patch('/vacatures-wijzigen-{id}', 'JobsController@update')->name('jobs.update');
    Route::get('/vacatures-bekijken-{id}', 'JobsController@edit')->name('jobs.edit');
    Route::delete('/vacatures-delete/{id}', 'JobsController@destroy')->name('jobs.destroy');

    Route::get('/werkgevers', 'EmployerController@index')->name('employer.index');
    Route::post('/werkgevers-wijzigen-{id}', 'EmployerController@update')->name('employer.update');
    Route::get('/werkgevers-bekijken-{id}', 'EmployerController@edit')->name('employer.edit');
    Route::patch('/werkgevers-wijzigen-{id}', 'EmployerController@update')->name('employer.update');
    Route::delete('/werkgevers-delete/{id}', 'EmployerController@destroy')->name('employer.destroy');

    //page controllers
    Route::get('/paginas', 'PageController@index')->name('page.index');
    Route::get('/pagina/{id}', 'PageController@edit')->name('page.edit');
    Route::get('/pagina-aanmaken', 'PageController@create')->name('page.create');
    Route::patch('/paginaaaa-wijzigen/{id}', 'PageController@update')->name('page.update');
    Route::post('/pagina-opslaan', 'PageController@store')->name('page.store');
    Route::delete('/pagina-delete/{id}', 'PageController@destroy')->name('page.destroy');
});

Route::prefix('admin/')->name('unisharp.lfm.')->middleware(['web', 'auth'])->group(function () {
    Route::get('/file_manager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show')->name('show');
    Route::any('/file_manager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload')->name('upload');
    Route::get('/file_manager/errors', '\UniSharp\LaravelFilemanager\Controllers\LfmController@getErrors')->name('getErrors');
    Route::get('/file_manager/jsonitems', '\UniSharp\LaravelFilemanager\Controllers\ItemsController@getItems')->name('getItems');
    Route::get('/file_manager/move', '\UniSharp\LaravelFilemanager\Controllers\ItemsController@move')->name('move');
    Route::get('/file_manager/domove', '\UniSharp\LaravelFilemanager\Controllers\ItemsController@move')->name('domove');
    Route::get('/file_manager/newfolder', '\UniSharp\LaravelFilemanager\Controllers\FolderController@getAddfolder')->name('getAddfolder');
    Route::get('/file_manager/folders', '\UniSharp\LaravelFilemanager\Controllers\FolderController@getFolders')->name('getFolders');
    Route::get('/file_manager/crop', '\UniSharp\LaravelFilemanager\Controllers\CropController@getCrop')->name('getCrop');
    Route::get('/file_manager/cropimage', '\UniSharp\LaravelFilemanager\Controllers\CropController@getCropimage')->name('getCropimage');
    Route::get('/file_manager/cropnewimage', '\UniSharp\LaravelFilemanager\Controllers\CropController@getNewCropimage')->name('getCropimage');
    Route::get('/file_manager/rename', '\UniSharp\LaravelFilemanager\Controllers\RenameController@getRename')->name('getRename');
    Route::get('/file_manager/resize', '\UniSharp\LaravelFilemanager\Controllers\ResizeController@getResize')->name('getResize');
    Route::get('/file_manager/doresize', '\UniSharp\LaravelFilemanager\Controllers\ResizeController@performResize')->name('performResize');
    Route::get('/file_manager/download', '\UniSharp\LaravelFilemanager\Controllers\DownloadController@getDownload')->name('getDownload');
    Route::get('/file_manager/delete', '\UniSharp\LaravelFilemanager\Controllers\DeleteController@getDelete')->name('getDelete');
    Route::get('/file_manager/demo', '\UniSharp\LaravelFilemanager\Controllers\DemoController@index')->name('getDelete');
});




Route::post('api/text-editor-{key_name}', 'Api\EditorController@textEditor');
Route::post('api/image-editor-{key_name}', 'Api\EditorController@imageEditor');
Route::post('api/page-editor', 'Api\EditorController@pageEditor');
Route::post('api/seo-editor', 'Api\EditorController@seoEditor');
Route::post('api/site-settings', 'Api\EditorController@siteSettings');
Route::post('api/style-editor', 'Api\EditorController@styleEditor');
