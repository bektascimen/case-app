<?php

namespace App\Console\Commands;

use App\Providers\ProviderInterfaces\ProviderOneInterface;
use App\Providers\ProviderInterfaces\ProviderTwoInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class GetProviderDataAndInsertCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'save:tasktodb';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get mock data and save to database';

    /**
     * Execute the console command.
     *
     * @param ProviderOneInterface $providerOne
     * @param ProviderTwoInterface $providerTwo
     * @return void
     * @throws \Throwable
     */
    public function handle(ProviderOneInterface $providerOne, ProviderTwoInterface $providerTwo): void
    {
        try {
            DB::beginTransaction();

            $providerOne->saveMockDataToDb();
            $providerTwo->saveMockDataToDb();

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            throw new \Exception("Veritabanına kaydederken bir sorun oluştu.");
        }

        echo "Kaydetme başarılı \n";
    }
}
