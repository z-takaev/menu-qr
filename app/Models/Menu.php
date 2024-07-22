<?php

namespace App\Models;

use App\Support\QrCode;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{
    protected $fillable = [
        'name', 'slug',
        'preview', 'active',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function qrCode(): string
    {
        $url = route('menu.show', $this->slug);

        return (new QrCode($url))
            ->size(400)
            ->svg();
    }

    public function items(): HasMany
    {
        return $this->hasMany(MenuItem::class);
    }
}
