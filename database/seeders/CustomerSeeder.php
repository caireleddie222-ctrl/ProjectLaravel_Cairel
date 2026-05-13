<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        $customers = [
            [
                'name' => 'Juan Dela Cruz',
                'address' => '123 Main Street, Manila, Metro Manila',
                'gender' => 'Male',
                'dob' => '1985-03-15',
            ],
            [
                'name' => 'Maria Santos',
                'address' => '456 Oak Avenue, Quezon City, Metro Manila',
                'gender' => 'Female',
                'dob' => '1990-07-22',
            ],
            [
                'name' => 'Jose Garcia',
                'address' => '789 Pine Road, Makati, Metro Manila',
                'gender' => 'Male',
                'dob' => '1978-11-08',
            ],
            [
                'name' => 'Rosa Reyes',
                'address' => '321 Elm Street, Pasig, Metro Manila',
                'gender' => 'Female',
                'dob' => '1992-02-14',
            ],
            [
                'name' => 'Carlos Mendoza',
                'address' => '654 Maple Drive, Caloocan, Metro Manila',
                'gender' => 'Male',
                'dob' => '1988-05-30',
            ],
            [
                'name' => 'Ana Cruz',
                'address' => '987 Cedar Lane, Valenzuela, Bulacan',
                'gender' => 'Female',
                'dob' => '1995-09-18',
            ],
            [
                'name' => 'Miguel Torres',
                'address' => '147 Birch Street, Malabon, Metro Manila',
                'gender' => 'Male',
                'dob' => '1982-12-25',
            ],
            [
                'name' => 'Sofia Ramirez',
                'address' => '258 Spruce Avenue, Navotas, Metro Manila',
                'gender' => 'Female',
                'dob' => '1993-06-11',
            ],
            [
                'name' => 'Antonio Lopez',
                'address' => '369 Ash Drive, Muntinlupa, Metro Manila',
                'gender' => 'Male',
                'dob' => '1980-01-03',
            ],
            [
                'name' => 'Isabella Fernandez',
                'address' => '741 Walnut Road, Las Piñas, Metro Manila',
                'gender' => 'Female',
                'dob' => '1991-08-27',
            ],
            [
                'name' => 'Dante Morales',
                'address' => '852 Chestnut Lane, Parañaque, Metro Manila',
                'gender' => 'Male',
                'dob' => '1987-04-09',
            ],
            [
                'name' => 'Lucia Gonzales',
                'address' => '963 Sycamore Street, San Juan, Metro Manila',
                'gender' => 'Female',
                'dob' => '1994-10-16',
            ],
            [
                'name' => 'Federico Solis',
                'address' => '135 Poplar Avenue, Marikina, Metro Manila',
                'gender' => 'Male',
                'dob' => '1984-03-20',
            ],
            [
                'name' => 'Gabriela Ramos',
                'address' => '246 Alder Drive, Taguig, Metro Manila',
                'gender' => 'Female',
                'dob' => '1996-07-05',
            ],
            [
                'name' => 'Rafael Quintero',
                'address' => '357 Juniper Lane, Pasay City, Metro Manila',
                'gender' => 'Male',
                'dob' => '1989-09-12',
            ],
            [
                'name' => 'Victoria Santos',
                'address' => '468 Laurel Street, Cavite City, Cavite',
                'gender' => 'Female',
                'dob' => '1991-11-28',
            ],
        ];

        foreach ($customers as $customer) {
            Customer::firstOrCreate(
                ['name' => $customer['name'], 'dob' => $customer['dob']],
                $customer
            );
        }
    }
}
