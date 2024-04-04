<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Storage extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['storage_name'];

    public function incoming_documents(): HasMany
    {
        return $this->hasMany(IncomingDocument::class);
    }
}
