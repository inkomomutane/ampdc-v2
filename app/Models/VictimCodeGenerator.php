<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class VictimCodeGenerator extends Model
{
   use HasUlids;

   protected $fillable = [
      'code',
      'index'
   ];

   protected $casts = [
      'index' => 'integer'
   ];
}
