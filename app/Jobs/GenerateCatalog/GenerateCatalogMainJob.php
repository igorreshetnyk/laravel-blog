<?php

namespace App\Jobs\GenerateCatalog;

use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GenerateCatalogMainJob implements AbstractJob
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->debug('start');

        // сначала кешируем обьекты
        GenerateCatalogCacheJob::dispatchNow();

        // цепочка заданий файлов с ценами, самая ресурсная, запускаем первой
        $chainPrices = $this->getChainPrices();

        // основные подзадачи
        $cainMain = [
            new GenerateCategoriesJob, // генерация категорий
            new GenerateDeliveresJob, // генерация способов доставки
            new GeneratePointsJob, // генерация пунктов выдачи
        ];


    }
}
