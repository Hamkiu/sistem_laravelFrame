<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\Task;

class FormController extends Controller
{
    public function index(){
        $form = Form::with('task')->get();
        return view('form.list', compact('form'));
    }

    public function create(){
        $task = Task::all();
        return view('form.create', compact('task'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'nama_form' => 'required',
            'isi_form' => 'required',
            'gambar_form' => 'required',
            'id_task' => 'required',
        ]);

        $request->file('gambar_form')->store('public');
        $gambar_form = $request->file('gambar_form')->hashName();

        $form = new Form();
        $form->nama_form = $request->nama_form;
        $form->gambar_form = $gambar_form;
        $form->id_task = $request->id_task;
        $form->isi_form = $request->isi_form;

        try{
            $form->save();
            return redirect(route('form'))->with('message', ['success', 'Form Berjaya Ditambah']);

        }catch(Exception $e){
            return redirect(route('form'))->with('message', ['error', 'Form Tidak Berjaya Ditambah']);
        }

    }

    public function edit($id){
        $task = Task::all();
        $form = Form::findOrFail($id);
        // dd($task);
        return view('form.edit', compact('task','form'));
    }

    public function update(Request $request, $id){
        // dd($id);
        $this->validate($request,[
            'nama_form' => 'required',
            'isi_form' => 'required',
            'id_task' => 'required',
        ]);

        $form = Form::find(decode($id));
        // dd($form);
        $form->nama_form = $request->nama_form;
        $form->id_task = $request->id_task;
        $form->isi_form = $request->isi_form;

        if($request->hasFile('gambar_form')){
            $request->file('gambar_form')->store('public');
            $gambar_form = $request->file('gambar_form')->hashName();
            $form->gambar_form = $gambar_form;

        }

        try{
            $form->save();
            return redirect(route('form'))->with('message', ['success', 'Form Berjaya Diubah']);

        }catch(Exception $e){
            return redirect(route('form'))->with('message', ['error', 'Form Tidak Berjaya Diubah']);
        }

    }

    public function delete($id){
        $form = Form::find(decode($id));

        try{
            $form->delete();
            return redirect(route('form'))->with('message', ['success', 'Form Berjaya Dibuang']);

        }catch(Exception $e){
            return redirect(route('form'))->with('message', ['error', 'Form Tidak Berjaya Dibuang']);
        }
    }
}
