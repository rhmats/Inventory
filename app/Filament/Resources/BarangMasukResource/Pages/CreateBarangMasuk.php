<?php

namespace App\Filament\Resources\BarangMasukResource\Pages;

use App\Filament\Resources\BarangMasukResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateBarangMasuk extends CreateRecord
{
    protected static string $resource = BarangMasukResource::class;

    public function getRedirectUrl(): string
    {
        $recipient = Auth::user();
        Notification::make()
            ->title('Data Barang baru Berhasil Ditambahkan')
            ->body('Data berhasil diperbarui oleh ' . $recipient->name)
            ->sendToDatabase($recipient);
        return $this->getResource()::getUrl('index');
    }
}
