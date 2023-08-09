<?php

namespace App\Models;

use App\Models\User;
use App\Models\Income;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IncomeCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function incomes()
    {
        return $this->hasMany(Income::class);
    }
}
