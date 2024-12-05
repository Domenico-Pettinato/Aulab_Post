<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; // Importa Str per generare lo slug

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'image',
        'user_id',
        'category_id',
        'is_accepted',
        'slug',
    ];

    protected static function boot()
    {
        parent::boot();
    
        static::creating(function ($article) {
            if (empty($article->slug)) {
                $article->slug = static::generateUniqueSlug($article->title);
            }
        });
    
        static::updating(function ($article) {
            if ($article->isDirty('title')) {
                $article->slug = static::generateUniqueSlug($article->title, $article->id);
            }
        });
    }
    
    /**
     * Genera uno slug univoco basato sul titolo.
     *
     * @param string $title
     * @param int|null $articleId
     * @return string
     */
    protected static function generateUniqueSlug($title, $articleId = null)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
    
        $counter = 1;
        while (static::where('slug', $slug)->when($articleId, function ($query) use ($articleId) {
            return $query->where('id', '!=', $articleId);
        })->exists()) {
            $slug = "{$originalSlug}-{$counter}";
            $counter++;
        }
    
        return $slug;
    }
    

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
