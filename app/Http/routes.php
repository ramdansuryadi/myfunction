<?php
use App\Task;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

 // Route::get('/tes', 'NewTask@create');

// Route::get('/', function () {
//     $tasks = Task::all();
//     return View::make('NewTask')->with('tasks',$tasks);
// });
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

// Route::group(['middleware' => ['web']], function () {
//     //
// });



// Route::get('/tasks/{task_id?}',function($task_id){
//     $task = Task::find($task_id);

//     return Response::json($task);
// });

// Route::post('/tasks',function(Request $request){
//     $task = Task::create($request->all());

//     return Response::json($task);
// });

// Route::put('/tasks/{task_id?}',function(Request $request,$task_id){
//     $task = Task::find($task_id);

//     $task->task = $request->task;
//     $task->description = $request->description;

//     $task->save();

//     return Response::json($task);
// });

// Route::delete('/tasks/{task_id?}',function($task_id){
//     $task = Task::destroy($task_id);

//     return Response::json($task);
// });


// // Basic routing

// Route::get('/hello',function(){
//     return 'Hello World!';
// });

// Route::get('/shop/{name}','ShoppingCart@show');


Route::get('/','ShoppingCart@show');


Route::delete('/tasks/{task_id?}','ShoppingCart@destroy');


Route::post('/tasks','ShoppingCart@create');


Route::put('/tasks/{task_id?}','ShoppingCart@store');

Route::get('/tasks/{task_id?}','ShoppingCart@edit');

