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
        return view('form.create');
    }

    public function store(Request $request){
        
    }

    public function edit(){
        
    }

    public function update(Request $request){
        
    }

    public function delete(){
        
    }
}
