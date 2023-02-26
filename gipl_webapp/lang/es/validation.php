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

    'accepted' => 'El :attribute debe ser aceptado',
    'accepted_if' => 'El :attribute debe ser aceptado cuando :other es :value',
    'active_url' => 'El :attribute no es una URL válida',
    'after' => 'El :attribute debe ser una fecha posterior a :date',
    'after_or_equal' => 'El :attribute debe ser una fecha posterior o igual a :date',
    'alpha' => 'El :attribute sólo debe contener letras',
    'alpha_dash' => 'El :attribute sólo debe contener letras, números, guiones y guiones bajos',
    'alpha_num' => 'El :attribute sólo debe contener letras y números',
    'array' => 'El :attribute debe ser un array.',
    'ascii' => 'El :attribute sólo debe contener caracteres alfanuméricos y símbolos de un byte',
    'before' => 'El :attribute debe ser una fecha anterior a :date',
    'before_or_equal' => 'El :attribute debe ser una fecha anterior o igual a :date',
    'between' => [
        'array' => 'El :attribute debe tener entre :min y :max elementos.',
        'file' => 'El :attribute debe estar entre :min y :max kilobytes.',
        'numeric' => 'El :attribute debe estar entre :min y :max.',
        'string' => 'El :attribute debe tener entre :min y :max caracteres.',
    ],
    'boolean' => 'El campo :attribute debe ser verdadero o falso',
    'confirmed' => 'El :attribute confirmation no coincide',
    'current_password' => 'La contraseña es incorrecta',
    'date' => 'El :attribute no es una fecha válida',
    'date_equals' => 'El :attribute debe ser una fecha igual a :date.',
    'date_format' => 'El :attribute no coincide con el formato :format.',
    'decimal' => 'El :attribute debe tener decimales :decimal',
    'declined' => 'El :attribute debe ser declinado',
    'declined_if' => 'El :attribute debe ser declinado cuando :other es :value.',
    'different' => 'El :attribute y el :other deben ser diferentes',
    'digits' => 'El :attribute debe ser :digits dígitos',
    'digits_between' => 'El :attribute debe estar entre los dígitos :min y :max.',
    'dimensions' => 'El :attribute tiene dimensiones de imagen no válidas',
    'distinct' => 'El campo :attribute tiene un valor duplicado',
    'doesnt_end_with' => 'El :attribute no puede terminar con uno de los siguientes: :values.',
    'doesnt_start_with' => 'El :attribute no puede comenzar con uno de los siguientes: :values.',
    'email' => 'El :attribute debe ser una dirección de correo electrónico válida',
    'ends_with' => 'El :attribute debe terminar con uno de los siguientes: :values.',
    'enum' => 'El :attribute seleccionado no es válido',
    'exists' => 'El :attribute seleccionado no es válido',
    'file' => 'El :attribute debe ser un archivo',
    'filled' => 'El campo :attribute debe tener un valor.',
    'gt' => [
        'array' => 'El :attribute debe tener más elementos :value',
        'file' => 'El :atributo debe ser mayor que :valor kilobytes.',
        'numeric' => 'El :atributo debe ser mayor que :valor.',
        'string' => 'El :atributo debe tener más caracteres que :valor',
    ],
    'gte' => [
        'array' => 'El :attribute debe tener elementos :value o más.',
        'archivo' => 'El :attribute debe ser mayor o igual que :valor kilobytes.',
        'numeric' => 'El :atributo debe ser mayor o igual que :valor.',
        'string' => 'El :attribute debe ser mayor o igual que los caracteres :value',
    ],
    'image' => 'El :attribute debe ser una imagen',
    'in' => 'El :attribute seleccionado no es válido',
    'in_array' => 'El campo :attribute no existe en :other.',
    'integer' => 'El :attribute debe ser un número entero',
    'ip' => 'El :attribute debe ser una dirección IP válida',
    'ipv4' => 'El :attribute debe ser una dirección IPv4 válida',
    'ipv6' => 'El :attribute debe ser una dirección IPv6 válida',
    'json' => 'El :attribute debe ser una cadena JSON válida',
    'lowercase' => 'El :attribute debe estar en minúsculas',
    'lt' => [
        'array' => 'El :attribute debe tener menos elementos :value.',
        'archivo' => 'El :attribute debe ser inferior a :valor kilobytes.',
        'numeric' => 'El :atributo debe ser menor que :valor.',
        'string' => 'El :attribute debe tener menos caracteres que :value',
    ],
    'lte' => [
        'array' => 'El :attribute no debe tener más elementos que :value',
        'archivo' => 'El :attribute debe ser menor o igual que :valor kilobytes.',
        'numeric' => 'El :atributo debe ser menor o igual que :valor.',
        'string' => 'El :attribute debe ser menor o igual que los caracteres :value',
    ],
    'mac_address' => 'El :attribute debe ser una dirección MAC válida',
    'max' => [
        'array' => 'El :attribute no debe tener más elementos que :max.',
        'file' => 'El :attribute no debe ser mayor que :max kilobytes.',
        'numeric' => 'El :attribute no debe ser mayor que :max.',
        'string' => 'El :attribute no debe tener más caracteres que :max.',
    ],
    'max_digits' => 'El :attribute no debe tener más de :max dígitos',
    'mimes' => 'El :attribute debe ser un archivo de tipo: :values.',
    'mimetypes' => 'El :attribute debe ser un archivo de tipo: :values.',
    'min' => [
        'array' => 'El :attribute debe tener al menos elementos :min.',
        'file' => 'El :attribute debe ser de al menos :min kilobytes.',
        'numeric' => 'El :attribute debe ser al menos :min.',
        'string' => 'El :attribute debe tener al menos :min caracteres.',
    ],
    'min_digits' => 'El :attribute debe tener al menos dígitos :min.',
    'multiple_of' => 'El :atributo debe ser múltiplo de :valor',
    'not_in' => 'El :attribute seleccionado no es válido',
    'not_regex' => 'El formato :attribute no es válido.',
    'numeric' => 'El :attribute debe ser un número.',
    'password' => [
        'letters' => 'El :attribute debe contener al menos una letra.',
        'mixed' => 'El :attribute debe contener al menos una letra mayúscula y una minúscula',
        'numbers' => 'El :attribute debe contener al menos un número.',
        'symbols' => 'El :attribute debe contener al menos un símbolo',
        'uncompromised' => 'El :atributo dado ha aparecido en una fuga de datos. Por favor, elija un :attribute diferente',
    ],
    'present' => 'El campo :attribute debe estar presente',
    'prohibited' => 'El campo :attribute está prohibido',
    'prohibited_if' => 'El campo :attribute está prohibido cuando :other es :value',
    'prohibited_unless' => 'El campo :attribute está prohibido a menos que :other esté en :values',
    'prohibits' => 'El campo :attribute prohíbe la presencia de :other',
    'regex' => 'El formato :attribute no es válido.',
    'required' => 'El campo :attribute es obligatorio',
    'required_array_keys' => 'El campo :attribute debe contener entradas para: :values.',
    'required_if' => 'El campo :attribute es obligatorio cuando :other es :value.',
    'required_if_accepted' => 'El campo :attribute es obligatorio cuando se acepta :other',
    'required_unless' => 'El campo :attribute es obligatorio a menos que :other esté en :values.',
    'required_with' => 'El campo :attribute es obligatorio cuando :values está presente.',
    'required_with_all' => 'El campo :attribute es obligatorio cuando :values está presente.',
    'required_without' => 'El campo :attribute es obligatorio cuando :values no está presente.',
    'required_without_all' => 'El campo :attribute es obligatorio cuando no está presente ninguno de :values.',
    'same' => 'El :attribute y :other deben coincidir',
    'size' => [
        'array' => 'El :attribute debe contener elementos :size.',
        'file' => 'El :attribute debe ser :size kilobytes.',
        'numeric' => 'El :attribute debe ser :size.',
        'string' => 'El :attribute debe tener :size caracteres de longitud.',
    ],
    'starts_with' => 'El :attribute debe comenzar con uno de los siguientes: :values.',
    'string' => 'El :attribute debe ser una cadena.',
    'timezone' => 'El :attribute debe ser una zona horaria válida',
    'unique' => 'El :attribute ya se está usando',
    'uploaded' => 'No se ha podido cargar el :attribute .',
    'uppercase' => 'El :attribute debe estar en mayúsculas',
    'url' => 'El :attribute debe ser una URL válida',
    'ulid' => 'El :attribute debe ser un ULID válido',
    'uuid' => 'El :attribute debe ser un UUID válido',


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
