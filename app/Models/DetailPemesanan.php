<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPemesanan extends Model
{
    use HasFactory;
    protected $table = 'detail_pemesanan';
    protected $fillable = ['id, pemesanan_id', 'menu_id', 'jumlah',];
   
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
    
    public function pemesanan() {
        return $this->belongsTo(Pemesanan::class, 'pemesanan_id');
    }
}
