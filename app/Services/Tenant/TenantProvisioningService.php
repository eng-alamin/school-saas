<?php

namespace App\Services\Tenant;

use App\Models\Tenant;
use App\Models\Domain;
use App\Models\User;
use App\Models\SettingSchool;
use Illuminate\Support\Facades\DB;
use Stancl\Tenancy\Jobs\MigrateDatabase;

class TenantProvisioningService
{
    public function register(array $data): Tenant
    {
        DB::beginTransaction();

        try {

            /*
            |--------------------------------------------------------------------------
            | Create Tenant
            |--------------------------------------------------------------------------
            */

            $tenant = Tenant::create([
                'id' => $data['subdomain'],
                // 'id' => str()->uuid(),
                'school_name' => $data['school_name'],
                'plan' => 'free',
            ]);

            /*
            |--------------------------------------------------------------------------
            | Create Domain
            |--------------------------------------------------------------------------
            */

            $tenant->domains()->create([
                'domain' =>
                    $data['subdomain'] .
                    '.school-saas.test',
            ]);

            /*
            |--------------------------------------------------------------------------
            | Create Tenant Database & Run Migrations 
            |--------------------------------------------------------------------------
            */

            tenancy()->initialize($tenant);

            MigrateDatabase::dispatchSync($tenant);

            /*
            |--------------------------------------------------------------------------
            | Create Super Admin
            |--------------------------------------------------------------------------
            */

            User::create([
                'name' => $data['admin_name'],
                'email' => $data['admin_email'],
                'password' => $data['password'],
            ]);

            /*
            |--------------------------------------------------------------------------
            | Create Setting School
            |--------------------------------------------------------------------------
            */

            SettingSchool::create([
                'name' => $data['school_name'],
                'phone' => $data['phone'],
                'email' => $data['email'],
            ]);

            /*
            |--------------------------------------------------------------------------
            | Default Seeders
            |--------------------------------------------------------------------------
            */

            $this->seedDefaults();

            tenancy()->end();

            // DB::commit();

            return $tenant;

        } catch (\Throwable $e) {

            tenancy()->end();
            DB::rollBack();
            report($e);
            throw $e;
        }
    }

    protected function seedDefaults(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Academic Session
        |--------------------------------------------------------------------------
        */

        \App\Models\AcademicSession::create([
            'name' => '2026',
            'is_current' => true,
        ]);
        \App\Models\AcademicSession::create([
            'name' => '2027',
            'is_current' => false,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Default Classes
        |--------------------------------------------------------------------------
        */

        $classes = [
            'Play',
            'Nursery',
            'KG',
            'One',
            'Two',
            'Three',
            'Five',
            'Six',
            'Seven',
            'Eight',
            'Night',
            'Ten',
        ];

        foreach ($classes as $class) {
            \App\Models\AcademicClass::create([
                'name' => $class,
            ]);
        }
    }
}