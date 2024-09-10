<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Drug;
use App\Models\HealthCenter;
use App\Models\MedicalReport;
use App\Models\Patient;
use App\Models\Prescription;
use App\Models\Service;
use App\Models\Specialization;
use App\Models\HealthCenterService;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Patient::factory(100)->create();
        HealthCenter::factory(10)->create();
        Specialization::factory(20)->create();
        // Doctor::factory(20)->create();
        Drug::factory(15)->create();
        Service::factory(11)->create();
        // Prescription::factory(10)->create();
        HealthCenterService::factory(15)->create();
        // MedicalReport::factory(10)->create();
        // Appointment::factory(10)->create();
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'patient']);
        Role::create(['name' => 'doctor']);
        // // admin edit permissions
        // Permission::create(['name' => 'edit patients']);
        // Permission::create(['name' => 'edit doctors']);
        // Permission::create(['name' => 'edit drugs']);
        // Permission::create(['name' => 'edit services']);
        // Permission::create(['name' => 'edit health centers']);
        // Permission::create(['name' => 'edit specializations']);

        // // add admin permissions
        // Permission::create(['name' => 'add patients']);
        // Permission::create(['name' => 'add doctors']);
        // Permission::create(['name' => 'add drugs']);
        // Permission::create(['name' => 'add services']);
        // Permission::create(['name' => 'add services']);
        // Permission::create(['name' => 'add specializations']);

        // // delete admin permissions
        // Permission::create(['name' => 'delete patients']);
        // Permission::create(['name' => 'delete doctors']);
        // Permission::create(['name' => 'delete drugs']);
        // Permission::create(['name' => 'delete services']);
        // Permission::create(['name' => 'delete health centers']);
        // Permission::create(['name' => 'delete specializations']);

        // // doctor permissions
        // Permission::create(['name' => 'add medical reports']);
        // Permission::create(['name' => 'edit medical reports']);
        // Permission::create(['name' => 'add prescriptions']);
        // Permission::create(['name' => 'edit prescriptions']);

        // // patient permissions and doctor permissions
        // Permission::create(['name' => 'add appointments']);
        // Permission::create(['name' => 'edit appointments']);
        // Permission::create(['name' => 'delete appointments']);
    }
}
