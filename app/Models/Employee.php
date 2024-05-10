<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static find($id)
 * @method static create(mixed $userData)
 */
class Employee extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $fillable = ['first_name', 'last_name', 'age','email', 'position', 'address', 'workData'];
}
