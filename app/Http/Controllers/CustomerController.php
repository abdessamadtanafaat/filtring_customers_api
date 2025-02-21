<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $query = Customer::query();

        // Apply filters
        if ($request->has('filter')) {
            foreach ($request->filter as $column => $value) {
                if (in_array($column, ['first_name', 'email']) && $value !== null) {
                    $query->where($column, 'like', "%$value%");
                }
            }
        }

        // Apply sorting
        if ($request->has('sort')) {
            foreach ($request->sort as $column => $direction) {
                if (in_array($column, ['first_name', 'email']) && in_array($direction, ['asc', 'desc'])) {
                    $query->orderBy($column, $direction);
                }
            }
        }

        // Pagination (default page is 1 and page size is 10)
        $customers = $query->paginate($request->input('page.size', 10));

        // Return the view with the customers data, and pass the request to maintain query parameters
        return view('customers', [
            'customers' => $customers,
            'filters' => $request->filter,
            'sorts' => $request->sort
        ]);
    }
}



