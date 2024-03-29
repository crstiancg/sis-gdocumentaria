<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\Card;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Hash;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms\Components\Select;

class UserResource extends Resource
{
    protected static ?string $model = User::class;


    protected static ?string $modelLabel = 'usuario';

    protected static ?string $pluralModelLabel = 'Usuarios';

    protected static ?string $navigationLabel = 'Usuarios';

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Gestión de usuarios';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Nombre')
                        ->placeholder('Ingrese el nombre completo')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('email')
                        ->email()
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Select::make('derivar_documento_id')
                        ->relationship('DerivarDocumento', 'nombre')
                        ->default(3)
                        ->required(),
                    Forms\Components\TextInput::make('password')
                        ->label('Contraseña')
                        ->placeholder('Debe contener al menos 8 dígitos')
                        ->password()
                        ->required(fn(Page $livewire) => ($livewire instanceof CreateRecord))
                        ->minLength(8)
                        ->maxLength(255)
                        ->same('passwordConfirmation')
                        ->dehydrated(fn($state) => filled($state))
                        ->dehydrateStateUsing(fn($state) => Hash::make($state)),
                    Forms\Components\TextInput::make('passwordConfirmation')
                        ->password()
                        ->label('Confirmar contraseña')
                        ->required(fn(Page $livewire) => ($livewire instanceof CreateRecord))
                        ->minLength(8)
                        ->dehydrated(false),
                    Select::make('roles')
                        ->label('Roles')
                        ->multiple()
                        ->relationship('roles', 'name')->preload(),
                    Select::make('permissions')
                        ->label('Permisos')
                        ->multiple()
                        ->relationship('permissions', 'name')->preload()
                ])->columns(2)

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable()->label('Nombre'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('derivar_documento.nombre')->searchable(),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
