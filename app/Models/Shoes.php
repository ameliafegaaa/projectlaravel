<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shoes extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasFactory;
    protected $table = 'shoes';
    
    protected $primaryKey = 'shoes_id';

    protected $fillable = [
        'shoes_name',
        'shoes_brand',
        'shoes_price',
        'shoes_image',
        'shoes_description',
    ];

}
