<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Admin extends User
{
    use HasFactory, Notifiable;

    protected $guard = 'admin';

    protected $fillable = ['name', 'email', 'password', 'super_admin', 'image'];


    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return asset('assets/images/admin.jpg');
        }
        return asset('storage/' . $this->image);
    }
}
