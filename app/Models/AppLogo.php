<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class AppLogo extends Model
{
    protected $fillable = [
        'logo',
    ];

    // logic penyimpanan gambar untuk menghapus logo sebelumnya yang sudah ada jika berbeda
    protected static function booted(): void
    {
        static::updating(function ($logo) {
            $originalLogo = $logo->getOriginal('logo');

            if ($originalLogo && $logo->isDirty('logo') && Storage::disk('public')->exists($originalLogo)) {
                Storage::disk('public')->delete($originalLogo);
            }
        });
    }
}
