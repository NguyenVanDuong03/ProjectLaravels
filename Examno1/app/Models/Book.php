<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'bookid'; // thay đổi tên biến để truy vấn, mặc định nó để id đó :))
}
