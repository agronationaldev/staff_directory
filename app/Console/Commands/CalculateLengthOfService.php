<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Staff;
use Illuminate\Support\Facades\Log;

class CalculateLengthOfService extends Command
{
    protected $signature = 'calculate:lengthofservice';
    protected $description = 'Calculate and update the length of service for all staff members';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $staffMembers = Staff::all();
        $successCount = 0;
        $failCount = 0;

        foreach ($staffMembers as $staff) {
            try {
                $staff->calculateLengthOfService();
                $staff->save();
                $successCount++;
                Log::channel('length_of_service')->info('Length of service updated for staff ID: ' . $staff->id);
            } catch (\Exception $e) {
                $failCount++;
                Log::channel('length_of_service')->error('Failed to update length of service for staff ID: ' . $staff->id . '. Error: ' . $e->getMessage());
            }
        }

        $this->info("Length of service has been updated for $successCount staff members.");
        $this->info("$failCount staff members failed to update.");
        
        Log::channel('length_of_service')->info("CalculateLengthOfService command completed: $successCount successes, $failCount failures.");
    }
}
