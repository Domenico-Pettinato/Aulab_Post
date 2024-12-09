<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;

class Article extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'title',
        'body',
        'image',
        'user_id',
        'category_id',
        'is_accepted',
        'slug',
    ];

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'category' => $this->category,
        ];
    }

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
        return $this->belongsTo(User::class);
    }
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function readDuration()
    {
        $totalWords = Str::wordCount($this->body);
        $minutesToRead = round($totalWords / 60);
        return intval($minutesToRead);
    }
}
