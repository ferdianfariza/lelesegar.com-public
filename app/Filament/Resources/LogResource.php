<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LogResource\Pages;
use App\Filament\Resources\LogResource\RelationManagers;
use App\Models\Log;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Tables\Columns\TextColumn;

class LogResource extends Resource
{
    protected static ?string $model = Log::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox-stack';
    protected static ?string $activeNavigationIcon = 'heroicon-s-inbox-stack';
    protected static ?string $navigationGroup = 'Sistem';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('customer_name')->label('Nama Customer')->searchable(),
                TextColumn::make('customer_whatsapp')->label('WA'),
                TextColumn::make('quantity_kg')->label('Jumlah (kg)'),
                TextColumn::make('order_date')->date()->label('Tanggal'),
                TextColumn::make('created_at')->since()->label('Dicatat'),
            ])
            ->filters([])
            ->actions([])
            ->bulkActions([]);
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
            'index' => Pages\ListLogs::route('/'),
            // 'create' => Pages\CreateLog::route('/create'),
            // 'edit' => Pages\EditLog::route('/{record}/edit'),
        ];
    }
}
