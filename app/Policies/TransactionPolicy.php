<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Auth\Access\HandlesAuthorization;

class TransactionPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    use HandlesAuthorization;

    public function update(User $user, Transaction $transaction)
    {
        // Check if the user is the owner of the transaction
        return $user->id === $transaction->user_id;
    }
}
