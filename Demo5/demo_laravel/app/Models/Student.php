<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'student';

    /**
     * Whether or not to enable timestamps.
     *
     * @var bool
     */
    public $timestamps = false;

    // Student class bên được sở hữu bởi class
    public function studentClass() : BelongsTo {
        return $this->belongsTo(StudentClass::class, 'class_id', 'id');
        // belongsTo (fk bên sử dụng, key gốc)
    }

    public function clubs() : BelongsToMany {
        return $this->belongsToMany(Club::class, 'student_clubs');
    }

    use HasFactory;
}
