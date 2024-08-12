<?php
namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class PublicStaffController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        $staff = Staff::when($query, function($queryBuilder) use ($query) {
            return $queryBuilder->where(function($subQuery) use ($query) {
                $subQuery->where('name', 'like', "%{$query}%")
                         ->orWhere('department', 'like', "%{$query}%")
                         ->orWhere('designation', 'like', "%{$query}%")
                         ->orWhere('ext_no', 'like', "%{$query}%");
            });
        })
        ->where('active', true) 
        ->paginate(10); 

        // Check if the request expects JSON (AJAX request)
        if ($request->wantsJson()) {
            return response()->json($staff);
        }

        return view('filament.pages.staff-directory', compact('staff', 'query'));
    }
}
