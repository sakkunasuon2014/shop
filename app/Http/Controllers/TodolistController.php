<?php


namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class TodolistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todolists = Todolist::with('category')->get(); // Load categories with todolists
        return view('todolists.index')->with('todolists', $todolists);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = array();
        foreach (Category::all() as $category) {
            $categories[$category->id] = $category->name;
        }
        return view('todolists.create')->with('categories', $categories);
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255|min:3',
            'description' => 'required|max:1000|min:10',
            'status' => 'required|in:pending,completed',
            'category_id' => 'required|exists:categories,id', // Add category validation
        ]);

        if ($validator->fails()) {
            return redirect('todolists/create')
                ->withInput()
                ->withErrors($validator);
        }

        $todolist = new Todolist();
        $todolist->title = $request->title;
        $todolist->description = $request->description;
        $todolist->status = $request->status;
        $todolist->category_id = $request->category_id; // Fix: Save category_id
        $todolist->save();

        Session::flash('todolists_create', 'New to-do item has been created successfully.');
        return redirect('todolists'); // Redirect to index instead of create
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $todolist = Todolist::with('category')->findOrFail($id); // Load category relationship
        return view('todolists.show')->with('todolists', $todolist);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories = array();
        foreach (Category::all() as $category) {
            $categories[$category->id] = $category->name;
        }
        $todolists = Todolist::findOrFail($id);
        return view('todolists.edit')->with('todolists', $todolists)->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         $validator = Validator::make($request->all(), [
            'title' => 'required|max:255|min:3',
            'description' => 'required|max:1000|min:10',
            'status' => 'required|in:pending,completed',
        ]);

        if ($validator->fails()) {
            return redirect('todolists/' . $id . '/edit')
                ->withInput()
                ->withErrors($validator);
        }
        $todolists = Todolist::find($id);

        $todolists->title = $request->Input('title');
        $todolists->category_id = $request->Input('category_id');
        $todolists->status = $request->Input('status');

        $todolists->description = $request->Input('description');
        $todolists->save();

        Session::flash('todolists_update', 'Data is updated');
        return redirect('todolists/' . $todolists->id . '/edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $todolist = Todolist::findOrFail($id);
        $todolist->delete();

        Session::flash('todolists_delete', 'To-do item has been deleted successfully.');
        return redirect('todolists');
    }
}