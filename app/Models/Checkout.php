<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Checkout extends Model
{
    use HasFactory, SoftDeletes;
    // protected $fillable = ['user_id', 'camp_id', 'card_number', 'expired', 'cvc', 'is_paid'];
    protected $fillable = ['user_id', 'camp_id', 'payment_status', 'midtrans_url', 'midtrans_booking_code', 'discount_id', 'discount_percentage', 'total'];
    // custom field expired saat parsing data di checkout
    // public function setExpiredAttribute($value)
    // {
    //     $this->attributes['expired'] = date('Y-m-t', strtotime($value));
    // }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function Camp()
    {
        return $this->belongsTo(Camp::class);
    }
    /**
     * Get the Discount that owns the Checkout
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Discount()
    {
        return $this->belongsTo(Discount::class);
    }
}
