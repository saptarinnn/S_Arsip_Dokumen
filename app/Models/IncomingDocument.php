<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IncomingDocument extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'document_code', 'date_in', 'category_id', 'storage_id', 'file', 'user_id',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function storage(): BelongsTo
    {
        return $this->belongsTo(Storage::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
