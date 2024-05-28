<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidCellphone implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function passes($attribute, $value)
    {
        // Verifica se o número restante é um número de celular válido e não um número fixo
        return $this->validateCellphoneBr($value);
    }

    public function message()
    {
        return 'O número de telefone deve ser um número de celular válido no Brasil.';
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
        if (substr($value, 0, 2) === '55') {
            $value = substr($value, 2);
        }

        // Lista de DDDs do Brasil
        $valid_ddds = ['11', '12', '13', '14', '15', '16', '17', '18', '19', '21', '22', '24', '27', '28', '31', '32', '33', '34', '35', '37', '38', '41', '42', '43', '44', '45', '46', '47', '48', '49', '51', '53', '54', '55', '61', '62', '63', '64', '65', '66', '67', '68', '69', '71', '73', '74', '75', '77', '79', '81', '82', '83', '84', '85', '86', '87', '88', '89', '91', '92', '93', '94', '95', '96', '97', '98', '99'];

        // Remova o DDD
        $value = preg_replace('/^0?(\d{2})/', '', $value);

        // Verifique se é um número de celular e não é uma sequência específica e o DDD é válido
        return preg_match('/^(9[0-9]{8})$/', $value) && !preg_match('/^(\d)\1+$/', $value) && in_array(substr($value, 0, 2), $valid_ddds);
    }
}
