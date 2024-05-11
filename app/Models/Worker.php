<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $first_name
 * @property string $last_name
 * @property string $department
 * @property int $id
 */
class Worker extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'department'];
}
