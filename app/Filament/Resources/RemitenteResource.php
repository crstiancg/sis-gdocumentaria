<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Remitente;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\RemitenteResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\RemitenteResource\RelationManagers;

class RemitenteResource extends Resource
{
    protected static ?string $model = Remitente::class;

    protected static ?string $modelLabel = 'administrado';

    protected static ?string $pluralModelLabel = 'Administrados';

    protected static ?string $navigationLabel = 'Administrados';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                    Forms\Components\Select::make('tipo_persona_id')
                        ->label('Tipo de persona')
                        ->relationship('TipoPersona', 'nombre')
                        ->preload()
                        ->required(),
                    Forms\Components\TextInput::make('dni')
                        ->label('DNI')
                        ->required()
                        ->maxLength(8),
                    Forms\Components\TextInput::make('nombre')
                        ->label('Nombre(s)')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('paterno')
                        ->label('Apellido Paterno')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('materno')
                        ->label('Apellido Materno')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('correo')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('celular')
                        ->maxLength(9)
                        ->required(),
                    Forms\Components\TextInput::make('razonsocial')
                        ->maxLength(9)
                        ->required(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('TipoPersona.nombre'),
                Tables\Columns\TextColumn::make('dni'),
                Tables\Columns\TextColumn::make('nombre'),
                Tables\Columns\TextColumn::make('paterno'),
                Tables\Columns\TextColumn::make('materno'),
                Tables\Columns\TextColumn::make('created_at')
                    ->since()->label('Registrado'),
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
            'index' => Pages\ListRemitentes::route('/'),
            'create' => Pages\CreateRemitente::route('/create'),
            'view' => Pages\ViewRemitente::route('/{record}'),
            'edit' => Pages\EditRemitente::route('/{record}/edit'),
        ];
    }    
}
