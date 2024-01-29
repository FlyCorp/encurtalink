<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestCellPhoneValidation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-cellphone-validation {phone}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Verifica se o numero de telefone informado é válido';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function validateCellphoneBr($value)
    {
        if((strlen($value) !== 13) || in_array(substr($value, 5, 1), [0, 1, 2, 3, 4, 5])){
            return false;
        }

        // Verifica celulares móveis
        // 0XX 9XXXX-XXXX, XX 9XXXX-XXXX, 9XXXX-XXXX

        // Remova espaços e hifens
        $value = str_replace([' ', '-'], '', $value);

        // Remova o prefixo "55"
        $value = ltrim($value, '55');

        // Lista de DDDs do Brasil
        $valid_ddds = ['11', '12', '13', '14', '15', '16', '17', '18', '19', '21', '22', '24', '27', '28', '31', '32', '33', '34', '35', '37', '38', '41', '42', '43', '44', '45', '46', '47', '48', '49', '51', '53', '54', '55', '61', '62', '63', '64', '65', '66', '67', '68', '69', '71', '73', '74', '75', '77', '79', '81', '82', '83', '84', '85', '86', '87', '88', '89', '91', '92', '93', '94', '95', '96', '97', '98', '99'];

        // Remova o DDD
        $value = preg_replace('/^0?(\d{2})/', '', $value);

        // Verifique se é um número de celular e não é uma sequência específica e o DDD é válido
        return preg_match('/^(9[0-9]{8})$/', $value) && !preg_match('/^(\d)\1+$/', $value) && in_array(substr($value, 0, 2), $valid_ddds);
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        dd(self::validateCellphoneBr($this->argument('phone')));
    }
}
