<?php

namespace App\Filament\Resources\TaskResource\Widgets;

use App\Models\Task;
use Filament\Widgets\Widget;

class AddTask extends Widget
{
    protected static string $view = 'filament.resources.task-resource.widgets.add-task';

    public static function canView(): bool
    {
        return auth()->user()->can('create',Task::class);
    }
}
