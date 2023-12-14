<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UUIDRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            // Validação personalizada para verificar a existência do registro no banco de dados
            $uuid = $this->route('uuid');
            $vote = $this->route('vote');

            $exists = \DB::table('nps_links')->where('uuid', $uuid)->exists();

            if (!$exists) {
                abort(403, 'Link de nps inválido');
            }
        });
    }
}
