<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestModel extends Model
{
    use HasFactory;

    protected $table = 'test'; // название отличное от класса (не test_model)
    protected $connection = 'mysql'; // в какой базе искать таблицу
    protected $primaryKey = 'test_id'; // колонка первичного ключа
    public $incrementing = true; // инкремент
    public $timestamps = true;
    protected $attributes = ['test_attribute1', 'test_attribute2']; // колонки
}
