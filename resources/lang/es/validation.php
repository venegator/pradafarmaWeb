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

    'accepted'             => ':attribute debe ser aceptado.',
    'active_url'           => ':attribute no es una URL válida.',
    'after'                => ':attribute debe ser una fecha después de :date.',
    'after_or_equal'       => ':attribute debe ser una fecha después o igual a :date.',
    'alpha'                => ':attribute solo debe contener letras.',
    'alpha_dash'           => ':attribute solo debe contener letras, números y guiones.',
    'alpha_num'            => ':attribute solo debe contener letras y números.',
    'array'                => ':attribute debe ser un array.',
    'before'               => ':attribute debe ser una fecha antes de :date.',
    'before_or_equal'      => ':attribute debe ser una fecha antes o igual a :date.',
    'between'              => [
        'numeric' => ':attribute debe estar entre :min y :max.',
        'file'    => ':attribute debe estar entre :min y :max kilobytes.',
        'string'  => ':attribute debe estar entre :min y :max caracteres.',
        'array'   => ':attribute de tener entre :min y :max items.',
    ],
    'boolean'              => ':attribute debe ser verdadero o falso.',
    'confirmed'            => 'La confirmación de :attribute no es válida.',
    'date'                 => ':attribute no es una fecha válida.',
    'date_format'          => ':attribute no corresponde al formato :format.',
    'different'            => ':attribute y :other deben ser diferentes.',
    'digits'               => ':attribute debe ser :digits dígitos.',
    'digits_between'       => ':attribute debe ser entre :min y :max dígitos.',
    'dimensions'           => ':Las dimensiones de la imagen attribute no son válidas.',
    'distinct'             => ':attribute tiene un valor duplicado.',
    'email'                => ':attribute debe ser una dirección de correo válida.',
    'exists'               => 'El atributo seleccionado :attribute no es válido.',
    'file'                 => 'El campo :attribute debe ser un archivo.',
    'filled'               => ':attribute debe tener un valor.',
    'image'                => 'El campo :attribute debe ser una imagen.',
    'in'                   => 'El campo seleccionado :attribute no es válido.',
    'in_array'             => ':attribute no existe en :other.',
    'integer'              => ':attribute debe ser un integer.',
    'ip'                   => ':attribute debe ser una dirección IP válida.',
    'ipv4'                 => ':attribute debe ser una dirección IPv4 válida.',
    'ipv6'                 => ':attribute debe ser una dirección IPv6 válida.',
    'json'                 => ':attribute debe ser un JSON válido.',
    'max'                  => [
        'numeric' => ':attribute no debe ser mayor de :max.',
        'file'    => ':attribute no debe ser mayor de :max kilobytes.',
        'string'  => ':attribute no debe ser mayor de :max caracteres.',
        'array'   => ':attribute no debe tener más de :max items.',
    ],
    'mimes'                => ':attribute debe ser un archivo de tipo: :values.',
    'mimetypes'            => ':attribute debe ser un archivo de tipo: :values.',
    'min'                  => [
        'numeric' => ':attribute debe ser al menos :min.',
        'file'    => ':attribute debe ser al menos :min kilobytes.',
        'string'  => ':attribute debe ser al menos :min characters.',
        'array'   => ':attribute debe tener al menos :min items.',
    ],
    'not_in'               => ':attribute no es válido.',
    'numeric'              => ':attribute debe ser un número.',
    'present'              => ':attribute debe estar presente.',
    'regex'                => 'El formato de :attribute no es válido.',
    'required'             => 'Debe rellenar el campo :attribute.',
    'required_if'          => ':attribute field is required when :other is :value.',
    'required_unless'      => ':attribute field is required unless :other is in :values.',
    'required_with'        => ':attribute field is required when :values is present.',
    'required_with_all'    => ':attribute field is required when :values is present.',
    'required_without'     => ':attribute field is required when :values is not present.',
    'required_without_all' => ':attribute field is required when none of :values are present.',
    'same'                 => ':attribute and :other must match.',
    'size'                 => [
        'numeric' => ':attribute must be :size.',
        'file'    => ':attribute must be :size kilobytes.',
        'string'  => ':attribute must be :size characters.',
        'array'   => ':attribute must contain :size items.',
    ],
    'string'               => ':attribute debe ser un string.',
    'timezone'             => ':attribute debe ser una zona válida.',
    'unique'               => ':attribute ya está en uso.',
    'uploaded'             => ':attribute falló al subirse.',
    'url'                  => 'El formado de :attribute. no es válido.',

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
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
