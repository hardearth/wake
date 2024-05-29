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

    "accepted" => "El atributo :attribute debe ser aceptado.",
    "accepted_if" => "El atributo :attribute debe ser aceptado cuando :other es :value.",
    "active_url" => "El atributo :attribute no es una URL válida.",
    "after" => "El atributo :attribute debe ser una fecha posterior a :date.",
    "after_or_equal" => "El atributo :attribute debe ser una fecha posterior o igual a :date.",
    "alpha" => "El atributo :attribute solo debe contener letras.",
    "alpha_dash" => "El atributo :attribute solo debe contener letras, números, guiones y subrayados.",
    "alpha_num" => "El atributo :attribute solo debe contener letras y números.",
    "array" => "El atributo :attribute debe ser una matriz.",
    "ascii" => "El atributo :attribute solo debe contener caracteres alfanuméricos de un byte y símbolos.",
    "before" => "El atributo :attribute debe ser una fecha anterior a :date.",
    "before_or_equal" => "El atributo :attribute debe ser una fecha anterior o igual a :date.",
    "between" => [
        "array" => "El atributo :attribute debe tener entre :min y :max elementos.",
        "file" => "El atributo :attribute debe estar entre :min y :max kilobytes.",
        "numeric" => "El atributo :attribute debe estar entre :min y :max.",
        "string" => "El atributo :attribute debe tener entre :min y :max caracteres.",
    ],
    "boolean" => "El campo atributo :attribute debe ser verdadero o falso.",
    "confirmed" => "La confirmación del atributo :attribute no coincide.",
    "current_password" => "La contraseña es incorrecta.",
    "date" => "El atributo :attribute no es una fecha válida.",
    "date_equals" => "El atributo :attribute debe ser una fecha igual a :date.",
    "date_format" => "El atributo :attribute no coincide con el formato :format.",
    "decimal" => "El atributo :attribute debe tener :decimal lugares decimales.",
    'declined' => 'El atributo :attribute debe ser rechazado.',
    'declined_if' => 'El atributo :attribute debe ser rechazado cuando :other es :value.',
    'different' => 'El atributo :attribute y :other deben ser diferentes.',
    'digits' => 'El atributo :attribute debe tener :digits dígitos.',
    'digits_between' => 'El atributo :attribute debe tener entre :min y :max dígitos.',
    'dimensions' => 'El atributo :attribute tiene dimensiones de imagen inválidas.',
    'distinct' => 'El campo de atributo :attribute tiene un valor duplicado.',
    'doesnt_end_with' => 'El atributo :attribute no puede terminar con uno de los siguientes: :values.',
    'doesnt_start_with' => 'El atributo :attribute no puede comenzar con uno de los siguientes: :values.',
    'email' => 'El atributo :attribute debe ser una dirección de correo electrónico válida.',
    'ends_with' => 'El atributo :attribute debe terminar con uno de los siguientes: :values.',
    'enum' => 'El atributo seleccionado :attribute es inválido.',
    'exists' => 'El atributo seleccionado :attribute es inválido.',
    'file' => 'El atributo :attribute debe ser un archivo.',
    'filled' => 'El campo de atributo :attribute debe tener un valor.',
    'gt' => [
        'array' => 'El atributo :attribute debe tener más de :value elementos.',
        'file' => 'El atributo :attribute debe ser mayor a :value kilobytes.',
        'numeric' => 'El atributo :attribute debe ser mayor a :value.',
        'string' => 'El atributo :attribute debe tener más de :value caracteres.',
    ],
    'gte' => [
        'array' => 'El atributo :attribute debe tener :value elementos o más.',
        'file' => 'El atributo :attribute debe ser mayor o igual a :value kilobytes.',
        'numeric' => 'El atributo :attribute debe ser mayor o igual a :value.',
        'string' => 'El atributo :attribute debe tener :value caracteres o más.',
    ],
    'image' => 'El atributo :attribute debe ser una imagen.',
    'in' => 'El atributo seleccionado :attribute no es válido.',
    'in_array' => 'El campo atributo :attribute no existe en :other.',
    'integer' => 'El atributo :attribute debe ser un entero.',
    'ip' => 'El atributo :attribute debe ser una dirección IP válida.',
    'ipv4' => 'El atributo :attribute debe ser una dirección IPv4 válida.',
    'ipv6' => 'El atributo :attribute debe ser una dirección IPv6 válida.',
    'json' => 'El atributo :attribute debe ser una cadena JSON válida.',
    'lowercase' => 'El atributo :attribute debe estar en minúsculas.',
    'lt' => [
        'array' => 'El atributo :attribute debe tener menos de :value elementos.',
        'file' => 'El atributo :attribute debe tener menos de :value kilobytes.',
        'numeric' => 'El atributo :attribute debe ser menor que :value.',
        'string' => 'El atributo :attribute debe tener menos de :value caracteres.',
    ],
    'lte' => [
        'array' => 'El atributo :attribute no debe tener más de :value elementos.',
        'file' => 'El atributo :attribute debe ser menor o igual a :value kilobytes.',
        'numeric' => 'El atributo :attribute debe ser menor o igual a :value.',
        'string' => 'El atributo :attribute debe tener menos o igual a :value caracteres.',
    ],
    'mac_address' => 'El atributo :attribute debe ser una dirección MAC válida.',
    'max' => [
        'array' => 'El atributo :attribute no debe tener más de :max elementos.',
        'file' => 'El atributo :attribute no debe ser mayor a :max kilobytes.',
        'numeric' => 'El atributo :attribute no debe ser mayor a :max.',
        'string' => 'El atributo :attribute no debe tener más de :max caracteres.',
    ],
    'max_digits' => 'El atributo :attribute no debe tener más de :max dígitos.',
    'mimes' => 'El atributo :attribute debe ser un archivo de tipo: :values.',
    'mimetypes' => 'El atributo :attribute debe ser un archivo de tipo: :values.',
    'min' => [
        'array' => 'El atributo :attribute debe tener al menos :min elementos.',
        'file' => 'El atributo :attribute debe tener al menos :min kilobytes.',
        'numeric' => 'El atributo :attribute debe ser al menos :min.',
        'string' => 'El atributo :attribute debe tener al menos :min caracteres.',
    ],
    'min_digits' => 'El atributo :attribute debe tener al menos :min dígitos.',
    'multiple_of' => 'El atributo :attribute debe ser un múltiplo de :value.',
    'not_in' => 'El atributo seleccionado :attribute no es válido.',
    'not_regex' => 'El formato del atributo :attribute no es válido.',
    'numeric' => 'El atributo :attribute debe ser un número.',
    'password' => [
        'letters' => 'El atributo :attribute debe contener al menos una letra.',
        'mixed' => 'El atributo :attribute debe contener al menos una letra mayúscula y una letra minúscula.',
        'numbers' => 'El atributo :attribute debe contener al menos un número.',
        'symbols' => 'El atributo :attribute debe contener al menos un símbolo.',
        'uncompromised' => 'El atributo :attribute dado ha aparecido en una fuga de datos. Por favor elige un atributo diferente.',
    ],
    'present' => 'El campo :attribute debe estar presente.',
    'prohibited' => 'El campo :attribute está prohibido.',
    'prohibited_if' => 'El campo :attribute está prohibido cuando :other es :value.',
    'prohibited_unless' => 'El campo :attribute está prohibido a menos que :other esté en :values.',
    'prohibits' => 'El campo :attribute prohíbe que :other esté presente.',
    'regex' => 'El formato del campo :attribute es inválido.',
    'required' => 'El campo :attribute es requerido.',
    'required_array_keys' => 'El campo :attribute debe contener entradas para: :values.',
    'required_if' => 'El campo :attribute es requerido cuando :other es :value.',
    'required_if_accepted' => 'El campo :attribute es requerido cuando :other es aceptado.',
    'required_unless' => 'El campo :attribute es requerido a menos que :other esté en :values.',
    'required_with' => 'El campo :attribute es requerido cuando :values está presente.',
    'required_with_all' => 'El campo :attribute es requerido cuando :values están presentes.',
    'required_without' => 'El campo :attribute es requerido cuando :values no está presente.',
    'required_without_all' => 'El campo :attribute es requerido cuando ninguno de :values está presente.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'array' => 'The :attribute must contain :size items.',
        'file' => 'The :attribute must be :size kilobytes.',
        'numeric' => 'The :attribute must be :size.',
        'string' => 'The :attribute must be :size characters.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string' => 'The :attribute must be a string.',
    'timezone' => 'The :attribute must be a valid timezone.',
    'unique' => 'The :attribute has already been taken.',
    'uploaded' => 'The :attribute failed to upload.',
    'uppercase' => 'The :attribute must be uppercase.',
    'url' => 'The :attribute must be a valid URL.',
    'ulid' => 'The :attribute must be a valid ULID.',
    'uuid' => 'The :attribute must be a valid UUID.',

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

    'attributes' => [],

];
