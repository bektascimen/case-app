<?php

namespace App\Providers\ProviderInterfaces;

interface ProviderTwoInterface {

    public function saveMockDataToDb(): void;

    public function getMockDataFromProviderUrl();
}
