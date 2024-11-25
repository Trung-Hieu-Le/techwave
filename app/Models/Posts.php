<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubPosts;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;

class Posts extends Model implements Viewable
{
    use HasFactory, InteractsWithViews;

    public function tintuc()
    {
        return $this->hasMany(SubPosts::class, 'post_id');
    }
}
