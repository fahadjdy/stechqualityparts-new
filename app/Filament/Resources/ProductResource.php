<?php
namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?string $navigationGroup = 'Content Management';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('category_id')
                ->relationship('category', 'name')
                ->required()
                ->searchable()
                ->preload(),

            Forms\Components\TextInput::make('name')
                ->required()
                ->hint('The product name, Max 50 characters')
                ->maxLength(50)
                ->live(onBlur: true)
                ->afterStateUpdated(function (callable $set, $state) {
                    $clean = strip_tags($state);
                    $set('name', $clean);
                    $set('slug', Str::slug($clean));
                }),

            Forms\Components\TextInput::make('slug')
                ->required()
                ->readOnly()
                ->unique(ignoreRecord: true),

            Forms\Components\TextInput::make('code')
                ->label('Product Code')
                ->hint('Auto-generated from company initials, but you can override it.')
                ->maxLength(50)
                ->placeholder('Ex: MAC0001')
                ->default(function () {
                    $company = \App\Models\CompanyProfile::first();
                    $initials = 'PRD'; // Default prefix if no company name is set
                    
                    if ($company && !empty($company->name)) {
                        $words = explode(' ', $company->name);
                        $initials = '';
                        foreach ($words as $w) {
                            if (!empty($w)) {
                                $initials .= strtoupper($w[0]);
                            }
                        }
                    }

                    $lastProduct = \App\Models\Product::latest('id')->first();
                    $nextNumber = 1;
                    
                    if ($lastProduct && $lastProduct->code) {
                        // Extract numeric part from the end of the string
                        preg_match('/(\d+)$/', $lastProduct->code, $matches);
                        if (!empty($matches)) {
                            $nextNumber = intval($matches[1]) + 1;
                        }
                    }

                    return $initials . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
                })
                ->live(onBlur: true)
                ->afterStateUpdated(function (callable $set, $state) {
                    $clean = strip_tags($state);
                    $set('code', $clean);
                }),

            Forms\Components\RichEditor::make('description')
                ->label('Description')
                ->toolbarButtons([
                    'bold',
                    'italic',
                    'strike',
                    'link',
                    'orderedList',
                    'bulletList',
                    'blockquote',
                    'codeBlock',
                    'h2',
                    'h3',
                ])
                ->columnSpanFull()
                ->maxLength(5000),

            Forms\Components\TextInput::make('meta_title')
                ->maxLength(70)
                ->label('Meta Title'),

            Forms\Components\Textarea::make('meta_description')
                ->maxLength(160)
                ->label('Meta Description'),


            // Single image upload with optimization
            Forms\Components\FileUpload::make('image')
                ->label('Product Image')
                ->directory(function (callable $get) {
                    $categoryId = $get('category_id');
                    return $categoryId ? "products/{$categoryId}" : 'products';
                })
                ->image()
                ->disk('public')
                ->imageEditor()
                ->imageResizeMode('cover')
                ->imageResizeTargetWidth('1200')
                ->imageResizeTargetHeight('1200')
                ->maxSize(2048)
                ->helperText('Upload a single high-quality image. It will be auto-optimized.'),

        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('slug')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('code')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('category.name')->label('Category')->sortable(),
                Tables\Columns\ImageColumn::make('image') // single image column
                    ->label('Image')
                    ->disk('public')
                    ->rounded()
                    ->height(50)
                    ->width(50),
                Tables\Columns\TextColumn::make('created_at')->dateTime('d M Y'),
            ])
            ->defaultSort('id', 'desc')
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

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit'   => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
