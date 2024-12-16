<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasUuids;

    protected $fillable = [
        'name',
        'family',
        'path',
        'type'
    ];

    public function getPublicPathAttribute() {
        return route('api.v1.image', $this);
    }
}
