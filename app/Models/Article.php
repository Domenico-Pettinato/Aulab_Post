<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

class Article extends Model
{
    use HasFactory, Searchable;
    
   public function toSearchableArray()
{
    return [
        'id' => $this->id,
        'title' => $this->title,
        'category' => $this->category,
        'body' => $this->body,
    ];
}
    protected $fillable = [
        'title',
        'body',
        'image',
        'user_id',
        'category_id',
        'is_accepted'
    ];

    // relazioni
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }


}
