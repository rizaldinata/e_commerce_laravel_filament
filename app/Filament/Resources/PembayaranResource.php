<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Pembayaran;
use Filament\Tables\Table;
use App\Models\PembayaranModel;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DateTimePicker;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PembayaranResource\Pages;
use App\Filament\Resources\PembayaranResource\RelationManagers;

class PembayaranResource extends Resource
{
    protected static ?string $model = PembayaranModel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('id_pengguna')
                    ->label('Nama Pengguna')
                    ->relationship('users', 'name') // otomatis ambil dari relasi
                    ->searchable()
                    ->required(),

                DateTimePicker::make('tanggal_pembayaran')
                    ->label('Tanggal Pembayaran')
                    ->default(now())
                    ->required(),

                TextInput::make('total_harga')
                    ->label('Total Harga')
                    ->numeric()
                    ->required(),

                Select::make('status_pembayaran')
                    ->label('Status')
                    ->options([
                        'menunggu' => 'Menunggu',
                        'diverifikasi' => 'Diverifikasi',
                        'ditolak' => 'Ditolak',
                    ])
                    ->default('menunggu')
                    ->required(),
                ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('pengguna.name')
                    ->label('Nama Pengguna')
                    ->searchable(),

                TextColumn::make('tanggal_pembayaran')
                    ->label('Tanggal Pembayaran'),

                TextColumn::make('total_harga')
                    ->label('Total Harga'),

                TextColumn::make('status_pembayaran')
                    ->label('Status Pembayaran'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make('detail')
                    ->label('Detail Pembayaran')
                    ->modalHeading('DetailPembayaran')
                    ->modalContent(fn (PembayaranModel $record) => view('filament.pembayaran.detail', [
                        'pembayaran' => PembayaranModel::with('detailPembayaran.produk')->find($record->id),
                    ]))
                    
                    ->modalWidth('4xl')
                    ->icon('heroicon-o-eye'),
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
            'index' => Pages\ListPembayarans::route('/'),
            'create' => Pages\CreatePembayaran::route('/create'),
            'edit' => Pages\EditPembayaran::route('/{record}/edit'),
        ];
    }
}