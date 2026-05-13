<?php

namespace Database\Seeders;

use App\Models\Loan;
use Illuminate\Database\Seeder;

class LoanSeeder extends Seeder
{
    public function run(): void
    {
        $loans = [
            [
                'description' => 'Home Renovation Loan',
                'amount' => 150000.00,
                'term' => 12,
                'interest' => 8.5,
                'dategranted' => '2026-01-15',
            ],
            [
                'description' => 'Business Expansion Loan',
                'amount' => 250000.00,
                'term' => 24,
                'interest' => 10.0,
                'dategranted' => '2026-01-20',
            ],
            [
                'description' => 'Education Loan',
                'amount' => 100000.00,
                'term' => 36,
                'interest' => 7.5,
                'dategranted' => '2026-02-01',
            ],
            [
                'description' => 'Vehicle Purchase Loan',
                'amount' => 300000.00,
                'term' => 48,
                'interest' => 9.0,
                'dategranted' => '2026-02-10',
            ],
            [
                'description' => 'Medical Emergency Loan',
                'amount' => 75000.00,
                'term' => 6,
                'interest' => 12.0,
                'dategranted' => '2026-02-14',
            ],
            [
                'description' => 'Personal Emergency Loan',
                'amount' => 50000.00,
                'term' => 12,
                'interest' => 11.5,
                'dategranted' => '2026-02-20',
            ],
            [
                'description' => 'Appliance Purchase Loan',
                'amount' => 80000.00,
                'term' => 18,
                'interest' => 8.0,
                'dategranted' => '2026-03-01',
            ],
            [
                'description' => 'Agricultural Loan',
                'amount' => 200000.00,
                'term' => 36,
                'interest' => 7.0,
                'dategranted' => '2026-03-05',
            ],
            [
                'description' => 'Small Business Startup Loan',
                'amount' => 120000.00,
                'term' => 24,
                'interest' => 9.5,
                'dategranted' => '2026-03-12',
            ],
            [
                'description' => 'Furniture & Home Fixtures Loan',
                'amount' => 95000.00,
                'term' => 24,
                'interest' => 8.5,
                'dategranted' => '2026-03-18',
            ],
            [
                'description' => 'Wedding Expenses Loan',
                'amount' => 120000.00,
                'term' => 12,
                'interest' => 9.0,
                'dategranted' => '2026-03-25',
            ],
            [
                'description' => 'Travel and Vacation Loan',
                'amount' => 60000.00,
                'term' => 12,
                'interest' => 10.5,
                'dategranted' => '2026-04-02',
            ],
            [
                'description' => 'Home Construction Loan',
                'amount' => 500000.00,
                'term' => 60,
                'interest' => 8.0,
                'dategranted' => '2026-04-08',
            ],
            [
                'description' => 'Business Equipment Loan',
                'amount' => 180000.00,
                'term' => 36,
                'interest' => 9.0,
                'dategranted' => '2026-04-15',
            ],
            [
                'description' => 'Debt Consolidation Loan',
                'amount' => 200000.00,
                'term' => 24,
                'interest' => 10.0,
                'dategranted' => '2026-04-22',
            ],
            [
                'description' => 'Professional Development Loan',
                'amount' => 50000.00,
                'term' => 12,
                'interest' => 8.5,
                'dategranted' => '2026-04-28',
            ],
        ];

        foreach ($loans as $loan) {
            Loan::firstOrCreate(
                ['description' => $loan['description']],
                $loan
            );
        }
    }
}
