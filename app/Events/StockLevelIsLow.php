<?php

namespace App\Events;

use App\Models\Stock;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast; // <-- PENTING!
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class StockLevelIsLow implements ShouldBroadcast // <-- Implementasikan ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Properti publik ini akan otomatis di-serialize
     * dan dikirim ke frontend.
     */
    public Stock $stock;

    /**
     * Create a new event instance.
     */
    public function __construct(Stock $stock)
    {
        $stock->load('ingredient');
        $this->stock = $stock;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        // Kirim event ini ke channel privat milik franchise yang bersangkutan.
        // Ini memastikan hanya manajer stok dari franchise yang tepat yang menerima notifikasi.
        return [
            new PrivateChannel('franchise.' . $this->stock->franchise_id),
        ];
    }
}