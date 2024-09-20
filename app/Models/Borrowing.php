<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    use HasFactory;

    protected $table = 'borrowings';


    protected $fillable = [
        'id_book',
        'id_borrower',
        'id_admin',
        'end_date',
        'start_date',
    ];
}
