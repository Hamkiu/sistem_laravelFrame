<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(){
        $task = Task::all();
        return view('task.list', compact('task'));
    }

    public function create(){
        return view('task.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'nama_task' => 'required'
        ]);

        $task = new Task();
        $task->nama_task = $request->nama_task;

        try{
            $task->save();
            return redirect(route('task'))->with('message', ['success', 'Nama Task Berjaya Ditambah']);

        }catch(Exception $e){
            return redirect(route('task'))->with('message', ['error', 'Nama Task Tidak Berjaya Ditambah']);
        }
    }

    public function edit($id){
        $task = Task::findOrFail($id);
        // dd($task);
        return view('task.edit', compact('task'));
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'id_task' => 'required',
            'nama_task' => 'required',
        ]);

        $task = Task::findOrFail($request->id_task);
        $task->nama_task = $request->nama_task;

        try{
            $task->save();
            return redirect(route('task'))->with('message', ['success', 'Nama Task Berjaya Diubah']);

        }catch(Exception $e){
            return redirect(route('task'))->with('message', ['error', 'Nama Task Tidak Berjaya Diubah']);
        }
    }

    public function list(){
        
    }

    public function delete($id){
        $task = Task::findOrFail($id);

        try{
            $task->delete();
            return redirect(route('task'))->with('message', ['success', 'Nama Task Berjaya Dibuang']);

        }catch(Exception $e){
            return redirect(route('task'))->with('message', ['error', 'Nama Task Tidak Berjaya Dibuang']);
        }
    }
}
