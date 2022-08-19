<?php

namespace App\Http;

use App\Providers\ProviderInterfaces\ProviderInterface;
use App\Providers\ProviderOne;
use App\Providers\ProviderTwo;

class DPForProvider
{
    /**
     * @var ProviderInterface $providerOne ;
     */
    protected ProviderInterface $providerOne;

    /**
     * @var ProviderInterface $providerTwo ;
     */
    protected ProviderInterface $providerTwo;

    public function __construct()
    {
        $this->providerOne = new ProviderOne();
        $this->providerTwo = new ProviderTwo();
    }

    public function handle(): void
    {
        $this->providerOne->saveMockDataToDb();
        $this->providerTwo->saveMockDataToDb();
    }
}
