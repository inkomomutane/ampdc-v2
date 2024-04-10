<?php

namespace App\Models;

use App\Data\VictimData;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Victim extends Model
{
    use HasFactory;
    use HasUlids;
    //            $table->ulid('id')->primary();
    //            $table->string('name')->nullable();
    //            $table->unsignedInteger('age')->nullable();
    //            $table->date('date_of_birth')->nullable();
    //            $table->foreignUlid('neighborhood_id')->nullable()->constrained('neighborhoods');
    //            $table->foreignUlid('violence_type_id')->nullable()->constrained('violence_types');
    //            $table->text('violence_details')->nullable();
    //            $table->string('contact')->nullable();

    protected $fillable = [
        'name',
        'age',
        'date_of_birth',
        'neighborhood_id',
        'violence_type_id',
        'violence_details',
        'contact',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
    ];

    protected $with = ['neighborhood', 'violenceType'];

    protected string $dataClass = VictimData::class;


    public function neighborhood(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Neighborhood::class);
    }

    public function violenceType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ViolenceType::class);
    }

}
