<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $guarded=[]; //// jika memakai guarded semua data bisa kita msukkan ke dalam database, tanpa kita batasi.jika memakai fillable itu harus membuat satu2 bgian variable nya
    
}
