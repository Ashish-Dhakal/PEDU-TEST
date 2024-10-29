<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Level;
use App\Models\Chapter;
use App\Models\Subject;
use App\Models\Question;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\QuestionResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\QuestionResource\RelationManagers;

class QuestionResource extends Resource
{
    protected static ?string $model = Question::class;

    protected static ?string $navigationIcon = 'iconoir-font-question';

    protected static ?int $navigationSort = 4;

    protected static ?string $navigationGroup = 'Course';
    

    public static function form(Form $form): Form
    {

        return $form
            ->schema([
                Forms\Components\Textarea::make('question_text')
                    ->required()
                    ->columnSpanFull(),

                Forms\Components\Select::make('subject_id') // Use Select for subject_id
                    ->label('Subject')
                    ->options(Subject::all()->pluck('subject_name', 'id')) // Fetch subjects
                    ->required(),

                Forms\Components\Select::make('chapter_id') // Use Select for chapter_id
                    ->label('Chapter')
                    ->options(Chapter::all()->pluck('chapter_name', 'id')) // Fetch chapters
                    ->required(),

                Forms\Components\Select::make('level_id') // Use Select for level_id
                    ->label('Level')
                    ->options(Level::all()->pluck('level_name', 'id')) // Fetch levels
                    ->required(),

                Forms\Components\Repeater::make('options') // Repeater for options
                    ->label('Options')
                    ->relationship('options') // Define the relationship if you have it
                    ->schema([
                        Forms\Components\TextInput::make('option_text') // Field for option text
                            ->required()
                            ->label('Option Text'),
                    ])
                    ->itemLabel('Option'), // Set a static label for each item
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('question_text')
                    ->label('Question Text')
                    ->searchable(),

                Tables\Columns\TextColumn::make('subject.subject_name') // Access subject name
                    ->label('Subject Name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('chapter.chapter_name') // Access chapter name
                    ->label('Chapter Name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('level.level_name') // Access level name
                    ->label('Level Name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('options') // Display all options
                    ->label('Options')
                    ->formatStateUsing(fn($record) => $record->options->pluck('option_text')->implode(', ')), // Access options via the record
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListQuestions::route('/'),
            'create' => Pages\CreateQuestion::route('/create'),
            'edit' => Pages\EditQuestion::route('/{record}/edit'),
        ];
    }
}
