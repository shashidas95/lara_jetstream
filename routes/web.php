<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\IncomeCategoryController;
use App\Http\Controllers\ExpenseCategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Income Categories
    Route::resource('income_categories', IncomeCategoryController::class);

    // Expense Categories
    Route::resource('expense_categories', ExpenseCategoryController::class);

    // Incomes
    Route::resource('incomes', IncomeController::class);

    // Expenses
    Route::resource('expenses', ExpenseController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('transactions', TransactionController::class);
});


/*  GET|HEAD      expense_categories ............ expense_categories.index › ExpenseCategoryController@index
  POST            expense_categories ............ expense_categories.store › ExpenseCategoryController@store
  GET|HEAD        expense_categories/create ... expense_categories.create › ExpenseCategoryController@create
  GET|HEAD        expense_categories/{expense_category} expense_categories.show › ExpenseCategoryController…
  PUT|PATCH       expense_categories/{expense_category} expense_categories.update › ExpenseCategoryControll…
  DELETE          expense_categories/{expense_category} expense_categories.destroy › ExpenseCategoryControl…
  GET|HEAD        expense_categories/{expense_category}/edit expense_categories.edit › ExpenseCategoryContr…
  GET|HEAD        expenses ........................................ expenses.index › ExpenseController@index
  POST            expenses ........................................ expenses.store › ExpenseController@store
  GET|HEAD        expenses/create ............................... expenses.create › ExpenseController@create
  GET|HEAD        expenses/{expense} ................................ expenses.show › ExpenseController@show
  PUT|PATCH       expenses/{expense} ............................ expenses.update › ExpenseController@update
  DELETE          expenses/{expense} .......................... expenses.destroy › ExpenseController@destroy
  GET|HEAD        expenses/{expense}/edit ........................... expenses.edit › ExpenseController@edit
  GET|HEAD        forgot-password .. password.request › Laravel\Fortify › PasswordResetLinkController@create
  POST            forgot-password ..... password.email › Laravel\Fortify › PasswordResetLinkController@store
  GET|HEAD        income_categories ............... income_categories.index › IncomeCategoryController@index
  POST            income_categories ............... income_categories.store › IncomeCategoryController@store
  GET|HEAD        income_categories/create ...... income_categories.create › IncomeCategoryController@create
  GET|HEAD        income_categories/{income_category} income_categories.show › IncomeCategoryController@show
  PUT|PATCH       income_categories/{income_category} income_categories.update › IncomeCategoryController@u…
  DELETE          income_categories/{income_category} income_categories.destroy › IncomeCategoryController@…
  GET|HEAD        income_categories/{income_category}/edit income_categories.edit › IncomeCategoryControlle…
  GET|HEAD        incomes ........................................... incomes.index › IncomeController@index
  POST            incomes ........................................... incomes.store › IncomeController@store
  GET|HEAD        incomes/create .................................. incomes.create › IncomeController@create
  GET|HEAD        incomes/{income} .................................... incomes.show › IncomeController@show
  PUT|PATCH       incomes/{income} ................................ incomes.update › IncomeController@update
  DELETE          incomes/{income} .............................. incomes.destroy › IncomeController@destroy
  GET|HEAD        incomes/{income}/edit ............................... incomes.edit › IncomeController@edit

  GET|HEAD        transactions ............................ transactions.index › TransactionController@index
  POST            transactions ............................ transactions.store › TransactionController@store
  GET|HEAD        transactions/create ................... transactions.create › TransactionController@create
  GET|HEAD        transactions/{transaction} ................ transactions.show › TransactionController@show
  PUT|PATCH       transactions/{transaction} ............ transactions.update › TransactionController@update
  DELETE          transactions/{transaction} .......... transactions.destroy › TransactionController@destroy
  GET|HEAD        transactions/{transaction}/edit ........... transactions.edit › TransactionController@edit
*/
