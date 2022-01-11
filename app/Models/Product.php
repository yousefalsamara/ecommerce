<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use Sluggable;
    use SoftDeletes;
    protected $table='products';
    protected $dates=['deleted_at'];
    protected $fillable=['cate_id','title','slug','small_description','description','original_price','selling_price','image','qty','tax','status','trending','meta_title','meta_keywords','meta_description'];
    public function Category(){
        return $this->belongsTo(Category::class,'cate_id','id');
    }
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


}
