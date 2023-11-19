<?php

namespace App\Filament\Resources\UserResource\Fields;

use App\Models\Role;
use Filament\Forms\Components\Select;

class RoleSelect extends Select
{
    public static function make(string $name): static
    {
        $options = collect(Role::cases())->mapWithKeys(fn(Role $item)=>[$item->value=>Role::label($item->value)])->toArray();
        return parent::make($name)
            ->options($options);
    }
}
