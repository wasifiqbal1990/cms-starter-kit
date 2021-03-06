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

//{{dd(\Auth::user());}}
use Illuminate\Support\Facades\Auth;


Route::get('/', [\App\Http\Controllers\Frontend\HomePageController::class,'index'])->name('homepage');
Route::get('/register', [\App\Http\Controllers\Frontend\RegisterController::class,'index'])->name('register');
Route::post('/register', [\App\Http\Controllers\Frontend\RegisterController::class,'sendEmail'])->name('register.store');

$adminPrefix = 'admin';

Route::group(['middleware' => ['get.menu'], 'prefix'=> $adminPrefix], function () use ($adminPrefix) {

    Route::get('/', function () {
       if(Auth::check())
       {
           return view('dashboard.homepage');
       }
       else
       {
           return view('auth.login');
       }

    });
    Route::get('/logout', [\App\Http\Controllers\Auth\LoginController::class,'logout'])->name('admin.logout');

//    Route::group(['middleware' => ['role:user']], function () {
//        Route::get('/colors', function () {     return view('dashboard.colors'); });
//        Route::get('/typography', function () { return view('dashboard.typography'); });
//        Route::get('/charts', function () {     return view('dashboard.charts'); });
//        Route::get('/widgets', function () {    return view('dashboard.widgets'); });
//        Route::get('/404', function () {        return view('dashboard.404'); });
//        Route::get('/500', function () {        return view('dashboard.500'); });
//        Route::prefix('base')->group(function () {
//            Route::get('/breadcrumb', function(){   return view('dashboard.base.breadcrumb'); });
//            Route::get('/cards', function(){        return view('dashboard.base.cards'); });
//            Route::get('/carousel', function(){     return view('dashboard.base.carousel'); });
//            Route::get('/collapse', function(){     return view('dashboard.base.collapse'); });
//
//            Route::get('/forms', function(){        return view('dashboard.base.forms'); });
//            Route::get('/jumbotron', function(){    return view('dashboard.base.jumbotron'); });
//            Route::get('/list-group', function(){   return view('dashboard.base.list-group'); });
//            Route::get('/navs', function(){         return view('dashboard.base.navs'); });
//
//            Route::get('/pagination', function(){   return view('dashboard.base.pagination'); });
//            Route::get('/popovers', function(){     return view('dashboard.base.popovers'); });
//            Route::get('/progress', function(){     return view('dashboard.base.progress'); });
//            Route::get('/scrollspy', function(){    return view('dashboard.base.scrollspy'); });
//
//            Route::get('/switches', function(){     return view('dashboard.base.switches'); });
//            Route::get('/tables', function () {     return view('dashboard.base.tables'); });
//            Route::get('/tabs', function () {       return view('dashboard.base.tabs'); });
//            Route::get('/tooltips', function () {   return view('dashboard.base.tooltips'); });
//        });
//        Route::prefix('buttons')->group(function () {
//            Route::get('/buttons', function(){          return view('dashboard.buttons.buttons'); });
//            Route::get('/button-group', function(){     return view('dashboard.buttons.button-group'); });
//            Route::get('/dropdowns', function(){        return view('dashboard.buttons.dropdowns'); });
//            Route::get('/brand-buttons', function(){    return view('dashboard.buttons.brand-buttons'); });
//        });
//        Route::prefix('icon')->group(function () {  // word: "icons" - not working as part of adress
//            Route::get('/coreui-icons', function(){         return view('dashboard.icons.coreui-icons'); });
//            Route::get('/flags', function(){                return view('dashboard.icons.flags'); });
//            Route::get('/brands', function(){               return view('dashboard.icons.brands'); });
//        });
//        Route::prefix('notifications')->group(function () {
//            Route::get('/alerts', function(){   return view('dashboard.notifications.alerts'); });
//            Route::get('/badge', function(){    return view('dashboard.notifications.badge'); });
//            Route::get('/modals', function(){   return view('dashboard.notifications.modals'); });
//        });
//        Route::resource('notes', 'NotesController');
//    });
    Auth::routes();

//    Route::resource('resource/{table}/resource', 'ResourceController')->names([
//        'index'     => 'resource.index',
//        'create'    => 'resource.create',
//        'store'     => 'resource.store',
//        'show'      => 'resource.show',
//        'edit'      => 'resource.edit',
//        'update'    => 'resource.update',
//        'destroy'   => 'resource.destroy'
//    ]);

    Route::group(['prefix' => 'cms'],function (){

        Route::get('pages',[\App\Http\Controllers\PagesController::class,'index'])->name('pages.index');
        Route::get('pages/create',[\App\Http\Controllers\PagesController::class,'create'])->name('pages.create');
        Route::post('pages',[\App\Http\Controllers\PagesController::class,'store'])->name('pages.store');
        Route::get('pages/{page}/edit',[\App\Http\Controllers\PagesController::class,'edit'])->name('pages.edit');
        Route::patch('pages/{page}',[\App\Http\Controllers\PagesController::class,'update'])->name('pages.update');
        Route::delete('pages/{page}/delete',[\App\Http\Controllers\PagesController::class,'delete'])->name('pages.destroy');

        Route::get('events', [\App\Http\Controllers\NoticesController::class,'index'])->name('events.index')->defaults('type','events');
        Route::get('events/create', [\App\Http\Controllers\NoticesController::class,'create'])->name('events.create')->defaults('type','events');
        Route::post('events', [\App\Http\Controllers\NoticesController::class,'store'])->name('events.store')->defaults('type','events');
        Route::get('events/{event}/edit', [\App\Http\Controllers\NoticesController::class,'edit'])->name('events.edit')->defaults('type','events');
        Route::patch('events/{event}', [\App\Http\Controllers\NoticesController::class,'update'])->name('events.update')->defaults('type','events');
        Route::delete('events/{event}/delete', [\App\Http\Controllers\NoticesController::class,'delete'])->name('events.destroy')->defaults('type','events');


        Route::get('notifications', [\App\Http\Controllers\NoticesController::class,'index'])->name('notification.index')->defaults('type','notification');
        Route::get('notifications/create', [\App\Http\Controllers\NoticesController::class,'create'])->name('notification.create')->defaults('type','notification');
        Route::post('notifications', [\App\Http\Controllers\NoticesController::class,'store'])->name('notification.create')->defaults('type','notification');
        Route::get('notifications/{notification}/edit', [\App\Http\Controllers\NoticesController::class,'edit'])->name('notification.edit')->defaults('type','notification');
        Route::patch('notifications/{notification}', [\App\Http\Controllers\NoticesController::class,'update'])->name('notification.edit')->defaults('type','notification');
        Route::delete('notifications/{notification}/delete', [\App\Http\Controllers\NoticesController::class,'delete'])->name('notification.destroy')->defaults('type','notification');
        //====

        Route::get('sections',[\App\Http\Controllers\SectionsController::class,'index'])->name('sections.index');
        Route::get('sections/create',[\App\Http\Controllers\SectionsController::class,'create'])->name('sections.create');
        Route::post('sections',[\App\Http\Controllers\SectionsController::class,'store'])->name('sections.store');
        Route::get('sections/{section}/edit',[\App\Http\Controllers\SectionsController::class,'edit'])->name('sections.edit');
        Route::patch('sections',[\App\Http\Controllers\SectionsController::class,'patch'])->name('sections.update');
        Route::delete('sections/{section}/delete',[\App\Http\Controllers\SectionsController::class,'delete'])->name('sections.destroy');

    });

//    Route::group(['middleware' => ['role:admin']], function () {
//    Route::group([], function () {
//        Route::resource('bread',  'BreadController');   //create BREAD (resource)
//        Route::resource('users',        'UsersController')->except( ['create', 'store'] );
//        Route::resource('roles',        'RolesController');
//        Route::resource('mail',        'MailController');
//        Route::get('prepareSend/{id}',        'MailController@prepareSend')->name('prepareSend');
//        Route::post('mailSend/{id}',        'MailController@send')->name('mailSend');
//        Route::get('/roles/move/move-up',      'RolesController@moveUp')->name('roles.up');
//        Route::get('/roles/move/move-down',    'RolesController@moveDown')->name('roles.down');
//        Route::prefix('menu/element')->group(function () {
//            Route::get('/',             'MenuElementController@index')->name('menu.index');
//            Route::get('/move-up',      'MenuElementController@moveUp')->name('menu.up');
//            Route::get('/move-down',    'MenuElementController@moveDown')->name('menu.down');
//            Route::get('/create',       'MenuElementController@create')->name('menu.create');
//            Route::post('/store',       'MenuElementController@store')->name('menu.store');
//            Route::get('/get-parents',  'MenuElementController@getParents');
//            Route::get('/edit',         'MenuElementController@edit')->name('menu.edit');
//            Route::post('/update',      'MenuElementController@update')->name('menu.update');
//            Route::get('/show',         'MenuElementController@show')->name('menu.show');
//            Route::get('/delete',       'MenuElementController@delete')->name('menu.delete');
//        });
//        Route::prefix('menu/menu')->group(function () {
//            Route::get('/',         'MenuController@index')->name('menu.menu.index');
//            Route::get('/create',   'MenuController@create')->name('menu.menu.create');
//            Route::post('/store',   'MenuController@store')->name('menu.menu.store');
//            Route::get('/edit',     'MenuController@edit')->name('menu.menu.edit');
//            Route::post('/update',  'MenuController@update')->name('menu.menu.update');
//            Route::get('/delete',   'MenuController@delete')->name('menu.menu.delete');
//        });
//        Route::prefix('media')->group(function () {
//
//            Route::get('/',                 'MediaController@index')->name('media.folder.index');
//            Route::get('/folder/store',     'MediaController@folderAdd')->name('media.folder.add');
//            Route::post('/folder/update',   'MediaController@folderUpdate')->name('media.folder.update');
//            Route::get('/folder',           'MediaController@folder')->name('media.folder');
//            Route::post('/folder/move',     'MediaController@folderMove')->name('media.folder.move');
//            Route::post('/folder/delete',   'MediaController@folderDelete')->name('media.folder.delete');;
//
//            Route::post('/file/store',      'MediaController@fileAdd')->name('media.file.add');
//            Route::get('/file',             'MediaController@file');
//            Route::post('/file/delete',     'MediaController@fileDelete')->name('media.file.delete');
//            Route::post('/file/update',     'MediaController@fileUpdate')->name('media.file.update');
//            Route::post('/file/move',       'MediaController@fileMove')->name('media.file.move');
//            Route::post('/file/cropp',      'MediaController@cropp');
//            Route::get('/file/copy',        'MediaController@fileCopy')->name('media.file.copy');
//        });
//    });
});
