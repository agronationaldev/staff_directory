<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('staff_no')->unique();
            $table->string('id_card_no')->unique();
            $table->string('name');
            $table->string('department');
            $table->string('designation');
            $table->string('position');
            $table->string('grade');
            $table->text('current_address');
            $table->text('permanent_address');
            $table->string('contact_number');
            $table->string('ext_no')->nullable();
            $table->string('personal_email');
            $table->string('office_email');
            $table->string('emergency_contact_name');
            $table->string('emergency_contact_number');
            $table->string('marital_status');
            $table->string('blood_group');
            $table->date('date_of_join');
            $table->string('length_of_service');
            $table->date('date_of_birth');
            $table->string('gender');
            $table->string('nationality');
            $table->string('religion')->nullable();
            $table->string('work_location');
            $table->string('qualification');
            $table->string('supervisor');
            $table->string('employment_type');
            $table->string('bank_name');
            $table->string('account_name');
            $table->string('account_no');
            $table->decimal('basic_salary', 10, 2);
            $table->decimal('service_allowance', 10, 2);
            $table->decimal('attendance_allowance', 10, 2);
            $table->decimal('fixed_allowance', 10, 2);
            $table->decimal('hardship_allowance', 10, 2);
            $table->decimal('phone_allowance', 10, 2);
            $table->decimal('food_allowance', 10, 2);
            $table->decimal('living_allowance', 10, 2);
            $table->decimal('technical_allowance', 10, 2);
            $table->decimal('management_allowance', 10, 2);
            $table->decimal('financial_performance_allowance', 10, 2);
            $table->decimal('management_performance_allowance', 10, 2);
            $table->decimal('board_allowance', 10, 2);
            $table->decimal('senior_management_allowance', 10, 2);
            $table->decimal('island_coordinator_allowance', 10, 2);
            $table->decimal('minimum_wage_allowances', 10, 2);
            $table->decimal('salary_total', 10, 2);
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
