<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecipeRequest;
use App\Models\Cuisine;
use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    public function __construct() {
        $this->middleware(['auth'], ['only' => ['create', 'edit','destroy']]);
    }
    public function index()
    {
        $recipes = Recipe::all();
        return view('recipes.index', ['recipes' => $recipes]);
    }
    public function show($id)
    {
        $recipe = Recipe::findOrFail($id);
        return view('recipes.show', ['recipe' => $recipe]);
    }
    // Show the form for creating a new resource.
    public function create()
    {
        $cuisines=Cuisine::orderBy('name')->get();
        $ingredients = Ingredient::orderBy('name')->get();
        return view('recipes.create',compact(["ingredients","cuisines"]));
    }

    // Store a newly created resource in storage.
    public function store(RecipeRequest $request)
    {
       $cuisine = Cuisine::findOrFail($request->cuisine_id);
        $recipe = new Recipe($request->all());
        // Associate the recipe with the cuisine and save it
        $recipe->cuisine()->associate($cuisine);
        // Associate the recipe with the authenticated user
        $recipe->user_id = auth()->user()->id; // Assuming you have user authentication
        // Optionally handle file upload
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $path = $request->file('file')->storePublicly('recipes', 'public');
            $recipe->file = $path;
        }
        // Save the recipe
        $recipe->save();
        // Sync ingredients
        $recipe->ingredients()->sync($request->ingredients);
        // Redirect the user to the index page of recipes
        return redirect()->route('recipes.index');
    }
    // Show the form for editing the specified resource.
    public function edit($id)
    {
        $recipe = Recipe::findOrFail($id);
        $cuisines=Cuisine::orderBy('name')->get();
        $ingredients = Ingredient::orderBy('name')->get();
        // Check if the authenticated user is the owner of the recipe
        if (Auth::id() !== $recipe->user_id) {
            abort(403, 'Unauthorized to edit this recipe.');
        }
        return view('recipes.edit', ['recipe' => $recipe,'cuisines'=>$cuisines, 'ingredients'=>$ingredients]);
    }
    // Update the specified resource in storage.
    public function update(RecipeRequest $request, $id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->update($request->validated());
        $recipe->ingredients()->sync($request->input('ingredients'));
        return redirect()->route('recipes.show',['recipe'=>$recipe]);
    }
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        return redirect()->route('recipes.index');
    }
}
