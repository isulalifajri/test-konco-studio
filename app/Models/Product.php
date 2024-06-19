<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getProductsUrlAttribute() {
        $imagePath = 'backend/assets/images/products/' . $this->image;
        
        if ($this->image && File::exists(public_path($imagePath))) {
            return asset($imagePath);
        }
        
        return asset('no-image.jpg');
    }
}
