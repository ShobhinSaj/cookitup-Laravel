<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuisine extends Model
{
    use HasFactory;
    /**
     * Define the relationship with Recipe model (one-to-many).
     */

    protected $fillable = [
        'name', // Add other attributes as needed

    ];
    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }
}
