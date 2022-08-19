<?php

namespace App\Providers;

use App\Providers\ProviderInterfaces\ProviderInterface;
use App\Traits\TaskServiceTrait;
use Illuminate\Support\Facades\Http;

class ProviderOne implements ProviderInterface
{
    use TaskServiceTrait;

    public const PROVIDER_URL = "http://www.mocky.io/v2/5d47f24c330000623fa3ebfa";

    public function saveMockDataToDb(): void
    {
        $datas = $this->getMockDataFromProviderUrl();

        $this->getTaskService()->saveProviderOneTasks($datas);
    }

    /**
     * @return mixed
     */
    public function getMockDataFromProviderUrl()
    {
        return json_decode(Http::get(self::PROVIDER_URL)->body(), true);
    }
}
