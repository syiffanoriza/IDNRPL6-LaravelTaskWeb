<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Task;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('verified');
        $this->middleware('is_admin');
    }

    // private $taskList = [
    //     'first' => 'Name',
    //     'second' => 'NIS',
    //     'third' => 'address'
    // ];

    public function index(Request $request)
    {
        if ($request->search) {
            $tasks = Task::where('tasks', 'LIKE', "%request->search%")
            ->paginate(4);

            return view('task.index', [
                'data' => $tasks
            ]);
        }

        $tasks = Task::paginate(4);
        return view('task.index', [
            'data' => $tasks
        ]);
    }

    public function create()
    {
        return view('task.create');
    }

    public function edit($id)
    {
        $task = Task::find($id);
        return view('task.edit', compact('task'));
    }

    public function store(TaskRequest $request)
    {
        
    // $this->taskList[$request->label] = $request->task;
    // return $this->taskList;
    
        // DB::table('tasks')->insert([
        //     'task' => $request->task,
        //     'user' => $request->user
        // ]);
    
        // return 'success';

        // validation system - 17 feb 2023
        // $request->validate([
        //     'tasks' => ['required'],
        //     'user' => ['required']
        // ]);
        // moved to app/Http/Requests/TaskRequest

        Task::create([
            'task'=> $request->task,
            'user'=> $request->user
        ]);
    
        return redirect('/tasks');
    }

    public function show($id)
    {
        // manggil data ber-parameter
        // return $param

        // return $this->taskList[$param];

        // $tasks = DB::table('tasks')
        // ->where('id', $id)->first();

        // ddd($tasks);
    
        $task = Task::find($id);
        return $task;
    }
    
    public function update($id, TaskRequest $request)
    {
        // $this->taskList[$key] = $request->task;
        // return $this->taskList;
    
        // $tasks = DB::table('tasks')
        // ->where('id', $id)
        // ->update([
        //     'task' => $request->task,
        //     'user' => $request->user
        // ]);

        // return 'success';

        $task = Task::find($id);
        $task->update([
            'task' => $request->task,
            'user' => $request->user
        ]);

        return redirect('/tasks');
    }

    public function destroy($id)
    {
        // unset($this->taskList[$key]);
        // return $this->taskList;
    
        // DB::table('tasks')
        // ->where('id', $id)
        // ->delete();

        // return 'success';

        $task = Task::find($id);
        $task->delete();

        return redirect('/tasks');
    }
}