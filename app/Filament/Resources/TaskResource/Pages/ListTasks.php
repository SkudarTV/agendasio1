<?php

namespace App\Filament\Resources\TaskResource\Pages;

use App\Filament\Resources\TaskResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListTasks extends ListRecords
{
    protected static string $resource = TaskResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs()
    {
        return [
            'Prochaines'=>Tab::make('Prochaines')
                ->modifyQueryUsing(fn(Builder $query)=>$query->where('dueDate','>=',date('Y-m-d'))),
            'Passées'=>Tab::make('Passées')
                ->modifyQueryUsing(fn(Builder $query)=>$query->where('dueDate','<',date('Y-m-d')))
        ];
    }
}
