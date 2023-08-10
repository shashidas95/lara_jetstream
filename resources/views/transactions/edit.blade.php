<!-- resources/views/transactions/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h2>Edit Transaction</h2>

    <form method="POST" action="{{ route('transactions.update', $transaction) }}">
        @csrf
        @method('PUT')
        <label for="amount">Amount:</label>
        <input type="text" name="amount" value="{{ $transaction->amount }}" required>
        <label for="description">Description:</label>
        <input type="text" name="description" value="{{ $transaction->description }}" required>
        <label for="type">Type:</label>
        <select name="type" required>
            <option value="income" {{ $transaction->type === 'income' ? 'selected' : '' }}>Income</option>
            <option value="expense" {{ $transaction->type === 'expense' ? 'selected' : '' }}>Expense</option>
        </select>
        <button type="submit">Update Transaction</button>
    </form>

    <a href="{{ route('transactions.index') }}">Back to List</a>
@endsection
