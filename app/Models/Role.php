<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name',
    ];

    // Relasi dengan tabel users
    public function user()
    {
        return $this->belongsTo(Users::class);
    }
}
