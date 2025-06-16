<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Stock;
use App\Events\NewOrderCreated;

class CreateOrder extends CreateRecord
{
    protected static string $resource = OrderResource::class;

    protected function afterCreate(): void
    {
        $record = $this->getRecord();

        foreach ($record->details as $detail) {
            $product = $detail->product;
            foreach ($product->ingredients as $ingredient) {
                $stock = Stock::where('franchise_id', $record->franchise_id)
                    ->where('ingredient_id', $ingredient->id)
                    ->first();

                if ($stock) {
                    $stock->decrement('quantity', $detail->quantity * $ingredient->pivot->quantity);
                }
            }
        }

        event(new NewOrderCreated($record));
    }
}