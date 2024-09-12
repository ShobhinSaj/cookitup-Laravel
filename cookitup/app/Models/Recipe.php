<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    /**
     * Define the relationship with User model (one-to-many).
     */
    protected $fillable=[
        "title",
        "cuisine_id",
        "instruction"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Define the relationship with Cuisine model (many-to-one).
     */
    public function cuisine()
    {
        return $this->belongsTo(Cuisine::class);
    }
    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'recipe_ingredient');
    }

}
