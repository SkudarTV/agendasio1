<?php

namespace App\Models;

enum Role:int
{
    case ADMIN = 1;
    case TEACHER = 10;
    case STUDENT = 100;

    public static function label($value)
    {
        return match ($value){
            1 =>'Administrateur',
            10 => 'Enseignant',
            100 => 'Étudiant',
        };
    }
}
