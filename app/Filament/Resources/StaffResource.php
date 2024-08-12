<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StaffResource\Pages;
use App\Filament\Resources\StaffResource\RelationManagers;
use App\Models\Staff;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\MoneyColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StaffResource extends Resource
{
    protected static ?string $model = Staff::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Toggle::make('active')->columnSpan('full')
                ->columnStart(2),
                FileUpload::make('profile_picture')
                ->label('Upload Image')
                ->image()
                ->imageCropAspectRatio(1) // Square aspect ratio (1:1)
                ->imageResizeTargetWidth(720)
                ->imageResizeTargetHeight(720)
                ->directory('images')
                ->disk('public')
                ->required(), 
                
                
                // FileUpload::make('documents')->multiple(),
                TextInput::make('staff_no')->required()->unique(Staff::class, 'staff_no', ignoreRecord: true)->numeric(),
                TextInput::make('id_card_no')->required()->unique(Staff::class, 'id_card_no', ignoreRecord: true),
                TextInput::make('name')->required(),
                TextInput::make('department')->required(),
                TextInput::make('designation')->required(),
                TextInput::make('position')->required(),
                TextInput::make('grade')->required(),
                Textarea::make('current_address')->required(),
                Textarea::make('permanent_address')->required(),
                TextInput::make('contact_number')->required()->numeric(),
                TextInput::make('ext_no')->numeric(),
                TextInput::make('personal_email')->required()->unique(Staff::class, 'personal_email', ignoreRecord: true),
                TextInput::make('office_email'),
                TextInput::make('emergency_contact_name')->required(),
                TextInput::make('emergency_contact_number')->required()->numeric(),
                Select::make('marital_status')->options([
                    'single' => 'Single',
                    'married' => 'Married',
                    'divorced' => 'Divorced',
                    'widowed' => 'Widowed',
                ])->required(),
                TextInput::make('blood_group'),
                DatePicker::make('date_of_join')->required(),
                // Read-only or hidden fields
                TextInput::make('length_of_service')->disabled()->dehydrated(false),
                DatePicker::make('date_of_birth')->required(),
                Select::make('gender')->options([
                    'male' => 'Male',
                    'female' => 'Female',
                    'other' => 'Other',
                ])->required(),
                TextInput::make('nationality')->required(),
                TextInput::make('religion')->nullable(),
                TextInput::make('work_location')->required(),
                TextInput::make('qualification')->required(),
                TextInput::make('supervisor')->required(),
                TextInput::make('employment_type')->required(),
                TextInput::make('bank_name')->required(),
                TextInput::make('account_name')->required(),
                TextInput::make('account_no')->required()->numeric(),
                TextInput::make('basic_salary')->required()->numeric(),
                TextInput::make('service_allowance')->required()->numeric(),
                TextInput::make('attendance_allowance')->required()->numeric(),
                TextInput::make('fixed_allowance')->required()->numeric(),
                TextInput::make('hardship_allowance')->numeric()->default(0),
                TextInput::make('phone_allowance')->numeric()->default(0),
                TextInput::make('food_allowance')->numeric()->default(0),
                TextInput::make('living_allowance')->numeric()->default(0),
                TextInput::make('technical_allowance')->numeric()->default(0),
                TextInput::make('management_allowance')->numeric()->default(0),
                TextInput::make('financial_performance_allowance')->numeric()->default(0),
                TextInput::make('management_performance_allowance')->numeric()->default(0),
                TextInput::make('board_allowance')->numeric()->default(0),
                TextInput::make('senior_management_allowance')->numeric()->default(0),
                TextInput::make('island_coordinator_allowance')->numeric()->default(0),
                TextInput::make('minimum_wage_allowances')->numeric()->default(0),
                // Read-only or hidden fields
                TextInput::make('salary_total')->disabled()->dehydrated(false),
            ]);
    }
    
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('profile_picture')
                    ->label('Profile Picture')
                    ->circular(),
                TextColumn::make('staff_no'),
                TextColumn::make('id_card_no'),
                TextColumn::make('name'),
                TextColumn::make('department'),
                TextColumn::make('designation'),
                // TextColumn::make('position'),
                TextColumn::make('grade'),
                TextColumn::make('current_address'),
                // TextColumn::make('permanent_address'),
                TextColumn::make('contact_number'),
                TextColumn::make('ext_no'),
                // TextColumn::make('personal_email'),
                // TextColumn::make('office_email'),
                // TextColumn::make('emergency_contact_name'),
                // TextColumn::make('emergency_contact_number'),
                // TextColumn::make('marital_status'),
                // TextColumn::make('blood_group'),
                TextColumn::make('date_of_join')->date(),
                TextColumn::make('length_of_service'),
                TextColumn::make('date_of_birth')->date(),
                TextColumn::make('gender'),
                TextColumn::make('nationality'),
                TextColumn::make('religion'),
                TextColumn::make('work_location'),
                // TextColumn::make('qualification'),
                TextColumn::make('supervisor'),
                // TextColumn::make('employment_type'),
                // TextColumn::make('bank_name'),
                // TextColumn::make('account_name'),
                // TextColumn::make('account_no'),
                TextColumn::make('created_by'),
                TextColumn::make('updated_by')->default('-'),
                // TextColumn::make('basic_salary')->money('mvr', true),
                // TextColumn::make('service_allowance')->money('mvr', true),
                // TextColumn::make('attendance_allowance')->money('mvr', true),
                // TextColumn::make('fixed_allowance')->money('mvr', true),
                // TextColumn::make('hardship_allowance')->money('mvr', true),
                // TextColumn::make('phone_allowance')->money('mvr', true),
                // TextColumn::make('food_allowance')->money('mvr', true),
                // TextColumn::make('living_allowance')->money('mvr', true),
                // TextColumn::make('technical_allowance')->money('mvr', true),
                // TextColumn::make('management_allowance')->money('mvr', true),
                // TextColumn::make('financial_performance_allowance')->money('mvr', true),
                // TextColumn::make('management_performance_allowance')->money('mvr', true),
                // TextColumn::make('board_allowance')->money('mvr', true),
                // TextColumn::make('senior_management_allowance')->money('mvr', true),
                // TextColumn::make('island_coordinator_allowance')->money('mvr', true),
                // TextColumn::make('minimum_wage_allowances')->money('mvr', true),
                // TextColumn::make('salary_total')->money('mvr', true),
            ])
            ->filters([
                // Define any filters here
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListStaff::route('/'),
            'create' => Pages\CreateStaff::route('/create'),
            'edit' => Pages\EditStaff::route('/{record}/edit'),
        ];
    }
}
