<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;

class Course extends Model implements Viewable
{
    use HasFactory, InteractsWithViews;
    public function creator()
    {
        return $this->belongsTo(User::class,'id_author');
    }
    public function editor()
    {
        return $this->belongsTo(User::class,'id_editor');
    }
    protected $fillable=[
        'id',
        'name',
        'img',
        'gia_goc',
        'gia_giam',
    ];
}
