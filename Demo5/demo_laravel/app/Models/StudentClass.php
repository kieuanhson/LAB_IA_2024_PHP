<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'class';

     /**
     * Whether or not to enable timestamps.
     *
     * @var bool
     */
    public $timestamps = false;

    // class chứa nhiều student
    public function students() : HasMany {
        return $this->hasMany(Student::class);
    }

    use HasFactory;
}
