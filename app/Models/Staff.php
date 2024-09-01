<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;



class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_no',
        'id_card_no',
        'name',
        'department',
        'designation',
        'position',
        'grade',
        'current_address',
        'permanent_address',
        'contact_number',
        'ext_no',
        'personal_email',
        'office_email',
        'emergency_contact_name',
        'emergency_contact_number',
        'marital_status',
        'blood_group',
        'date_of_join',
        'length_of_service',
        'date_of_birth',
        'gender',
        'nationality',
        'religion',
        'work_location',
        'qualification',
        'supervisor',
        'employment_type',
        'bank_name',
        'account_name',
        'account_no',
        'basic_salary',
        'service_allowance',
        'attendance_allowance',
        'fixed_allowance',
        'hardship_allowance',
        'phone_allowance',
        'food_allowance',
        'living_allowance',
        'technical_allowance',
        'management_allowance',
        'financial_performance_allowance',
        'management_performance_allowance',
        'board_allowance',
        'senior_management_allowance',
        'island_coordinator_allowance',
        'minimum_wage_allowances',
        'salary_total',
        'profile_picture', 
        'documents', 
        'created_by', 
        'updated_by',    
        'active',     
    ];

    protected $casts = [
        'date_of_join' => 'date',
        'date_of_birth' => 'date',
        'documents' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->calculateSalaryTotal();
            $model->calculateLengthOfService();
        });

        static::creating(function ($model) {
            if (Auth::check()) {
                $model->created_by = Auth::user()->name;
            }
        });

        static::updating(function ($model) {
            if (Auth::check()) {
                $model->updated_by = Auth::user()->name;
            }
        });
    }

    public function calculateSalaryTotal()
    {
        $this->salary_total = $this->basic_salary +
            $this->service_allowance +
            $this->attendance_allowance +
            $this->fixed_allowance +
            $this->hardship_allowance +
            $this->phone_allowance +
            $this->food_allowance +
            $this->living_allowance +
            $this->technical_allowance +
            $this->management_allowance +
            $this->financial_performance_allowance +
            $this->management_performance_allowance +
            $this->board_allowance +
            $this->senior_management_allowance +
            $this->island_coordinator_allowance +
            $this->minimum_wage_allowances;
    }

    public function calculateLengthOfService()
    {
        $joinDate = Carbon::parse($this->date_of_join);
        $currentDate = Carbon::now();

        $years = $joinDate->diffInYears($currentDate);
        $months = $joinDate->copy()->addYears($years)->diffInMonths($currentDate);
        $days = $joinDate->copy()->addYears($years)->addMonths($months)->diffInDays($currentDate);

        $this->length_of_service = "{$years} years {$months} months {$days} days";
    }

    public function getThreeMonthDateAttribute()
    {
        return Carbon::parse($this->date_of_join)->addMonths(3);
    }
}