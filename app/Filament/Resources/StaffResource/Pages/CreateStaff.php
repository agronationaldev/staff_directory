<?php

namespace App\Filament\Resources\StaffResource\Pages;

use App\Filament\Resources\StaffResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use TomatoPHP\FilamentApi\Traits\InteractWithAPI;

class CreateStaff extends CreateRecord
{
    
    use InteractWithAPI;
    protected static string $resource = StaffResource::class;
}
