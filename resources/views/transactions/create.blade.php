<!-- resources/views/transactions/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class=" container mx-auto w-full max-w-xs">
        <div class="container mx-auto">
            <h2>Create New Transaction</h2>

            <form method="POST" action="{{ route('transactions.store') }}">
                @csrf
                <label class="block text-gray-500 font-bold text-left mb-1 md:mb-0 pr-4" for="amount">Amount:</label>

                <input
                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                    type="text" name="amount" required>
                <label class="block text-gray-500 font-bold text-left mb-1 md:mb-0 pr-4"
                    for="description">Description:</label>
                <input
                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                    type="text" name="description" required>
                <label class="block text-gray-500 font-bold text-left mb-1 md:mb-0 pr-4" for="type">Type:</label>
                <select
                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="type"
                    required>
                    <option value="income">Income</option>
                    <option value="expense">Expense</option>
                </select>
                <div>
                    <button
                        class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded mt-5"
                        type="submit">Create Transaction</button>
                </div>
            </form>
            <div>
                <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold mt-5 py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="button" href="{{ route('transactions.index') }}">Back to List</a>
            </div>
        </div>
    </div>
@endsection
