<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestCommand extends Command
{
    // прописываем униальную команду
    // и передаем при необходимости аргумент data
    //  при необходимости передаем параметры --a
    // если в команде он указан --a то это true
    // если не указан то false
    // так прописывается параметр со значением --b=123
    // возможно указать псеводоним(коротное название) --O|options=555
    protected $signature = 'user:test {data}{--a}{--b=123}{--O|options=555}';

    // пример получившейся команды
    // php artisan user:test 123 --a --b=test -O=777

    // тут прописываем описание команды
    // будет выходить при php artisan list
    protected $description = 'свое описание для user:test';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //для примера выводим в консоль значение аргумента data
        $this->line($this->argument('data'));
        $this->newline();// Добавление пустой строки
        $this->info($this->option('a'));
        $this->warn($this->option('b'));
        $this->error($this->option('options'));
        $data = $this->ask('Вопрос пользователю:');
        $this->comment($data);
        // пример с подтвержением 
        if($this->confirm('Уверены?')) $this->line('yes');
        else $this->line('no');
        // приамер вызова других команд
        $this->call('list');

        return 0;
    }
}
