<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{

    public $title, $excerpt, $date, $body, $slug;

    public function __construct($title, $excerpt, $date, $body, $slug) {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;

    }

    public static function all() {
        return cache()->rememberForever('posts.all', function () {
            return collect(File::files(resource_path("posts")))
            ->map(fn($file) => YamlFrontMatter::parseFile($file))
            ->map(fn($document) => new Post(
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->body(),
                    $document->slug,
            ))->sortBy('date');
        });
        
    }

    public static function find($slug) {

        return static::all()->firstWhere('slug', $slug);
    }

    public static function findOrFail($slug) {
        $post = static::find($slug);
        
        if(! $post) {
            throw new ModelNotFoundException;
        }

        return $post;
    }
}