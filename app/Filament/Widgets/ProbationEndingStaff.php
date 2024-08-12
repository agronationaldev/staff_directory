<?php

namespace App\Filament\Widgets;

use App\Models\Staff;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class ProbationEndingStaff extends BaseWidget
{
    protected static ?int $sort = 1;
    protected int | string | array $columnSpan = 'full';

    protected function getTableDescription(): string|Htmlable|null
    {
        return 'Staff Ending Probation This Month';
    }

    protected function getTableQuery(): Builder
    {
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        return Staff::query()
            ->whereMonth('date_of_join', '=', $currentMonth - 3)
            ->whereYear('date_of_join', '=', $currentYear)
            ->select(['id','staff_no', 'name', 'designation', 'date_of_join']);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('staff_no')
            ->label('Staff ID')
            ->sortable(),
            Tables\Columns\TextColumn::make('name')
                ->label('Staff Name')
                ->sortable(),
            Tables\Columns\TextColumn::make('designation')
                ->label('Designation')
                ->sortable(),
            Tables\Columns\TextColumn::make('three_month_date')
                ->label('Ends Probation On')
                ->date('Y-m-d')
                ->sortable(),
        ];
    }

    protected function applySortingToTableQuery(Builder $query): Builder
    {
        return $query;
    }

    public function getTableRecordKey($record): string
    {
        return (string) $record->id ?: (string) $record->staff_no;
    }
}
