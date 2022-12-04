<?php

namespace App\Http\Controllers;
use App\Models\todo_list;

use Illuminate\Http\Request;

class TodoListController extends Controller
{
   public function index(){
    return view('view_list')->with('todo_arr',todo_list::all());
   }

   public function create(){
    return view('create_new_list');
   }

   public function store(Request $request){
    // return $request->input('name');
    $todo = new todo_list();
    $todo->name = $request->input('name');
    $todo->save();
    return redirect('/');
   }

   public function delete(todo_list $todo_list, $id){
    // $row = todo_list::find($id);
    // $row->destroy();
    $row = todo_list::destroy($id);
    return redirect('/');
    // return $id;
   }

   public function edit(todo_list $todo_list, $id){
    $todo = todo_list::find($id);
    return view('edit_list')->with('todo_arr',$todo);
   }

   public function update(Request $request,todo_list $todo_list, $id){
    $todo = todo_list::find($id);
    $todo->name = $request->input('name');
    $todo->save();
    return redirect('/');
   }
}
