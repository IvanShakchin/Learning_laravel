<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class UpdateFileCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:updatefile';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->line('Start...');
        //создаем файл txt куда помещаем текущую временную метку
        //use Illuminate\Support\Facades\Storage;
        Storage::disk('local')->put('command.txt', time());
    }
}
