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
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

//BLOG

Route::get('/posts', 'PostsController@index');
Route::get('/posts/create', 'PostsController@create')->middleware('can:create');
Route::post('/posts', 'PostsController@store')->middleware('can:create');
Route::get('/posts/{post}', 'PostsController@show');
Route::get('/posts/{post}/edit', 'PostsController@edit')->middleware('can:update,post');
Route::patch('/posts/{post}', 'PostsController@update')->middleware('can:update,post');
Route::delete('/posts/{post}', 'PostsController@destroy')->middleware('can:delete,post');

//FORO

Route::get('/forum', 'ThreadsController@index');
Route::get('/forum/create', 'ThreadsController@create');
Route::get('/forum/{canal}', 'ThreadsController@index');
Route::get('/forum/{canal}/{thread}', 'ThreadsController@show');
Route::get ('/forum/{canal}/{thread}/edit', 'ThreadsController@edit')->middleware('can:update,thread');
Route::delete ('/forum/{canal}/{thread}', 'ThreadsController@destroy')->middleware('can:delete,thread');
Route::patch ('/forum/{canal}/{thread}/update', 'ThreadsController@update')->middleware('can:update,thread');
Route::post('/forum', 'ThreadsController@store');

Route::post('/forum/{canal}/{thread}/replies', 'RepliesController@store');
Route::delete('/replies/{reply}', 'RepliesController@destroy')->middleware('can:delete,reply');
Route::patch('/replies/{reply}', 'RepliesController@update');
Route::post('/replies/{reply}/favorites', 'FavoritesController@store');
Route::delete('/replies/{reply}/favorites', 'FavoritesController@destroy');


//CANALES

Route::post('/forum/createCanal', 'CanalsController@store');
Route::delete('/forum/destroyCanal', 'CanalsController@destroy');

//CITAS

Route::get('/citas', 'CitasController@index')->middleware('can:view');
Route::get('/citasNutri', 'CitasController@indexNutri');
Route::get('/citas/create', 'CitasController@create')->middleware('can:create');
Route::post('/citas/create', 'CitasController@store')->middleware('can:create');
Route::get('/citas/{cita}/edit', 'CitasController@edit')->middleware('can:update,cita');
Route::patch('/citas/{cita}/update', 'CitasController@update')->middleware('can:update,cita');
Route::get('/nutri', 'CitasController@getNutricionista');
Route::get('/piel', 'CitasController@getPiel');
Route::get('/pielR', 'CitasController@getPielRapido');
Route::get('/capilar', 'CitasController@getCapilar');
Route::get('/pedi', 'CitasController@getPedicular');
Route::get('/celu', 'CitasController@getCelulitis');
Route::get('/cabina', 'CitasController@getCabina');
Route::get('/sangui', 'CitasController@getSanguineo');
Route::get('/hipi', 'CitasController@getHipidico');
Route::delete('/citas/{cita}', 'CitasController@destroy')->middleware('can:delete,cita');

//EVENTOS

Route::get('/eventos', 'EventosController@index');
Route::get('/eventos/create', 'EventosController@create')->middleware('can:create');
Route::post('/eventos/create', 'EventosController@store')->middleware('can:create');
Route::get('/eventos/{evento}', 'EventosController@show');
Route::get('/eventos/{evento}/edit', 'EventosController@edit')->middleware('can:update,evento');
Route::patch('/eventos/{evento}', 'EventosController@update')->middleware('can:update,evento');
Route::delete('/eventos/{evento}', 'EventosController@destroy')->middleware('can:delete,evento');

Route::post('/eventos/{evento}/visitar', 'VisitasController@store');

Route::delete('/eventos/{evento}/novisitar', 'VisitasController@destroy');

//PERFIL

Route::get('/profiles/{user}', 'ProfilesController@show')->name('profile');

Route::get('/profiles/{user}/notifications', 'UserNotificationsController@asRead');

//REGISTRO Y LOGIN
Auth::routes();

//ADMIN

Route::get('/admin', 'AdminController@index')->middleware('admin');

Route::get('/admin/users', 'AdminController@usersIndex')->middleware('admin');
Route::get('/admin/users/create', 'AdminController@createUser')->middleware('admin');
Route::post('/admin/users/create', 'AdminController@storeUser')->middleware('admin');
Route::get('/admin/users/{user}/edit', 'AdminController@editUser')->middleware('admin');
Route::patch('/admin/users/{user}/update', 'AdminController@updateUser')->middleware('admin');
Route::delete('/admin/users/{user}', 'AdminController@destroyUser')->middleware('admin');

Route::get('/admin/posts', 'AdminController@postsIndex')->middleware('admin');
Route::get('/admin/posts/create', 'AdminController@createPost')->middleware('admin');
Route::post('/admin/posts/create', 'AdminController@storePost')->middleware('admin');
Route::get('/admin/posts/{post}/edit', 'AdminController@editPost')->middleware('admin');
Route::patch('/admin/posts/{post}/update', 'AdminController@updatePost')->middleware('admin');
Route::delete('/admin/posts/{post}', 'AdminController@destroyPost')->middleware('admin');

Route::get('/admin/hilos', 'AdminController@hilosIndex')->middleware('admin');
Route::get('/admin/hilos/create', 'AdminController@createHilo')->middleware('admin');
Route::post('/admin/hilos/create', 'AdminController@storeHilo')->middleware('admin');
Route::get('/admin/hilos/{canal}/{thread}/edit', 'AdminController@editHilo')->middleware('admin');
Route::patch('/admin/hilos/{canal}/{thread}/update', 'AdminController@updateHilo')->middleware('admin');
Route::delete('/admin/hilos/{canal}/{thread}', 'AdminController@destroyHilo')->middleware('admin');

Route::get('/admin/citas', 'AdminController@citasIndex')->middleware('admin');
Route::get('/admin/citas/create', 'AdminController@createCita')->middleware('admin');
Route::post('/admin/citas/create', 'AdminController@storeCita')->middleware('admin');
Route::get('/admin/citas/{cita}/edit', 'AdminController@editCita')->middleware('admin');
Route::patch('/admin/citas/{cita}/update', 'AdminController@updateCita')->middleware('admin');
Route::delete('/admin/citas/{cita}', 'AdminController@destroyCita')->middleware('admin');

Route::get('/admin/eventos', 'AdminController@eventosIndex')->middleware('admin');
Route::get('/admin/eventos/create', 'AdminController@createEvento')->middleware('admin');
Route::post('/admin/eventos/create', 'AdminController@storeEvento')->middleware('admin');
Route::get('/admin/eventos/{evento}/edit', 'AdminController@editEvento')->middleware('admin');
Route::patch('/admin/eventos/{evento}/update', 'AdminController@updateEvento')->middleware('admin');
Route::delete('/admin/eventos/{evento}', 'AdminController@destroyEvento')->middleware('admin');

//Route::post('/register', 'RegistrationController@store');

//Route::post('/login', 'SessionsController@store');

Route::get('/logout', 'SessionsController@destroy')->name('logout');



Route::post('api/users/{user}/avatar', 'Api\UserAvatarController@store')->middleware('auth')->name('avatar');

Route::get('api/users', 'Api\UsersController@index');

/*	RUTAS PRINCIPALES DE CADA MODELO

posts

GET /posts

GET /posts/create

POST /posts

GET /posts/{id}

GET /posts/{id}/edit

POST /posts/{id}

DELETE /posts/{id}

*/