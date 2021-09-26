<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(10)->create();
         \App\Models\Wallet::factory(10)->create();
         \App\Models\Variation::factory(10)->create();
         \App\Models\Tax::factory(10)->create();
         \App\Models\Subscription::factory(10)->create();
         \App\Models\Subscriber::factory(10)->create();
         \App\Models\Shift::factory(10)->create();
         \App\Models\Setting::factory(10)->create();
         \App\Models\ReportProduct::factory(10)->create();
         \App\Models\Report::factory(10)->create();
         \App\Models\Product::factory(10)->create();
         \App\Models\Payment::factory(10)->create();
         \App\Models\OrderProduct::factory(10)->create();
         \App\Models\Order::factory(10)->create();
         \App\Models\Inventory::factory(10)->create();
         \App\Models\Employee::factory(10)->create();
         \App\Models\Customer::factory(10)->create();
         \App\Models\Admin::factory(10)->create();
    }
}
