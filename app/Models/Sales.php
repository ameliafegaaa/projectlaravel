<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasFactory;
    protected $table = 'sales';
    
    protected $primaryKey = 'sale_id';

    protected $fillable = [
        'user_id',
        'shoes_id',
        'postal_code',
        'address',
        'total',
        'payment_method',
    ];

}
