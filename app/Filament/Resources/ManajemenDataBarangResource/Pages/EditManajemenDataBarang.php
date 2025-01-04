<?php

namespace App\Filament\Resources\ManajemenDataBarangResource\Pages;

use App\Filament\Resources\ManajemenDataBarangResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditManajemenDataBarang extends EditRecord
{
    protected static string $resource = ManajemenDataBarangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
