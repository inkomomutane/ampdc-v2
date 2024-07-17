<?php

namespace App\Models;

use App\Data\WebsiteMessageData;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\WithData;

class WebsiteMessage extends Model
{
    use WithData;
    use HasFactory;
    use hasUlids;

    protected string $dataClass = WebsiteMessageData::class;

    protected $fillable = [
        'name',
        'message',
        'email',
        'contact',
        'date',
    ];

    protected  function casts():array
    {
        return [
            'date' => 'datetime',
            'is_read' => 'boolean',
        ];
    }
}
