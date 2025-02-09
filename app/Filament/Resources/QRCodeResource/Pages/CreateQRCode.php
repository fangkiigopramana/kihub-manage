<?php

namespace App\Filament\Resources\QRCodeResource\Pages;

use Filament\Actions;
use Illuminate\Support\Str;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Label\Font\OpenSans;
use Illuminate\Support\Facades\Storage;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Label\LabelAlignment;
use App\Filament\Resources\QRCodeResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Enums\Alignment;
use Filament\Support\Facades\FilamentView;

class CreateQRCode extends CreateRecord
{
    protected static string $resource = QRCodeResource::class;
    protected static bool $canCreateAnother = false;


    protected function getRedirectUrl(): string
    {
        $resource = static::getResource();

        return $resource::getUrl('index');
    }

    /**
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $result = Builder::create()
            ->writer(new PngWriter())
            ->data($data['data'])
            ->encoding(new Encoding('UTF-8'))
            ->size(300)
            ->margin(10)
            ->labelText($data['label_text'] ?? '')
            ->labelAlignment(match ($data['label_alignment']) {
                'Right' => LabelAlignment::Right,
                'Center' => LabelAlignment::Center,
                default => LabelAlignment::Left, // or any default alignment
            })
            ->build();

        // Simpan gambar QR Code ke storage
        $filename = 'qrcodes/' . Str::random(10) . '.png'; // Nama file unik
        Storage::disk('public')->put($filename, $result->getString());

        // Simpan path gambar ke model
        $data['image_path'] = $filename;
        return $data;
    }


    public function create(bool $another = false): void
    {
        $this->authorizeAccess();

        try {
            $this->callHook('beforeValidate');

            $data = $this->form->getState();

            $this->callHook('afterValidate');

            $data = $this->mutateFormDataBeforeCreate($data);

            $this->callHook('beforeCreate');

            $this->record = $this->handleRecordCreation($data);

            $this->form->model($this->getRecord())->saveRelationships();

            $this->callHook('afterCreate');
        } catch (Halt $exception) {
            return;
        }

        $this->rememberData();

        $this->getCreatedNotification()?->send();

        $redirectUrl = $this->getRedirectUrl();

        $this->redirect($redirectUrl, navigate: FilamentView::hasSpaMode() && is_app_url($redirectUrl));
    }
}
