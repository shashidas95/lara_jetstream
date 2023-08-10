<!-- resources/views/transactions/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mx-auto w-full max-w-xs">
        <h2 class="mt-5 block text-gray-500 font-bold">Edit Transaction</h2>

        <form method="POST" action="{{ route('transactions.update', $transaction) }}">
            @csrf
            @method('PUT')
            <label class="block text-gray-500 font-bold text-left mb-1 md:mb-0 pr-4" for="amount">Amount:</label>
            <input
                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                type="text" name="amount" value="{{ $transaction->amount }}" required>
            <label class="block text-gray-500 font-bold text-left mb-1 md:mb-0 pr-4" for="description">Description:</label>
            <input
                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                type="text" name="description" value="{{ $transaction->description }}" required>
            <label class="block text-gray-500 font-bold text-left mb-1 md:mb-0 pr-4" for="type">Type:</label>
            <select
                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                name="type" required>
                <option value="income" {{ $transaction->type === 'income' ? 'selected' : '' }}>Income</option>
                <option value="expense" {{ $transaction->type === 'expense' ? 'selected' : '' }}>Expense</option>
            </select>
            <div>
                <button
                    class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded mt-5"
                    type="submit">Update Transaction</button>
            </div>
        </form>

        <a class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded mt-5"
            type="button" href="{{ route('transactions.index') }}">Back to List</a>
    </div>
@endsection
