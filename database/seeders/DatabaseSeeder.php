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

        $admin = Role::create(['name' => 'admin']);
        $patient = Role::create(['name' => 'patient']);
        $doctor = Role::create(['name' => 'doctor']);

        // Admin edit permissions
        $editPatients = Permission::create(['name' => 'edit patients']);
        $editDoctors = Permission::create(['name' => 'edit doctors']);
        $editDrugs = Permission::create(['name' => 'edit drugs']);
        $editServices = Permission::create(['name' => 'edit services']);
        $editHealthCenters = Permission::create(['name' => 'edit health centers']);
        $editSpecializations = Permission::create(['name' => 'edit specializations']);

        // Add admin permissions
        $addPatients = Permission::create(['name' => 'add patients']);
        $addDoctors = Permission::create(['name' => 'add doctors']);
        $addDrugs = Permission::create(['name' => 'add drugs']);
        $addServices = Permission::create(['name' => 'add services']);
        $addHealthCenters = Permission::create(['name' => 'add health centers']);
        $addSpecializations = Permission::create(['name' => 'add specializations']);

        // Delete admin permissions
        $deletePatients = Permission::create(['name' => 'delete patients']);
        $deleteDoctors = Permission::create(['name' => 'delete doctors']);
        $deleteDrugs = Permission::create(['name' => 'delete drugs']);
        $deleteServices = Permission::create(['name' => 'delete services']);
        $deleteHealthCenters = Permission::create(['name' => 'delete health centers']);
        $deleteSpecializations = Permission::create(['name' => 'delete specializations']);

        // Doctor permissions
        $addMedicalReports = Permission::create(['name' => 'add medical reports']);
        $editMedicalReports = Permission::create(['name' => 'edit medical reports']);
        $addPrescriptions = Permission::create(['name' => 'add prescriptions']);
        $editPrescriptions = Permission::create(['name' => 'edit prescriptions']);

        // Patient permissions and doctor permissions
        $addAppointments = Permission::create(['name' => 'add appointments']);
        $editAppointments = Permission::create(['name' => 'edit appointments']);
        $deleteAppointments = Permission::create(['name' => 'delete appointments']);

        $admin->givePermissionTo([
            $editPatients,
            $editDoctors,
            $editDrugs,
            $editServices,
            $editHealthCenters,
            $editSpecializations,
            $addPatients,
            $addDoctors,
            $addDrugs,
            $addServices,
            $addHealthCenters,
            $addSpecializations,
            $deletePatients,
            $deleteDoctors,
            $deleteDrugs,
            $deleteServices,
            $deleteHealthCenters,
            $deleteSpecializations,
        ]);

        $doctor->givePermissionTo([
            $addMedicalReports,
            $editMedicalReports,
            $addPrescriptions,
            $editPrescriptions,
            $addAppointments,
            $editAppointments,
            $deleteAppointments,
        ]);

        $patient->givePermissionTo([
            $addAppointments,
            $editAppointments,
            $deleteAppointments,
        ]);
    }
}
