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
        // Remove o prefixo "55" se presente usando regex
        $numeroSemPrefixo = preg_replace('/^55/', '', $value);

        // Remove o DDD (código de área) se presente
        $numeroSemDDD = preg_replace('/^\d{0,2}/', '', $numeroSemPrefixo);

        // Verifica se o número restante é um número de celular válido e não um número fixo
        return  (strlen($value) == 13) && $this->isCellphone($numeroSemDDD) && !$this->isLandline($numeroSemDDD);
    }

    public function message()
    {
        return 'O número de telefone deve ser um número de celular válido no Brasil.';
    }

    protected function isCellphone($numero)
    {
        // Adapte a lógica de validação de número de celular conforme necessário
        // Este exemplo assume que o número de celular tem 9 ou 8 dígitos e começa com 9
        return preg_match('/^9[0-9]{8}$/', $numero) || preg_match('/^9[0-9]{9}$/', $numero);
    }

    protected function isLandline($numero)
    {
        // Adapte a lógica de validação de número fixo conforme necessário
        // Este exemplo assume que o número fixo tem 8 dígitos e começa com DDD
        return preg_match('/^\d{2}[2-5][0-9]{7}$/', $numero);
    }
}
