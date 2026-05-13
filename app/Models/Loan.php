<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = ['description', 'amount', 'term', 'interest', 'dategranted'];

    public function loanTransactions()
    {
        return $this->hasMany(LoanTransaction::class);
    }
}
