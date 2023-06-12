<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DocumentoResource\Pages;
use App\Filament\Resources\DocumentoResource\RelationManagers;
use App\Models\Documento;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DocumentoResource extends Resource
{
    protected static ?string $model = Documento::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Forms\Components\Select::make('oficina_id')
                            ->relationship('Oficina', 'nombre')
                            ->default(3)
                            ->required(),
                        Forms\Components\Select::make('tipo_documento_id')
                            ->label('Tipo de documento')
                            ->relationship('TipoDocumento', 'nombre')
                            ->preload()
                            ->required(),
                        Forms\Components\TextInput::make('numero')
                            ->label('Número de documento')
                            ->required(),
                        Forms\Components\TextInput::make('asunto')
                            ->label('Asunto/Sumilla')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('folio')
                            ->required()
                            ->maxLength(255),

                    ])->columnSpan(7),

                Card::make()
                    ->schema([
                        Forms\Components\FileUpload::make('archivo')
                            ->label('Seleccione archivo PDF')
                            ->acceptedFileTypes(['application/pdf'])
                            ->enableOpen()
                            ->enableDownload()
                            ->preserveFilenames()
                            ->required(),
                        Forms\Components\DateTimePicker::make('fingreso')
                            ->label('Fecha de ingreso')
                            ->default(now())
                            ->disabled()
                            ->required(),
                    ])->columnSpan(5)
            ])->columns(12);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Oficina.nombre'),
                Tables\Columns\TextColumn::make('TipoDocumento.nombre'),
                Tables\Columns\TextColumn::make('folio'),
                Tables\Columns\TextColumn::make('fingreso')
                    ->dateTime()
                    ->since(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListDocumentos::route('/'),
            'create' => Pages\CreateDocumento::route('/create'),
            'view' => Pages\ViewDocumento::route('/{record}'),
            'edit' => Pages\EditDocumento::route('/{record}/edit'),
        ];
    }
}
