<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(mixed $data)
 */
class Client extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'surname', 'email'];
}
