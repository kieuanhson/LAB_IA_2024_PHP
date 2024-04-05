<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Club extends Model
{
    protected $table = 'clubs';

    public $timestamps = false;

    public function students() : BelongsToMany {
        return $this->belongsToMany(Student::class, 'student_clubs');
    }
    use HasFactory;
}
