<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $fillable = [
        'order_number',
        'customer_id',
        'book_id',
        'total_amount',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function book(){
        return $this->belongsTo(Book::class);
    }
}
