<?php
namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Livewire\Attributes\On; // <-- 1. TAMBAHKAN USE STATEMENT INI

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    // 2. TAMBAHKAN METHOD BARU DI BAWAH INI
    #[On('refresh-orders')]
    public function refresh()
    {
        // Method ini tidak perlu melakukan apa-apa.
        // Atribut #[On] sudah cukup untuk memberitahu Livewire
        // agar me-render ulang seluruh komponen (termasuk tabel).
    }
}