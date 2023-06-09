<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TipoPersonaResource\Pages;
use App\Filament\Resources\TipoPersonaResource\RelationManagers;
use App\Models\TipoPersona;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TipoPersonaResource extends Resource
{
    protected static ?string $model = TipoPersona::class;

    
    protected static ?string $modelLabel = 'tipo de persona';

    protected static ?string $pluralModelLabel = 'Tipo de Personas';

    protected static ?string $navigationLabel = 'Tipo de Personas';

    protected static ?string $navigationGroup = 'Contenido';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageTipoPersonas::route('/'),
        ];
    }    
}
