<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['category_name'];

    public function incoming_documents(): HasMany
    {
        return $this->hasMany(IncomingDocument::class);
    }

    public function outgoing_documents(): HasMany
    {
        return $this->hasMany(OutgoingDocument::class);
    }
}
