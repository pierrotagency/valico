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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




// HOME
Route::get('/', 'HomeController@index')->name('home');



// CALENDARIOS
Route::view('/calendar', 'calendar');
Route::get('/calendar_vencimientos', function(){
    $types = CalendarController::$b_types;
    return view('calendar_vencimientos', compact('types'));
});

// BUSQUEDA
Route::get('/resultados', 'SearchController@index')->name('search_results');



// TMP 
Route::get('/components', 'ComponentsController@index')->name('components');
Route::view('/mapa', 'mapa');
// END TMP


////////////////////
// ADMIN
////////////////////

Route::group([
        'namespace' => 'Admin',
        'prefix'    => 'admin',        
        'middleware' => 'auth'
        ], function () {


    Route::get('/', ['as' => 'admin.home', 'uses' => 'HomeController@index']);


    // USER CONFIG
    Route::post('user/config', ['as' => 'admin.user.config', 'uses' => 'UserController@saveConfig']);


    // USER PROFILE
    Route::get('users', ['as' => 'admin.user.list', 'uses' => 'UserController@listUsers']);
    Route::get('user/edit/{id?}', ['as' => 'admin.user.edit', 'uses' => 'UserController@editProfile']);
    Route::patch('user/patch', ['as' => 'admin.user.patch', 'uses' => 'UserController@patchProfile']);
    Route::get('user/password/{id?}', ['as' => 'admin.user.password', 'uses' => 'UserController@editPassword']);
    Route::patch('user/password/{id?}', ['as' => 'admin.user.password', 'uses' => 'UserController@patchPassword']);
    Route::get('user/add', ['as' => 'admin.user.add', 'uses' => 'UserController@addUser']);
    Route::post('user/delete/{id}', ['as' => 'admin.user.delete', 'uses' => 'UserController@deleteUser']);


    // ALTER
    Route::get('alerts', ['as' => 'admin.alert.list', 'uses' => 'AlertController@list']);
    Route::get('alert/edit/{id?}', ['as' => 'admin.alert.edit', 'uses' => 'AlertController@edit']);
    Route::patch('alert/patch', ['as' => 'admin.alert.patch', 'uses' => 'AlertController@patch']);
    Route::get('alert/add', ['as' => 'admin.alert.add', 'uses' => 'AlertController@add']);
    Route::post('alert/delete/{id}', ['as' => 'admin.alert.delete', 'uses' => 'AlertController@delete']);


    // FOLDER

    Route::post('folder/tree', ['as' => 'admin.folder.tree', 'uses' => 'FolderController@tree']); // todas las acciones que vienen del tree. no lleva ID porque es transversal

    Route::get('folder/search', ['as' => 'admin.folder.search', 'uses' => 'FolderController@search']); // lo usan los select2 de los componentes    
    Route::post('folder/getby/id', ['as' => 'admin.folder.getby.id', 'uses' => 'FolderController@getById']); // lo usa el componente formLink para obtener datos de valor seleccionado

    Route::get('folder/panel/{id?}', ['as' => 'admin.folder.panel', 'uses' => 'FolderController@panel']);
    Route::post('folder/panel/sort', ['as' => 'admin.folder.panel.sort', 'uses' => 'FolderController@panelSaveSort']);


    Route::post('folder/add', ['as' => 'admin.folder.add', 'uses' => 'FolderController@addFolder']);
    
    Route::get('folder/{id}/compose', ['as' => 'admin.folder.compose', 'uses' => 'FolderController@composeEdit']);
    Route::post('folder/{id}/compose', ['as' => 'admin.folder.compose', 'uses' => 'FolderController@composeSave']);
    Route::post('folder/{id}/screenshot', ['as' => 'admin.folder.screenshot', 'uses' => 'FolderController@screenshotSave']);
    Route::post('folder/{id}/edit', ['as' => 'admin.folder.edit', 'uses' => 'FolderController@propertiesSave']);
    Route::post('folder/{id}/cover', ['as' => 'admin.folder.cover', 'uses' => 'FolderController@coverSave']);
    Route::post('folder/{id}/profile', ['as' => 'admin.folder.profile', 'uses' => 'FolderController@profileSave']);
    Route::get('folder/{id?}/delete', ['as' => 'admin.folder.delete', 'uses' => 'FolderController@deleteFolder']);

    Route::get('folder/{id}/duplicate', ['as' => 'admin.folder.duplicate', 'uses' => 'FolderController@duplicateFolder']);
    Route::post('folder/cut', ['as' => 'admin.folder.cut', 'uses' => 'FolderController@cutFolder']);
    Route::get('folder/{id}/cut/paste', ['as' => 'admin.folder.cut.paste', 'uses' => 'FolderController@cutPasteFolder']);
    // Route::post('folder/copy', ['as' => 'admin.folder.copy', 'uses' => 'FolderController@copyFolder']);    
    // Route::get('folder/{id}/copy/paste', ['as' => 'admin.folder.copy.paste', 'uses' => 'FolderController@copyPasteFolder']);


    Route::post('folder/{id}/set/layout', ['as' => 'admin.folder.set.layout', 'uses' => 'FolderController@setLayout']); // todas las acciones que vienen del tree

    Route::post('folder/{id}/content/add', ['as' => 'admin.folder.content.add', 'uses' => 'FolderController@addContent']);
    Route::post('folder/{id}/content/remove', ['as' => 'admin.folder.content.remove', 'uses' => 'FolderController@removeContent']);
    Route::post('folder/{id}/content/clon', ['as' => 'admin.folder.content.clon', 'uses' => 'FolderController@clonContent']);
    

    Route::get('content/{id}/edit', ['as' => 'admin.content.edit', 'uses' => 'FolderController@editContent']);
    Route::post('content/{id}/save', ['as' => 'admin.content.save', 'uses' => 'FolderController@saveContent']);
    Route::post('content/screenshot', ['as' => 'admin.content.screenshot', 'uses' => 'FolderController@screenshotContent']);


    // CALENDARIO
    Route::get('calendar', ['as' => 'admin.calendar.index', 'uses' => 'CalendarController@index']);
    Route::get('calendar/new', ['as' => 'admin.calendar.add', 'uses' => 'CalendarController@add']);
    Route::get('calendar/{id}/edit', ['as' => 'admin.calendar.edit', 'uses' => 'CalendarController@edit']);
    Route::post('calendar', ['as' => 'admin.calendar.post', 'uses' => 'CalendarController@post']);
    Route::post('calendar/{id}/edit', ['as' => 'admin.calendar.put', 'uses' => 'CalendarController@put']);
    Route::post('calendar/{id}/delte', ['as' => 'admin.calendar.delete', 'uses' => 'CalendarController@delete']);

    // CALENDARIO VENCIMIENTOS
    Route::get('calendar_vencimientos', ['as' => 'admin.calendar_vencimientos.index', 'uses' => 'CalendarController@index']);
    Route::get('calendar_vencimientos/new', ['as' => 'admin.calendar_vencimientos.add', 'uses' => 'CalendarController@add']);
    Route::get('calendar_vencimientos/{id}/edit', ['as' => 'admin.calendar_vencimientos.edit', 'uses' => 'CalendarController@edit']);
    Route::post('calendar_vencimientos', ['as' => 'admin.calendar_vencimientos.post', 'uses' => 'CalendarController@post']);
    Route::post('calendar_vencimientos/{id}/edit', ['as' => 'admin.calendar_vencimientos.put', 'uses' => 'CalendarController@put']);
    Route::post('calendar_vencimientos/{id}/delte', ['as' => 'admin.calendar_vencimientos.delete', 'uses' => 'CalendarController@delete']);

    // CAMPAÑAS
    Route::get('campanias', ['as' => 'admin.campanias.index', 'uses' => 'CampaignController@index']);

    Route::get('campanias/new', ['as' => 'admin.campanias.add', 'uses' => 'CampaignController@add']);
    Route::post('campanias', ['as' => 'admin.campanias.post', 'uses' => 'CampaignController@post']);

    Route::get('campanias/{id}/edit', ['as' => 'admin.campanias.edit', 'uses' => 'CampaignController@edit']);
    Route::post('campanias/{id}/edit', ['as' => 'admin.campanias.put', 'uses' => 'CampaignController@put']);

    Route::post('campanias/{id}/delte', ['as' => 'admin.campanias.delete', 'uses' => 'CampaignController@delete']);

    Route::get('/campanias/{campaign_id}/slot/{slot_uuid}/edit', ['as' => 'admin.campanias.slot.edit', 'uses' => 'CampaignController@slotEdit']);
    Route::post('/campanias/{campaign_id}/slot/{slot_uuid}/save', ['as' => 'admin.campanias.slot.save', 'uses' => 'CampaignController@slotSave']);
    Route::post('/campanias/{campaign_id}/slot/{slot_uuid}/delete', ['as' => 'admin.campanias.slot.delete', 'uses' => 'CampaignController@slotDelete']);

    // PARAMETROS CONFIGURABLES
    Route::get('campos', ['as' => 'admin.fields.index', 'uses' => 'FieldsController@index']);
    Route::post('campos', ['as' => 'admin.fields.save', 'uses' => 'FieldsController@save']);


    //FILE UPLOAD
    Route::post('service/upload/file', ['as' => 'service.uploader.file.upload', 'uses' => 'ServiceController@uploadFile']);
    Route::get('service/upload/image', ['as' => 'service.uploader.image.display', 'uses' => 'ServiceController@displayImage']);
    Route::post('service/upload/image', ['as' => 'service.uploader.image.upload', 'uses' => 'ServiceController@uploadImage']);


});


////////////////////
// FIN ADMIN
////////////////////



Route::get('/print/{url?}', ['as' => 'folder.print', 'uses' => 'FolderController@printFolder'])->where('url', '(.*)'); // solo imprime los contenidos (layout y contenidos), sin el marco del sitio

Route::get('content/{id}/print', ['as' => 'admin.content.print', 'uses' => 'FolderController@printContent']); // devuelve el html del contenido pedido por ID (responde al componente + sus datos)

Route::get('/{url?}', ['as' => 'folder.view', 'uses' => 'FolderController@viewFolder'])->where('url', '(.*)'); // imprime el folder con layout y marco del sitio