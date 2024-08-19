<?php
namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class PublicStaffController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $department = $request->input('department');
    
        $staff = Staff::when($query, function($queryBuilder) use ($query) {
                return $queryBuilder->where(function($subQuery) use ($query) {
                    $subQuery->where('name', 'like', "%{$query}%")
                             ->orWhere('department', 'like', "%{$query}%")
                             ->orWhere('designation', 'like', "%{$query}%")
                             ->orWhere('ext_no', 'like', "%{$query}%");
                });
            })
            ->when($department, function($queryBuilder) use ($department) {
                return $queryBuilder->where('department', $department);
            })
            ->where('active', true) 
            ->paginate(20);
    
        // Check if the request expects JSON (AJAX request)
        if ($request->wantsJson()) {
            return response()->json($staff);
        }
    
        // Get a list of departments for the filter dropdown
        $departments = Staff::select('department')->distinct()->get();
    
        return view('filament.pages.staff-directory', compact('staff', 'query', 'departments', 'department'));
    }
    
}
