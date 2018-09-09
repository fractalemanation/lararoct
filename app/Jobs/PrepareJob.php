<?php

namespace App\Jobs;

use Exception;//Подклчюаем пространство имен для работы
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class PrepareJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 1;//Количество попыток выполнить задачу

    protected $message;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        throw new Exception("Our Error", 101);
        info($this->message);//Helper laravel помещает данные в логи-laravel
    }

    /**
     * Execute the job.
     *
     * @param void
     */
    public function failed(Exception $exception) {
        info(__CLASS__.": ошибка выполнения");
    }
}
