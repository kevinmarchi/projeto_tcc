<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'O :attribute deve ser aceito.',
    'accepted_if' => 'O :attribute deve ser aceito quando :other é :value.',
    'active_url' => 'O :attribute não tem uma URL válida.',
    'after' => 'O :attribute deve ser uma data depois :date.',
    'after_or_equal' => 'O :attribute deve ser uma data posterior ou igual a :date.',
    'alpha' => 'O :attribute deve conter apenas letras.',
    'alpha_dash' => 'O :attribute deve conter apenas letras, números, travessões e sublinhados.',
    'alpha_num' => 'O :attribute deve conter apenas letras e números.',
    'array' => 'O :attribute deve ser um array.',
    'before' => 'O :attribute deve ser uma data antes :date.',
    'before_or_equal' => 'O :attribute deve ser uma data anterior ou igual a :date.',
    'between' => [
        'numeric' => 'O :attribute deve estar entre :min e :max.',
        'file' => 'O :attribute deve estar entre :min e :max kilobytes.',
        'string' => 'O :attribute deve estar entre :min e :max caracteres.',
        'array' => 'O :attribute deve estar entre :min e :max itens.',
    ],
    'boolean' => 'O :attribute campo deve ser verdadeiro ou falso.',
    'confirmed' => 'O :attribute a confirmação não corresponde.',
    'current_password' => 'A senha está incorreta.',
    'date' => 'O :attribute não é uma data válida.',
    'date_equals' => 'O :attribute deve ser uma data igual a :date.',
    'date_format' => 'O :attribute não corresponde ao formato :format.',
    'different' => 'O :attribute e :other precisam ser diferentes.',
    'digits' => 'O :attribute precisa ter :digits digitos.',
    'digits_between' => 'O :attribute deve ter entre :min e :max digitos.',
    'dimensions' => 'O :attribute tem dimensões inválidas.',
    'distinct' => 'O :attribute campo tem um valor duplicado.',
    'email' => 'O :attribute deve ser um endereço de e-mail válido.',
    'ends_with' => 'O :attribute deve terminar com um dos seguintes valores: :values.',
    'exists' => 'O selecionado :attribute é inválido.',
    'file' => 'O :attribute precisa ser um arquivo.',
    'filled' => 'O :attribute campo deve ter um valor.',
    'gt' => [
        'numeric' => 'O :attribute deve ser maior que :value.',
        'file' => 'O :attribute deve ser maior que :value kilobytes.',
        'string' => 'O :attribute deve ser maior que :value caracteres.',
        'array' => 'O :attribute deve ter mais que :value itens.',
    ],
    'gte' => [
        'numeric' => 'O :attribute deve ser maior ou igual :value.',
        'file' => 'O :attribute deve ser maior ou igual :value kilobytes.',
        'string' => 'O :attribute deve ser maior ou igual :value caracteres.',
        'array' => 'O :attribute deve ter :value itens ou mais.',
    ],
    'image' => 'O :attribute precisa ser uma imagem.',
    'in' => 'O selecionado :attribute é inválido.',
    'in_array' => 'O :attribute campo não existe em :other.',
    'integer' => 'O :attribute precisa ser um inteiro.',
    'ip' => 'O :attribute precisa ser um endereço IP válido.',
    'ipv4' => 'O :attribute deve ser um endereço IPv4 válido.',
    'ipv6' => 'O :attribute deve ser um endereço IPv6 válido.',
    'json' => 'O :attribute deve ser uma string JSON válida.',
    'lt' => [
        'numeric' => 'O :attribute deve ser menor que :value.',
        'file' => 'O :attribute deve ser menor que :value kilobytes.',
        'string' => 'O :attribute deve ser menor que :value caracteres.',
        'array' => 'O :attribute deve ser menor que :value itens.',
    ],
    'lte' => [
        'numeric' => 'O :attribute deve ser menor ou igual :value.',
        'file' => 'O :attribute deve ser menor ou igual :value kilobytes.',
        'string' => 'O :attribute deve ser menor ou igual :value caracteres.',
        'array' => 'O :attribute não pode ter mais que :value itens.',
    ],
    'max' => [
        'numeric' => 'O :attribute não deve ser maior than :max.',
        'file' => 'O :attribute mnão deve ser maior than :max kilobytes.',
        'string' => 'O :attribute não deve ser maior than :max caracteres.',
        'array' => 'O :attribute não pode ter mais que :max items.',
    ],
    'mimes' => 'O :attribute deve ser um arquivo do tipo: :values.',
    'mimetypes' => 'O :attribute deve ser um arquivo do tipo: :values.',
    'min' => [
        'numeric' => 'O :attribute deve ser pelo menos :min.',
        'file' => 'O :attribute deve ser pelo menos :min kilobytes.',
        'string' => 'A :attribute deve ter pelo menos :min caracteres.',
        'array' => 'O :attribute deve ter pelo menos :min itens.',
    ],
    'multiple_of' => 'O :attribute deve ser um múltiplo de :value.',
    'not_in' => 'O selecionado :attribute é inválido.',
    'not_regex' => 'O :attribute formato é inválido.',
    'numeric' => 'O :attribute precisa ser um número.',
    'password' => 'A senha está incorreta.',
    'present' => 'O :attribute campo deve estar presente.',
    'regex' => 'O :attribute formato é inválido.',
    'required' => 'O :attribute campo é obrigatório.',
    'required_if' => 'O :attribute campo é obrigatório quando :other é :value.',
    'required_unless' => 'O :attribute campo é obrigatório, a menos que :other está entre :values.',
    'required_with' => 'O :attribute campo é obrigatório quando :values está presente.',
    'required_with_all' => 'O :attribute campo é obrigatório quando :values está presente.',
    'required_without' => 'O :attribute campo é obrigatório quando :values não está presente.',
    'required_without_all' => 'O :attribute campo é obrigatório quando nenhum :values está presente.',
    'prohibited' => 'O :attribute campo é proibido.',
    'prohibited_if' => 'O :attribute campo é proibido quando :other é :value.',
    'prohibited_unless' => 'O :attribute campo é proibido a menos :other está em :values.',
    'prohibits' => 'O :attribute campo proíbe :other de estar presente.',
    'same' => 'O :attribute e :other deve combinar.',
    'size' => [
        'numeric' => 'O :attribute deve ter :size.',
        'file' => 'O :attribute deve conter :size kilobytes.',
        'string' => 'O :attribute deve conter :size caracteres.',
        'array' => 'O :attribute precisa conter :size itens.',
    ],
    'starts_with' => 'O :attribute deve começar com um dos seguintes: :values.',
    'string' => 'O :attribute deve ser uma string.',
    'timezone' => 'O :attribute deve ser um fuso horário válido.',
    'unique' => 'O :attribute já existe.',
    'uploaded' => 'O :attribute falhou ao carregar.',
    'url' => 'O :attribute deve ser um URL válido.',
    'uuid' => 'O :attribute deve ser um UUID válido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'password' => 'senha',
        'email' => 'e-mail'
    ],

];
