<!-- resources/views/transactions/index.blade.php -->
@extends('layouts.app')


@section('content')
    <h2 class="mt-5 block text-gray-500  text-2xl font-bold">Transaction List</h2>

    <table class="container mx-auto">
        <thead>
            <tr>
                <th>Date</th>
                <th>Amount</th>
                <th>Description</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->created_at->format('Y-m-d') }}</td>
                    <td>{{ $transaction->amount }}</td>
                    <td>{{ $transaction->description }}</td>
                    <td>{{ ucfirst($transaction->type) }}</td>
                    <td>
                        <a class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded mt-5"
                            href="{{ route('transactions.edit', $transaction) }}">Edit</a>
                        <form method="POST" action="{{ route('transactions.destroy', $transaction) }}"
                            style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button
                                class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded mt-5"
                                type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        <a class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded mt-5"
            type="submit" href="{{ route('transactions.create') }}">Add New Transaction</a>
    </div>
@endsection
