<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    //CAMPOS QUE QUEREMOS QUE SEAN INSERTABLES/QUE VAMOS A MANEJAR
    protected $fillable = ['title','slug','description', 'content','image','posted', 'category_id'];

    public function category()
    {
       return $this->belongsTo(Category::class);
    }
}
