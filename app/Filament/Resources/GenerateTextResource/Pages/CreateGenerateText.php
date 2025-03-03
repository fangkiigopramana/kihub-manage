<?php

namespace App\Filament\Resources\GenerateTextResource\Pages;

use App\Filament\Resources\GenerateTextResource;
use ArdaGnsrn\Ollama\Ollama;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Http;

class CreateGenerateText extends CreateRecord
{
    protected static string $resource = GenerateTextResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $client = Ollama::client();
        $completions = $client->completions()->create([
            'model' => 'llama3.2',
            'prompt' => $data['question'],
        ]);
        $data['output'] = $completions->response;
        return $data;
    }
}
