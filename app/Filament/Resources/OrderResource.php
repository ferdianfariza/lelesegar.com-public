<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;

use Filament\Tables\Columns\TextColumn;



class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $activeNavigationIcon = 'heroicon-s-clipboard-document-list';
    protected static ?string $navigationGroup = 'General';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('customer_id')
                ->label('Customer')
                ->relationship('customer', 'name')
                ->searchable()
                ->required(),

            TextInput::make('quantity_kg')
                ->label('Jumlah (kg)')
                ->numeric()
                ->required(),

            TextInput::make('fish_per_kg')
                ->label('Ekor per kg')
                ->numeric()
                ->nullable(),

            Textarea::make('notes')
                ->label('Catatan')
                ->rows(3)
                ->nullable(),

            DatePicker::make('order_date')
                ->label('Tanggal Pesan')
                ->default(now())
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('kode_unik')
                ->label('Kode Unik')
                ->searchable(),

            TextColumn::make('customer.name')
                ->label('Nama Customer')
                ->searchable(),

            TextColumn::make('quantity_kg')
                ->label('Jumlah (kg)')
                ->sortable(),

            TextColumn::make('fish_per_kg')
                ->label('Ekor per kg'),

            TextColumn::make('notes')
                ->label('Catatan'),

            TextColumn::make('order_date')
                ->label('Tanggal Pesan')
                ->date(),

            TextColumn::make('created_at')
                ->label('Dibuat')
                ->since(),
        ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->headerActions([
                Tables\Actions\Action::make('export_excel')
                    ->label('Export Excel')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->action(function () {
                        return \Maatwebsite\Excel\Facades\Excel::download(
                            new \App\Exports\OrdersExport,
                            'pesanan_lele.xlsx'
                        );
                    }),
            ]);;
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
