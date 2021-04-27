<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'k3_awal' , 'k3_akhir', 'phone_number',  'status'];
    
    protected $appends = ['status_label'];

    public function getStatusLabelAttribute()
    {
        if ($this->status == 0) {

            return '<span class="text-red-500"> Free </span>';
        }

        return '<span class="text-yellow-600"> Premium </span>';
    }
}