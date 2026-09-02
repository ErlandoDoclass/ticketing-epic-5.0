<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Ticket extends Model
{
    use HasFactory;

    // Gunakan guarded untuk mencegah mass assignment pada kolom tertentu
    protected $guarded = ['id']; // atau ['id', 'ticket_code'] jika perlu

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

    // Relasi ke model Order
    public function order()
    {
        return $this->belongsTo(Customer::class, 'final_price', 'id');
    }

    public function order() {
        return $this->belongsTo(Order::class);
    }
    

    // Generate ticket_code saat membuat tiket baru
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($ticket) {
            $ticket->ticket_code = strtoupper(Str::random(8)); 
        });
    }

    // Agar bisa mencari tiket berdasarkan ticket_code, bukan id
    public function getRouteKeyName()
    {
        return 'ticket_code';
    }
}
