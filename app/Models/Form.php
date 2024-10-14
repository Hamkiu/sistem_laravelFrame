<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
class Form extends Model{
    protected $table = "form";
    protected $primaryKey = "id_form";
    protected $fillable = ["nama_form", "isi_form", "gambar_form", "id_task"];

    public function task(){
        return $this->belongsTo(Task::class,'id_task');
    }
}
