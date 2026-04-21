<?php
namespace App\Http\Controllers;

use App\Models\LoanTransaction;
use App\Models\Customer;
use App\Models\Loan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // Ensure your PDF package is installed

class LoanTransactionController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        // Search logic using the relationship to your Customer model
        $transactions = LoanTransaction::with('customer', 'loan')
            ->when($search, function($query) use ($search) {
                $query->whereHas('customer', function($q) use ($search) {
                    $q->where('name', 'like', "%$search%");
                });
            })
            ->get();

        return view('loantransactions.index', compact('transactions', 'search'));
    }

    public function create()
    {
        // Fetch data for the dropdown menus
        $customers = Customer::all();
        $loans = Loan::all();
        return view('loantransactions.create', compact('customers', 'loans'));
    }

    public function store(Request $request)
    {
        LoanTransaction::create($request->all());
        return redirect()->route('loantransactions.index')->with('success', 'Transaction saved.');
    }

    public function generatePDF()
    {
        $transactions = LoanTransaction::with('customer', 'loan')->get();
        $pdf = Pdf::loadView('loantransactions.pdf', compact('transactions'));
        return $pdf->download('transactions_report.pdf');
    }
}
