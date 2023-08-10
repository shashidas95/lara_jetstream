<!-- resources/views/transactions/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h2>Create New Transaction</h2>

        <form method="POST" action="{{ route('transactions.store') }}">
            @csrf
            <label for="amount">Amount:</label>
            <input type="text" name="amount" required>
            <label for="description">Description:</label>
            <input type="text" name="description" required>
            <label for="type">Type:</label>
            <select name="type" required>
                <option value="income">Income</option>
                <option value="expense">Expense</option>
            </select>
            <button type="submit">Create Transaction</button>
        </form>

        <a href="{{ route('transactions.index') }}">Back to List</a>
    </div>
@endsection
