<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TaskResource\Pages;
use App\Filament\Resources\TaskResource\RelationManagers;
use App\Models\Task;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TaskResource extends Resource
{
    protected static ?string $model = Task::class;

    protected static ?string $label = 'Tâche';
    protected static ?string $navigationIcon = 'heroicon-o-list-bullet';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('dueDate')
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Grid::make()
                    ->columns(3)
                    ->schema([
                        Forms\Components\Select::make('group_id')
                            ->required()
                            ->relationship('group','name',fn(Builder $query) => $query->whereIn('groups.id',auth()->user()->groups()->pluck('groups.id'))),

                        Forms\Components\Select::make('subject_id')
                            ->required()
                            ->relationship('subject','name'),
                        Forms\Components\Toggle::make('return'),

                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('dueDate')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('subject.name')
                    ->alignCenter()
                    ->searchable(),
                Tables\Columns\TextColumn::make('group.name')
                    ->alignCenter()
                    ->searchable(),
                Tables\Columns\IconColumn::make('return')
                    ->alignCenter()
                    ->boolean(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Author'),
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
                Tables\Filters\SelectFilter::make('group_id')
                    ->label('Group')
                    ->relationship('group','name'),
                Tables\Filters\SelectFilter::make('subject_id')
                    ->label('Subject')
                    ->relationship('subject','name'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->label(''),
                Tables\Actions\EditAction::make()
                    ->label(''),
                Tables\Actions\DeleteAction::make()
                    ->label(''),
            ])
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
            'index' => Pages\ListTasks::route('/'),
            'create' => Pages\CreateTask::route('/create'),
            'view' => Pages\ViewTask::route('/{record}'),
            'edit' => Pages\EditTask::route('/{record}/edit'),
        ];
    }
}
