<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PesertaResource\Pages;
use App\Filament\Resources\PesertaResource\RelationManagers;
use App\Models\Peserta;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section;

class PesertaResource extends Resource
{
    protected static ?string $model = Peserta::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make('Data Pendidikan')
                    ->description('Sulahkan Pilih Kabupaten/Kota dan Jenjang Pendidikan dari Peserta')
                    ->schema([
                        Forms\Components\Select::make('kabkota_id')
                            ->label('Kabupaten/Kota')
                            ->relationship(name: 'kabkota', titleAttribute: 'nama_kabkota')

                            ->required(),
                        Forms\Components\Select::make('jenjang_id')
                            ->label('Jenjang Pendidikan')
                            ->relationship(name: 'jenjang', titleAttribute: 'nama_jenjang')
                            ->required(),
                    ])->columns(2),

                Section::make('Biodata Peserta')
                    ->description('Pastikan data isian diisi dengan benar')
                    ->schema([

                        Forms\Components\TextInput::make('npsn')
                            ->label('NPSN')
                            ->numeric()
                            ->default(null),
                        Forms\Components\TextInput::make('nama_sekolah')
                            ->label('Nama Sekolah')
                            ->maxLength(255)
                            ->default(null),
                        Forms\Components\TextInput::make('orang_tua')
                            ->label('Orang Tua')
                            ->maxLength(255)
                            ->default(null),
                        Forms\Components\TextInput::make('nama_peserta')
                            ->label('Nama Peserta')
                            ->maxLength(255)
                            ->default(null),
                        Forms\Components\TextInput::make('tempat_tanggal_lahir')
                            ->label('Tempat dan Tanggal Lahir')
                            ->maxLength(255)
                            ->default(null),
                    ])->columns(2),

                Section::make('Data Kelulusan')
                    ->description('Informasi data kelulusan Peserta')
                    ->schema([
                        Forms\Components\TextInput::make('tahun_lulus')
                            ->label('Tahun Lulus')
                            ->numeric()
                            ->default(null),
                        Forms\Components\TextInput::make('nomor_ujian')
                            ->label('Nomor Ujian')
                            ->maxLength(255)
                            ->default(null),
                        Forms\Components\TextInput::make('nomor_ijazah')
                            ->label('Nomor Ijazah')
                            ->maxLength(255)
                            ->default(null),
                        Forms\Components\TextInput::make('nisn')
                            ->label('NISN')
                            ->default(null),

                    ])->columns(2),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kabkota.nama_kabkota')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jenjang.nama_jenjang')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('npsn')
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama_sekolah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('orang_tua')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_peserta')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tempat_tanggal_lahir')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tahun_lulus')
                    ->sortable(),
                Tables\Columns\TextColumn::make('nomor_ujian')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nomor_ijazah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nisn')
                    ->sortable(),
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
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListPesertas::route('/'),
            'create' => Pages\CreatePeserta::route('/create'),
            'edit' => Pages\EditPeserta::route('/{record}/edit'),
        ];
    }
}
