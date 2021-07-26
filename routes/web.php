<?php



Route::view('/','home')->name('home');
Route::view('/quienes-somos', 'about')->name('about');

Route::resource('portafolio', 'ProjectController')
->parameters(['portafolio'=>'project'])
->names('projects');

// Route::get('/portafolio', 'ProjectController@index')->name('projects.index');
// Route::get('/portafolio/crear', 'ProjectController@create')->name('projects.create');
// Route::get('/portafolio/{project}/editar', 'ProjectController@edit')->name('projects.edit');
// Route::patch('/portafolio/{project}', 'ProjectController@update')->name('projects.update');

// Route::post('/portafolio', 'ProjectController@store')->name('projects.store');

// Route::get('/portafolio/{project}', 'ProjectController@show')->name('projects.show');

// Route::delete('/portafolio/{project}', 'ProjectController@destroy')->name('projects.destroy');


Route::view('/contact', 'contact')->name('contact');

Route::post('contact', 'massageController@store')->name('messages.store');


// Route::get('/', function(){
// 	$nombre = "Ivan";
// 	return view('home')->with(['nombre'=> $nombre]);
// })->name('home');

Auth::routes();



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
