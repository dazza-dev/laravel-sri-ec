<?php

namespace DazzaDev\LaravelSriEc\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SriDocument extends Model
{
    use SoftDeletes;

    protected $casts = [
        'success' => 'boolean',
        'messages' => 'array',
    ];

    protected $fillable = [
        'document_type',
        'document_number',
        'success',
        'status',
        'messages',
        'access_key',
        'xml_base64',
        'documentable_id',
        'documentable_type',
    ];

    public function documentable(): MorphTo
    {
        return $this->morphTo();
    }
}
