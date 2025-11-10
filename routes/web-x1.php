<?php

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Task;
use App\Http\Requests\TaskRequest;

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

Route::get('/', function (){
    return redirect()->route('tasks.index');
});

Route::get('/myusers', function(){
    return view('myusers', [
        'users'=>DB::table('users')->select('name', 'email as user_email')->get(),
        'secondData'=>DB::table('users')
    ->whereNotNull('email_verified_at')
    ->count()
    ]);
})->name('myuser.show');

Route::get('/tasks', function () {
    return view('tasks', [
       // 'tasks'=>\App\Models\Task::latest()->where('completed', true)->get()
        'tasks'=>Task::latest()->get()
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')->name('tasks.create');

Route::get('/tasks/{task}/edit', function (Task $task)  {

    return view('edit', ['task'=>$task]);

})->name('task.edit');

Route::get('/tasks/{task}', function (Task $task)  {

    return view('show', ['task'=>$task]);
    //return 'One single Task';

})->name('task.show');



Route::post('/tasks',function(TaskRequest $request){
    $data = $request->validated();
    $task = new Task;
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();

    return redirect()->route('task.show', ['task'=> $task->id])->with('success', 'Task Created Successfully');
})->name('tasks.store');

Route::put('/tasks/{task}',function(Task $task, TaskRequest $request){
    $data = $request->validated();

    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();

    return redirect()->route('task.show', ['task'=> $task->id])->with('success', 'Task Updated Successfully');
})->name('tasks.update');

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

Route::get('/task/{id}', function ($id): string {
    return view('show', ['task'=>\App\Models\Task::find($id)]);
});

Route::fallback(function(){
    return 'Still got somewhere..!';
});
