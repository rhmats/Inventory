<?php

namespace App\Filament\Resources\ManajemenDataBarangResource\Pages;

use App\Filament\Resources\ManajemenDataBarangResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewManajemenDataBarang extends ViewRecord
{
    protected static string $resource = ManajemenDataBarangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
        ];
    }
}
