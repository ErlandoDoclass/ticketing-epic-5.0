<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    // Gunakan guarded untuk mencegah mass assignment pada kolom tertentu
    protected $guarded = ['id'];

    // Relasi ke model Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer', 'id');
    }

    // Relasi ke model Event
    public function event()
    {
        return $this->belongsTo(Event::class, 'id_event', 'id');
    }
}
