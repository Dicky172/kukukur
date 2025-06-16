<?php

namespace App\Events;

use App\Models\Order;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewOrderCreated implements ShouldBroadcast // Pastikan implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Order $order;

    /**
     * Create a new event instance.
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Nama event yang akan disiarkan.
     */
    public function broadcastAs(): string
    {
        return 'new-order';
    }

    /**
     * Data yang akan dikirim bersama event.
     */
    public function broadcastWith(): array
    {
        // Kita ambil nama cabang dari relasi Order -> Franchise
        return [
            'franchise_name' => $this->order->franchise->name,
        ];
    }

    /**
     * Channel private untuk admin.
     */
    public function broadcastOn(): array
    {
        return [
            // Hanya admin yang bisa mendengarkan channel ini
            new PrivateChannel('notifications.admin'),
        ];
    }
}