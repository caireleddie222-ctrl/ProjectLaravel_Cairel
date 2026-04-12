<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Inventory; // Make sure to import your model

class InventorySeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['name' => 'Ceramic Brake Pads (Front)', 'sku' => 'BP-F-001', 'quantity' => 50, 'price' => 1500.00],
            ['name' => 'Iridium Spark Plugs (Set of 4)', 'sku' => 'SP-04-X', 'quantity' => 120, 'price' => 800.00],
            ['name' => 'Premium Oil Filter', 'sku' => 'OF-A12', 'quantity' => 200, 'price' => 350.00],
            ['name' => 'Engine Air Filter', 'sku' => 'AF-C34', 'quantity' => 150, 'price' => 600.00],
            ['name' => 'Fully Synthetic Engine Oil (4L)', 'sku' => 'EO-SYN-4L', 'quantity' => 80, 'price' => 2200.00],
            ['name' => 'Maintenance-Free Car Battery (12V)', 'sku' => 'BAT-12V-70A', 'quantity' => 30, 'price' => 4500.00],
            ['name' => 'Silicone Windshield Wipers (Pair)', 'sku' => 'WW-P-22IN', 'quantity' => 100, 'price' => 750.00],
            ['name' => 'Halogen Headlight Bulb (H4)', 'sku' => 'HL-H4-HAL', 'quantity' => 85, 'price' => 400.00],
            ['name' => 'Radiator Coolant (1 Gallon)', 'sku' => 'RAD-COOL-1G', 'quantity' => 60, 'price' => 950.00],
            ['name' => 'Alternator Drive Belt', 'sku' => 'BELT-ALT-01', 'quantity' => 45, 'price' => 850.00],
            ['name' => 'Inline Fuel Filter', 'sku' => 'FF-GAS-09', 'quantity' => 90, 'price' => 500.00],
            ['name' => 'Heavy Duty Brake Fluid (DOT 4, 1L)', 'sku' => 'BF-DOT4-1L', 'quantity' => 75, 'price' => 380.00],
            ['name' => 'Shock Absorbers (Rear, Pair)', 'sku' => 'SA-R-PR', 'quantity' => 20, 'price' => 5500.00],
            ['name' => 'Carbon Cabin Air Filter', 'sku' => 'CAF-002', 'quantity' => 110, 'price' => 450.00],
            ['name' => 'Performance Ignition Coil', 'sku' => 'IGN-COIL-X', 'quantity' => 40, 'price' => 1800.00],
        ];

        foreach ($items as $item) {
            Inventory::create($item);
        }
    }
}
