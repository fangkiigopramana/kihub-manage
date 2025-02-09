<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QRCodeResource\Pages;
use App\Filament\Resources\QRCodeResource\RelationManagers;
use App\Models\QRCode;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class QRCodeResource extends Resource
{
    protected static ?string $model = QRCode::class;

    protected static ?string $navigationIcon = 'heroicon-o-qr-code';
    protected static ?string $navigationLabel = 'QR Code';
    protected static ?string $navigationGroup = 'Features';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('data')
                    ->label("Text or Link")
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('label_text')
                    ->label("Text Label (Optional)")
                    ->nullable()
                    ->maxLength(255)
                    ->columnSpanFull()
                    ->reactive()
                    ->afterStateUpdated(fn ($state, callable $set) => $set('label_alignment', $state ? 'Kiri' : null)),
                Forms\Components\Select::make('label_alignment')
                    ->label("Label Alignment (Optional)")
                    ->options([
                        'Left' => 'Left',
                        'Center' => 'Center',
                        'Right' => 'Right',
                    ])
                    ->columnSpanFull()
                    ->disabled(fn ($get) => empty($get('label_text'))),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('data')
                    ->label('Texts/Links')
                    ->wrap(false)
                    ->searchable(),
                Tables\Columns\TextColumn::make('label_text')
                    ->searchable()
                    ->default('-'),
                ImageColumn::make('image_path')
                    ->height('150px'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make('download')
                    ->icon('heroicon-o-arrow-down-on-square')
                    ->label('Download')
                    ->action(fn($record) => Storage::disk('public')->download($record->image_path))
                    ->visible(fn($record) => !empty($record->image_path)),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListQRCodes::route('/'),
            'create' => Pages\CreateQRCode::route('/create'),
        ];
    }
}
