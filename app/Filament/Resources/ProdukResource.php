<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Components\Placeholder;
use Filament\Tables;
use App\Models\Produk;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\ProdukModel;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProdukResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProdukResource\RelationManagers;
use Symfony\Contracts\Service\Attribute\Required;

class ProdukResource extends Resource
{
    protected static ?string $model = ProdukModel::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';
    protected static ?string $navigationLabel = 'Produk';
    protected static ?string $label = 'Kelola Produk';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_produk')
                    ->required()
                    ->label('Nama')
                    ->placeholder('Indomie Ayam Geprek'),
                TextInput::make('harga_produk')
                    ->required()
                    ->label('Harga')
                    ->placeholder('Rp 8000'),
                TextInput::make('stok_produk')
                    ->required()
                    ->label('Stok')
                    ->placeholder('12'),
                TextInput::make('deskripsi_produk')
                    ->required()
                    ->label('Deskripsi')
                    ->placeholder('Indomie Ayam Geprek 200gr'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_produk')
                    ->label('Nama')
                    ->searchable(),
                TextColumn::make('harga_produk')
                    ->label('Harga'),
                TextColumn::make('stok_produk')
                    ->label('Stok'),
                TextColumn::make('deskripsi_produk')
                    ->label('Deskripsi'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListProduks::route('/'),
            'create' => Pages\CreateProduk::route('/create'),
            'edit' => Pages\EditProduk::route('/{record}/edit'),
        ];
    }
}