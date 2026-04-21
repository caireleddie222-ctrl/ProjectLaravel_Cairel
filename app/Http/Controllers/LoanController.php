<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        // Fetch all loans and pass them to the index view
        $loans = Loan::all();
        return view('loans.index', compact('loans'));
    }

    public function create()
    {
        // Show the form to create a new loan
        return view('loans.create');
    }

    public function store(Request $request)
    {
        // Save the new loan to the database
        Loan::create($request->all());
        return redirect()->route('loans.index')
                         ->with('success', 'Loan added successfully.');
    }

    public function show(Loan $loan)
    {
        return view('loans.show', compact('loan'));
    }

    public function edit(Loan $loan)
    {
        // Show the form to edit an existing loan
        return view('loans.edit', compact('loan'));
    }

    public function update(Request $request, Loan $loan)
    {
        // Update the loan in the database
        $loan->update($request->all());
        return redirect()->route('loans.index')
                         ->with('success', 'Loan updated successfully.');
    }

    public function destroy(Loan $loan)
    {
        // Delete the loan
        $loan->delete();
        return redirect()->route('loans.index')
                         ->with('success', 'Loan deleted successfully.');
    }
}
