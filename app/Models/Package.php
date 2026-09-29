<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Package extends Model
{
    protected $fillable = [
        'name','slug','speed','price','billing_period','short_description',
        'features','installation_fee','router_included','status','sort_order'
    ];

    protected $casts = [
        'features' => 'array',
        'router_included' => 'boolean',
        'status' => 'boolean',
        'price' => 'decimal:2',
        'installation_fee' => 'decimal:2',
    ];

    protected static function booted(): void
    {
        static::creating(function ($package) {
            $package->slug ??= Str::slug($package->name);
        });
        static::updating(function ($package) {
            if ($package->isDirty('name')) {
                $package->slug = Str::slug($package->name);
            }
        });
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
