<?php

namespace App\Filament\Resources\ShortUrlResource\Pages;

use App\Filament\Resources\ShortUrlResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use AshAllenDesign\ShortURL\Classes\Builder;
use Carbon\Carbon;
use Filament\Support\Facades\FilamentView;

class CreateShortUrl extends CreateRecord
{
    protected static string $resource = ShortUrlResource::class;
    protected static bool $canCreateAnother = false;


    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['default_short_url'] = $data['url_key'];
        return $data;
    }


    public function create(bool $another = false): void
    {
        $this->authorizeAccess();

        try {
            $this->callHook('beforeValidate');

            $data = $this->form->getState();

            $this->callHook('afterValidate');

            // Mutasi data sebelum menyimpan ke model
            $data = $this->mutateFormDataBeforeCreate($data);

            $this->callHook('beforeCreate');

            // Simpan langsung ke database menggunakan model
            $this->record = app(Builder::class)
                ->destinationUrl($data['destination_url'])
                ->urlKey($data['url_key'])
                ->make();

            $this->form->model($this->getRecord())->saveRelationships();

            $this->callHook('afterCreate');
        } catch (Halt $exception) {
            return;
        }

        $this->rememberData();

        $this->getCreatedNotification()?->send();

        if ($another) {
            // Ensure that the form record is anonymized so that relationships aren't loaded.
            $this->form->model($this->getRecord()::class);
            $this->record = null;

            $this->fillForm();

            return;
        }

        $redirectUrl = $this->getRedirectUrl();

        $this->redirect($redirectUrl, navigate: FilamentView::hasSpaMode() && is_app_url($redirectUrl));
    }

    protected function getRedirectUrl(): string
    {
        $resource = static::getResource();

        return $resource::getUrl('index');
    }
}
