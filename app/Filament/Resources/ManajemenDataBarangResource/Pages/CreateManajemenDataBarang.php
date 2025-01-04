<?php

namespace App\Filament\Resources\ManajemenDataBarangResource\Pages;

use App\Filament\Resources\ManajemenDataBarangResource;
use App\Models\User;
use App\Notifications\DataBarangAddedNotification;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateManajemenDataBarang extends CreateRecord
{
    protected static string $resource = ManajemenDataBarangResource::class;

    public function getRedirectUrl(): string
    {
        $recipient = Auth::user();
        Notification::make()
            ->title('Data Barang Berhasil Ditambahkan')
            ->body('Data baru berhasil ditambahkan oleh ' . $recipient->name)
            ->sendToDatabase($recipient);

        return $this->getResource()::getUrl('index');
    }
}
