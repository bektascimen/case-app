<?php

namespace App\Providers;

use App\Providers\ProviderInterfaces\ProviderTwoInterface;
use App\Traits\TaskServiceTrait;
use Illuminate\Support\Facades\Http;

class ProviderTwo implements ProviderTwoInterface
{
    use TaskServiceTrait;

    public const PROVIDER_URL = "http://www.mocky.io/v2/5d47f235330000623fa3ebf7";

    public function saveMockDataToDb(): void
    {
        $datas = $this->getMockDataFromProviderUrl();

        $this->getTaskService()->saveProviderTwoTasks($datas);
    }

    /**
     * @return mixed
     */
    public function getMockDataFromProviderUrl()
    {
        return json_decode(Http::get(self::PROVIDER_URL)->body(), true);
    }
}
