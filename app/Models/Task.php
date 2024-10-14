<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
class Task extends Model{
    protected $table = "task";
    protected $primaryKey = "id_task";
    protected $fillable = ["nama_task"];
}
