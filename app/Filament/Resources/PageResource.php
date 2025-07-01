<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Filament\Resources\PageResource\RelationManagers;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;

use Filament\Tables\Columns\TextColumn;


class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $activeNavigationIcon = 'heroicon-s-document-text';
    protected static ?string $navigationGroup = 'Content';



    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('slug')
                ->required()
                ->unique(ignoreRecord: true)
                ->helperText('Gunakan huruf kecil tanpa spasi. Misal: tentang, panduan'),

            TextInput::make('title')
                ->required(),

            RichEditor::make('content')
                ->label('Isi Halaman')
                ->required()
                ->columnSpanFull(),
        ]);
    }


    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('slug')->searchable()->sortable(),
            TextColumn::make('title')->searchable()->sortable(),
            TextColumn::make('updated_at')->label('Terakhir Diubah')->since(),
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
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
