<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = "categories";
    public function product()
    {
       return $this->hasMany(product::class,'category_id','id');
    }

    public function classify()
    {
        return $this->belongsTo(Classify::class,'class_id','id');
    }

    public function blogs()
    {
        return $this->belongsTo(Blog::class,'categories_id','id');
    }
}
