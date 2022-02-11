<?php

namespace App\Models;

use App\Exceptions\BookingBusyException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $from
 * @property string $to
 */
class Booking extends Model
{
    use HasFactory;

    protected $with = [
        'customer',
    ];

    protected $fillable = [
        'from',
        'to',
        'customer_id',
    ];

    protected $casts = [
        'from' => 'datetime:Y-m-d H:i:s',
        'to' => 'datetime:Y-m-d H:i:s',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    protected $hidden = [
        'customer_id',
    ];

    protected static function boot()
    {
        parent::boot();
        self::saving(function (Booking $booking) {
            $busy = Booking::query()
                ->whereBetween('from', [$booking->from, $booking->to])
                ->orWhereBetween('to', [$booking->from, $booking->to])
                ->exists();
            if ($busy === true) {
                throw new BookingBusyException();
            }
            return !$busy;
        });
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
