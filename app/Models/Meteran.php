<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meteran extends Model
{
    protected $fillable = [ 'id_user','k3_awals', 'k3_akhirs', 'tanggal'];
    
    use HasFactory;
}