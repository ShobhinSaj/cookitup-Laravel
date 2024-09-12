<?php

namespace App\Http\Controllers;

use App\Http\Requests\CuisineRequest;
use App\Models\Cuisine;
use Illuminate\Http\Request;
class CuisineController extends Controller
{
    public function __construct() {
        $this->middleware(['auth','admin'], ['only' => ['create', 'edit','destroy']]);
    }
    public function index()
    {
        $cuisines = Cuisine::all();
        return view('cuisines.index', ['cuisines' => $cuisines]);
    }
    // Show the form for creating a new resource.
    public function create()
    {
        return view('cuisines.create');
    }
    // Store a newly created resource in storage.
    public function store(CuisineRequest $request)
    {

        $validatedData = $request->validated();
        $cuisine = Cuisine::create($validatedData);
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $path = $request->file('file')->storePublicly('images', 'public');
            $cuisine->file = $path;
            $cuisine->save(); // Save the cuisine after updating the file attribute
        }
        return redirect('cuisines')->with('success', 'Cuisine created successfully!');
    }
    // Display the specified resource.
    public function show($id)
    {
        $cuisine = Cuisine::findOrFail($id);
        return view('cuisines.show', compact('cuisine'));
    }
    // Show the form for editing the specified resource.
    public function edit($id)
    {
        $cuisine = Cuisine::findOrFail($id);
        return view('cuisines.edit', compact('cuisine'));
    }
    // Update the specified resource in storage.
    public function update(CuisineRequest $request,  $id)
    {
        $cuisine = Cuisine::findOrFail($id);
        $cuisine->name = $request->input('name');
        // Handle image upload (if provided)
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $path = $request->file->storePublicly('images', 'public');
            $cuisine->file = $path;
        }
        $cuisine->save();
        return redirect()->route('cuisines.index');
    }
    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $cuisine = Cuisine::findOrFail($id);
        $cuisine->delete();
        return redirect()->route('cuisines.index');
    }
}
