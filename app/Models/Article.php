<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Article extends Model
{
    protected $fillable = [
        'name',
        'image',
    ];

    public function contents(): HasMany
    {
        return $this->hasMany(ArticleContent::class);
    }

    // logic penyimpanan gambar untuk menghapus gambar sebelumnya yang sudah ada jika berbeda
    protected static function booted(): void
    {
        static::updating(function ($image) {
            $originalImage = $image->getOriginal('image');

            if ($originalImage && $image->isDirty('image') && Storage::disk('public')->exists($originalImage)) {
                Storage::disk('public')->delete($originalImage);
            }
        });
    }
}
