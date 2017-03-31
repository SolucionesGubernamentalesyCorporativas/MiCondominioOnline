<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MembershipsTableSeeder::class);
        $this->call(TypeOfMembershipsTableSeeder::class);
        $this->call(UnlockedFeaturesTableSeeder::class);
        $this->call(TypeOfEstatesTableSeeder::class);
        $this->call(EstatesTableSeeder::class);
        $this->call(CondosTableSeeder::class);
        $this->call(CondoEstateTableSeeder::class);
        $this->call(TransactionsTableSeeder::class);
        $this->call(TypeOfTransactionsTableSeeder::class);
        $this->call(ReceiptsTableSeeder::class);
        $this->call(TypeOfResourcesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(VisitorsTableSeeder::class);
        $this->call(TypeOfVisitorsTableSeeder::class);
        $this->call(EstateUserTableSeeder::class);
        $this->call(CondoUserTableSeeder::class);
        $this->call(TransactionUserTableSeeder::class);
        $this->call(AnnouncementsTableSeeder::class);
        $this->call(AssetsTableSeeder::class);
        $this->call(ResourcesTableSeeder::class);
    }
}
