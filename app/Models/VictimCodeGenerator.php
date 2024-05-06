<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\WithData;

class VictimCodeGenerator extends Model
{
   use HasUlids;
    use WithData;

   protected $fillable = [
      'code',
      'index'
   ];

   protected $casts = [
      'index' => 'integer'
   ];
}
