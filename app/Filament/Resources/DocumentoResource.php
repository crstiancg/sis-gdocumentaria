<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Documento;
use App\Models\Remitente;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\DocumentoResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DocumentoResource\RelationManagers;
use RyanChandler\FilamentProgressColumn\ProgressColumn;
use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;

class DocumentoResource extends Resource
{
    protected static ?string $model = Documento::class;

    protected static ?string $modelLabel = 'documento';

    protected static ?string $pluralModelLabel = 'Documentos';

    protected static ?string $navigationLabel = 'Documentos';


    protected static ?string $navigationIcon = 'heroicon-o-folder-open';

    protected static ?string $recordTitleAttribute = 'remitente.full_name';

    protected static ?string $navigationGroup = 'Documentos';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Forms\Components\Select::make('oficina_id')
                            ->relationship('Oficina', 'nombre')
                            ->default(3),
                        Forms\Components\Select::make('remitente_id')
                            ->relationship('remitente', 'full_name')
                            ->searchable()
                            ->preload(true)
                            ->required(),
                        Forms\Components\Select::make('procedimiento_id')
                            ->relationship('procedimiento', 'nombre')
                            ->required(),
                        Forms\Components\Select::make('indicacion_id')
                            ->relationship('indicacion', 'nombre')
                            ->required(),
                        Forms\Components\Select::make('estado')
                            ->options([
                                'Pendiente' => 'Pendiente',
                                'Aceptado' => 'Aceptado',
                                'Finalizado' => 'Finalizado',
                            ])->default('Pendiente'),
                        Forms\Components\Select::make('tipo_documento_id')
                            ->label('Tipo de documento')
                            ->relationship('TipoDocumento', 'nombre')
                            ->preload()
                            ->required(),
                        Forms\Components\TextInput::make('numero')
                            ->label('Número de documento')
                            ->integer()
                            ->maxValue(100)
                            ->required(),
                        Forms\Components\TextInput::make('ntramite')
                            ->label('Número de tramite')
                            ->integer()
                            ->maxValue(100)
                            ->required(),
                        Forms\Components\TextInput::make('respuesta')
                            ->label('Respuesta')
                            ->required(),
                        Forms\Components\TextInput::make('asunto')
                            ->label('Asunto/Sumilla')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('folio')
                            ->required()
                            ->integer()
                            ->maxValue(100),
                        Forms\Components\DateTimePicker::make('fechadoc')
                            ->label('Fecha de documento')
                            ->required(),
                        Forms\Components\MarkdownEditor::make('observacion')
                            ->disableToolbarButtons([
                                'attachFiles',
                                'bold',
                                'bulletList',
                                'codeBlock',
                                'edit',
                                'italic',
                                'link',
                                'orderedList',
                                'preview',
                                'strike',
                            ]),


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
                        Forms\Components\Select::make('derivar_documento_id')
                            ->relationship('derivar_documento', 'nombre')
                            ->label('Derivar')
                            ->default(1),
                        Forms\Components\Select::make('user_id')
                            ->relationship('User', 'name')
                            ->label('Asignar al Usuario')
                            ->default(1),

                    ])->columnSpan(5)
            ])->columns(12);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('TipoDocumento.nombre')->searchable(),
                Tables\Columns\TextColumn::make('folio')->searchable(),
                //ProgressColumn::make('folio')
                //    ->color('warning'),
                Tables\Columns\BadgeColumn::make('estado')
                    ->enum([
                        'Pendiente' => 'Pendiente',
                        'Aceptado' => 'Aceptado',
                        'Finalizado' => 'Finalizado',
                    ])
                    ->colors([
                        'secondary' => 'Pendiente',
                        'warning' => 'reviewing',
                        'success' => 'Aceptado',
                        'danger' => 'Finalizado',
                    ]),
                // ProgressColumn::make('numero')->color('primary'),

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
                FilamentExportHeaderAction::make('Export'),

            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                FilamentExportBulkAction::make('export')

            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\RemitenteRelationManager::class,
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

    // public static function getGlobalSearchResultTitle(Model $record)
    // {
    //     return $record->remitente->full_name;
    // }
}
