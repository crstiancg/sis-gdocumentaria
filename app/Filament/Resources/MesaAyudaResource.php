<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\MesaAyuda;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BadgeColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\MesaAyudaResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\MesaAyudaResource\RelationManagers;

class MesaAyudaResource extends Resource
{
    protected static ?string $model = MesaAyuda::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Mesa de ayuda';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                    Forms\Components\TextInput::make('numero')
                        ->label('Número')
                        ->required(),
                     Forms\Components\TextInput::make('asunto')
                        ->required()
                        ->maxLength(255),
                     Forms\Components\FileUpload::make('archivo')
                        ->label('Seleccione archivo PDF')
                        ->acceptedFileTypes(['application/pdf'])
                        ->enableOpen()
                        ->enableDownload()
                        ->preserveFilenames()
                        ->required(),
                    Forms\Components\TextInput::make('folio')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\DateTimePicker::make('fingreso')
                        ->label('Fecha de Ingreso')
                        ->default(now())
                        ->required(),
                        
                    Select::make('estado')
                    ->options([
                                'Revisión' => 'En revisión',
                                'Aceptado' => 'Aceptado',
                                'No Aceptado' => 'No Aceptado',
                    ])->default('Revisión'),
                    Forms\Components\Select::make('remitente_id')
                        ->relationship('Remitente', 'nombre')
                        ->preload()
                        ->required(),

                    Forms\Components\Select::make('tipo_documento_id')
                        ->relationship('TipoDocumento', 'nombre')
                        ->preload()
                        ->required(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Remitente.nombre'),
                Tables\Columns\TextColumn::make('numero'),
                Tables\Columns\TextColumn::make('asunto'),
                BadgeColumn::make('estado')
                    ->enum([
                        'Revisión' => 'En revisión',
                        'Aceptado' => 'Aceptado',
                        'No Aceptado' => 'No Aceptado',
                    ])
                    ->colors([
                        'secondary' => 'Revisión',
                        'warning' => 'reviewing',
                        'success' => 'Aceptado',
                        'danger' => 'No Aceptado',
                    ]),
                Tables\Columns\TextColumn::make('TipoDocumento.nombre'),
                Tables\Columns\TextColumn::make('fingreso')
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
            'index' => Pages\ListMesaAyudas::route('/'),
            'create' => Pages\CreateMesaAyuda::route('/create'),
            'view' => Pages\ViewMesaAyuda::route('/{record}'),
            'edit' => Pages\EditMesaAyuda::route('/{record}/edit'),
        ];
    }    
}
