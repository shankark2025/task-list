<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\myController;
use App\Http\Controllers\PaintingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Task;
use App\Models\User;
use App\Http\Requests\TaskRequest;
use App\Http\Requests\UserRequest;


/* Route::get('/', function () {
    return view('welcome');
}); */
/*
Route::get('/', function () {
    return 'Main Page';
});
*/
/*
Route::get('/', function (){
    return view('index', [
        'name'=>'John'
    ]);
});
*/


   //Route::view('user/login', 'login')->name('login');

//use App\Http\Controllers\UserController;




Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('user.login.post');

/*
Route::get('/dashboard', [UserController::class, 'dashboard'])
    ->middleware('auth')
    ->name('user.dashboard');
*/
Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');


Route::middleware('auth.custom')->group(function() {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
     });
});




Route::get('/', function (){
    return redirect()->route('tasks.index');
});

//Route::get('/product/{product}', [ProductController::class, 'display']);

Route::get('/products', [ProductController::class, 'index']);  // 👈 new route
Route::get('/product/{product}', [ProductController::class, 'show']);

Route::get('/onlythis/{place?}/{place2}', function (string $place = 'londan', $place2='India') {
    return $place." ".$place2;
});


Route::prefix('admin')->group(function () {
    Route::get('/user/{user}', [UserController::class, 'show']);
});


Route::prefix('admin')->group(function () {
    Route::prefix('city')->group(function () {
        Route::get('/pollution', function () {
            return 'Admin City Pollution Page';
        });
    });
});


Route::name('admin.')->group(function () {

    Route::name('city.')->group(function () {

        Route::get('/pollution', function () {
            return 'Pollution page';
        })->name('pollution');

        Route::get('/water', function () {
            return 'Water page';
        })->name('water');

    });

});

//Route::get('/login', [AdminController::class, 'showLoginForm'])->name('login');






    //Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('login');

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login.post');
   // Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('auth:admin');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
});




// Outer group for admin section
/*
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {

    // Inner group for city-related pages
    Route::prefix('city')->name('city.')->middleware('verified')->group(function () {

        // Pollution page
        Route::get('/pollution', function () {
            $data = [
                'name' => 'Shankar',
                'organization' => 'ORGNAME'
            ];

            // Passing data using with()
            return view('city.pollution')
                    ->with('name', $data['name'])
                    ->with('organization', $data['organization']);
        })->name('pollution');

        // Water page
        Route::get('/water', function () {
            $data = [
                'name' => 'Shankar',
                'organization' => 'ORGNAME'
            ];

            // Passing data using with()
            return view('city.water')
                    ->with('name', $data['name'])
                    ->with('organization', $data['organization']);
        })->name('water');

    });

});

*/

Route::get('/myusers', function(){
    return redirect()->route('admin.city.water');
});

/*
Route::get('/myusers', function(){
    return view('myusers', [
        'users'=>DB::table('users')->select('id', 'name', 'email as user_email')->get(),
        'secondData'=>DB::table('users')
    ->whereNotNull('email_verified_at')
    ->count()
    ]);
})->name('myuser.show');
*/

Route::get('/myusers', function () {
    return view('myusers', [

        'users'=>User::latest()->whereNotNull('email_verified_at')->paginate(3),
        'secondData'=>DB::table('users')->get()->whereNotNull('email_verified_at')->count()

    ]);
})->name('myuser.show');

Route::redirect('/ep1', '/myusers', 301);
Route::resource('paintings', PaintingController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('cars', CarController::class);
Route::get('/jobs', function(){
    return view('jobs');
});
/*
Route::get('/profile', function(){
    return view('profile');
});
*/
Route::get('/profile', function () {
    return view('profile');
});
/*
Route::get('/dashboard', function () {
    return view('dashboard');
});
*/
Route::get('/welcomeone', function () {
    return view('welcomeOne');
});

Route::get('/my/{id}', function (Request $request, $id) {
    return $request->url() . " - User ID: " . $id;
});


Route::get('/tasks', function () {
    return view('tasks', [
       // 'tasks'=>\App\Models\Task::latest()->where('completed', true)->get()
       //'tasks'=>Task::latest()->where('completed', '=',0)->paginate(7)
        //'tasks'=>Task::latest()->where('completed', '=',0)-r>paginate(7)
        'tasks'=>Task::latest()->paginate(7)
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')->name('tasks.create');

Route::get('/tasks/{task}/edit', function (Task $task)  {

    return view('edit', ['task'=>$task]);

})->name('task.edit');


Route::get('/user/{user}/edit', function (User $user)  {

    return view('useredit', ['user'=>$user]);

})->name('user.edit');

Route::get('/tasks/{task}', function (Task $task)  {

    return view('show', ['task'=>$task]);
    //return 'One single Task';

})->name('task.show');


Route::get('/dashboard/{id}', [myController::class, 'dashboard'])
     ->name('employee.dashboard');



Route::post('/tasks',function(TaskRequest $request){

    $task=Task::create($request->validated());

    return redirect()->route('task.show', ['task'=> $task->id])->with('success', 'Task Created Successfully');
})->name('tasks.store');



Route::put('/tasks/{task}',function(Task $task, TaskRequest $request){
   // $task->update($request->validated());
   $task->update($request->validated());

    return redirect()->route('task.show', ['task'=> $task->id])->with('success', 'Task Updated Successfully');
})->name('tasks.update');



Route::put('/user/{user}/edit',function(User $user, UserRequest $request){
   // $task->update($request->validated());
   //echo "test";
   //$request->only(['name', 'email'])
   $user->update($request->validated());
   //$user->update($request->only(['name', 'email']));

    return redirect()->route('user.edit', ['user'=> $user->id])->with('success', 'User Updated Successfully');
})->name('user.update');

Route::delete('/task/{task}', function(Task $task){
    $task->delete();
    return redirect()->route('tasks.index')->with('success', 'Task Deleted Successfully');
})->name('tasks.destroy');


Route::put('task/{task}/toggle-complete', function(Task $task) {
    //$task->completed = !$task->completed;
    //$task->save();
    $task->toggleComplete();
    return redirect()->back()->with('success', 'Task Updated Successfully');
})->name('task.toggle-complete');

Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'hi'])) {

        session(['locale' => $locale]);
    }
    App::setLocale('hi');
    return redirect()->back();
});
 Route::get('/welcome', function () { return 'Hello Reader'; });






/*

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/hello', function (){
    return 'Hello';
})->name('hello');

Route::get('/hallo', function (): string{
    return redirect('/hello');
});

Route::get('/halla', function (): string{
    return redirect()->route('hello');
});

Route::get('/greet/{name}', function ($name): string {
    return 'Hello '. $name. "!";
});
*/
/*
Route::get('/task/{task}', function (Task $task): string {
    return view('show', ['task'=>$task]);
});
*/

Route::fallback(function(){
    return 'Still got somewhere..!';
});
