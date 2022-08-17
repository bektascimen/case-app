<?php

namespace App\Providers\ProviderInterfaces;

interface ProviderOneInterface {

    public function getMockDataFromProviderUrl();

    public function saveMockDataToDb(): void;
}
