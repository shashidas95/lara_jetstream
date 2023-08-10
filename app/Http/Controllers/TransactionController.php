<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // $id = Auth::id();
        // dd($id);
        // Fetch the authenticated user's transactions
        //
        // $transactions = auth()->user()->transactions;
        $transactions = $user->transactions;

        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        return view('transactions.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required|string',
            'type' => 'required|in:income,expense',
        ]);
        $user = Auth::user();


        // Create a new transaction associated with the authenticated user
        $user->transactions()->create($validatedData);

        return redirect()->route('transactions.index')->with('success', 'Transaction created successfully.');
    }

    public function edit(Transaction $transaction)
    {
        // Check if the transaction belongs to the authenticated user
        $this->authorize('update', $transaction);

        return view('transactions.edit', compact('transaction'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        // Check if the transaction belongs to the authenticated user
        $this->authorize('update', $transaction);

        $validatedData = $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required|string',
            'type' => 'required|in:income,expense',
        ]);

        $transaction->update($validatedData);

        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully.');
    }

    public function destroy(Transaction $transaction)
    {
        // Check if the transaction belongs to the authenticated user
        $this->authorize('delete', $transaction);

        $transaction->delete();

        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully.');
    }
}
