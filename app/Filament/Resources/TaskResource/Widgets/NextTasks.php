<?php

namespace App\Filament\Resources\TaskResource\Widgets;

use App\Filament\Resources\TaskResource;
use App\Models\Task;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class NextTasks extends BaseWidget
{


    protected static ?string $heading='Prochaines tâches';

    protected int | string | array $columnSpan = 'full';
    public function table(Table $table): Table
    {
        return $table
            ->query(auth()->user()->nextTasks())
            ->columns([
                    Tables\Columns\TextColumn::make('title'),
                    Tables\Columns\TextColumn::make('group.name'),
                    Tables\Columns\TextColumn::make('subject.name'),
                    Tables\Columns\IconColumn::make('return')
                    ->boolean()
                ])
            ->defaultGroup(
                Tables\Grouping\Group::make('dueDate')
                    ->label('')
                    ->date()
                    ->collapsible()
            )
            ->actions([
                Tables\Actions\ViewAction::make()
                ->label(''),
            ])
            ->filters([]);
    }
}
