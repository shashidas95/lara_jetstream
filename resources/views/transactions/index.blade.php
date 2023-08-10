<!-- resources/views/transactions/index.blade.php -->
@extends('layouts.app')


@section('content')
    <h2>Transaction List</h2>

    <table>
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
                        <a href="{{ route('transactions.edit', $transaction) }}">Edit</a>
                        <form method="POST" action="{{ route('transactions.destroy', $transaction) }}"
                            style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('transactions.create') }}">Add New Transaction</a>
@endsection
