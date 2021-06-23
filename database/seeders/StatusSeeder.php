<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Registrations
        Status::create(['status_name'=>'Incomplete','status_order_no'=>1,'status_color_class'=>'btn-hover-danger','status_type'=>'registrations']);
        Status::create(['status_name'=>'Completed','status_order_no'=>2,'status_color_class'=>'btn-hover-info','status_type'=>'registrations']);
        Status::create(['status_name'=>'Re-Opened','status_order_no'=>3,'status_color_class'=>'btn-hover-primary','status_type'=>'registrations']);
        Status::create(['status_name'=>'Locked','status_order_no'=>4,'status_color_class'=>'btn-hover-secondary','status_type'=>'registrations']);

        // Applications
        Status::create(['status_name'=>'Pending','status_order_no'=>1,'status_color_class'=>'btn-hover-info','status_type'=>'applications']);
        Status::create(['status_name'=>'In Process','status_order_no'=>2,'status_color_class'=>'btn-hover-primary','status_type'=>'applications']);
        Status::create(['status_name'=>'Observation','status_order_no'=>3,'status_color_class'=>'btn-hover-warning','status_type'=>'applications']);
        Status::create(['status_name'=>'Resubmitted','status_order_no'=>4,'status_color_class'=>'btn-hover-primary','status_type'=>'applications']);
        Status::create(['status_name'=>'Approved','status_order_no'=>5,'status_color_class'=>'btn-hover-success','status_type'=>'applications']);
        Status::create(['status_name'=>'Rejected','status_order_no'=>6,'status_color_class'=>'btn-hover-danger','status_type'=>'applications']);

    }
}
