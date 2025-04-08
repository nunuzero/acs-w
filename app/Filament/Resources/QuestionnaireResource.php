<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuestionnaireResource\Pages;
use App\Filament\Resources\QuestionnaireResource\RelationManagers;
use App\Models\Questionnaire;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class QuestionnaireResource extends Resource
{
    protected static ?string $model = Questionnaire::class;

    protected static ?string $modelLabel = 'Kuesioner';

    protected static ?string $pluralModelLabel = 'Kuesioner';

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama')
                    ->required()
                    ->maxLength(255),
                Fieldset::make('requirements')
                    ->label('Persyaratan')
                    ->schema([
                        Placeholder::make('Petunjuk:')
                            ->content('Persyaratan merujuk pada jumlah minimal kuisoner yang tercentang untuk dinyatakan risikonya')
                            ->columnSpanFull(),
                        Group::make([
                            Forms\Components\TextInput::make('light_risk_requirement')
                                ->label('Ringan')
                                ->required()
                                ->numeric(),
                            Forms\Components\TextInput::make('medium_risk_requirement')
                                ->label('Sedang')
                                ->required()
                                ->numeric(),
                            Forms\Components\TextInput::make('heavy_risk_requirement')
                                ->label('Berat')
                                ->required()
                                ->numeric(),
                        ])->columns(3)
                    ]),
                Fieldset::make('response')
                    ->label('Respon Risiko')
                    ->schema([
                        Placeholder::make('Petunjuk:')
                            ->content('Respon merujuk pada hasil yang akan ditampilkan sesuai dengan persyaratan, dengan prioritas risiko Berat -> Sedang -> Ringan')
                            ->columnSpanFull(),
                        Group::make([
                            RichEditor::make('light_risk_response')
                                ->label('Ringan')
                                ->required(),
                            RichEditor::make('medium_risk_response')
                                ->label('Sedang')
                                ->required(),
                            RichEditor::make('heavy_risk_response')
                                ->label('Berat')
                                ->required(),
                            RichEditor::make('unqualified_risk_response')
                                ->label('Tidak Memenuhi Syarat')
                                ->required(),
                        ])->columns(2)->columnSpanFull()
                    ]),
                Repeater::make('contents')
                    ->relationship()
                    ->label('Kuisoner')
                    ->schema([
                        Textarea::make('questionnaire')
                            ->label('Kuisoner')
                            ->required(),
                        Select::make('category')
                            ->options([
                                'Ringan' => 'Ringan',
                                'Sedang' => 'Sedang',
                                'Berat' => 'Berat',
                            ])
                            ->required()
                            ->native(false),
                    ])->columns(2)->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contents_count')
                    ->label('Jumlah Kuesioner')
                    ->counts('contents'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diubah Pada')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListQuestionnaires::route('/'),
            'create' => Pages\CreateQuestionnaire::route('/create'),
            'edit' => Pages\EditQuestionnaire::route('/{record}/edit'),
        ];
    }
}
