<?php

return [

    'error_message' => 'Datos inválidos',

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages.
    |
    */

    'accepted'             => ':attribute debe ser aceptado.',
    'active_url'           => ':attribute no es una URL válida.',
    'after'                => ':attribute debe ser una fecha posterior a :date.',
    'after_or_equal'       => ':attribute debe ser una fecha posterior o igual a :date.',
    'alpha'                => ':attribute sólo debe contener letras.',
    'alpha_dash'           => ':attribute sólo debe contener letras, números y guiones.',
    'alpha_num'            => ':attribute sólo debe contener letras y números.',
    'array'                => ':attribute debe ser un conjunto.',
    'before'               => ':attribute debe ser una fecha anterior a :date.',
    'before_or_equal'      => ':attribute debe ser una fecha anterior o igual a :date.',
    'between'              => [
        'numeric' => ':attribute tiene que estar entre :min - :max.',
        'file'    => ':attribute debe pesar entre :min - :max kilobytes.',
        'string'  => ':attribute tiene que tener entre :min - :max caracteres.',
        'array'   => ':attribute tiene que tener entre :min - :max ítems.',
    ],
    'boolean'              => 'El campo :attribute debe tener un valor verdadero o falso.',
    'confirmed'            => 'La confirmación de :attribute no coincide.',
    'date'                 => ':attribute no es una fecha válida.',
    'date_format'          => ':attribute no corresponde al formato :format.',
    'different'            => ':attribute y :other deben ser diferentes.',
    'digits'               => ':attribute debe tener :digits dígitos.',
    'digits_between'       => ':attribute debe tener entre :min y :max dígitos.',
    'dimensions'           => 'Las dimensiones de la imagen :attribute no son válidas.',
    'distinct'             => 'El campo :attribute contiene un valor duplicado.',
    'email'                => ':attribute no es un correo válido',
    'exists'               => ':attribute es inválido.',
    'file'                 => 'El campo :attribute debe ser un archivo.',
    'filled'               => 'El campo :attribute es obligatorio.',
    'image'                => ':attribute debe ser una imagen.',
    'in'                   => ':attribute es inválido.',
    'in_array'             => 'El campo :attribute no existe en :other.',
    'integer'              => ':attribute debe ser un número entero.',
    'ip'                   => ':attribute debe ser una dirección IP válida.',
    'ipv4'                 => ':attribute debe ser un dirección IPv4 válida',
    'ipv6'                 => ':attribute debe ser un dirección IPv6 válida.',
    'json'                 => 'El campo :attribute debe tener una cadena JSON válida.',
    'max'                  => [
        'numeric' => ':attribute no debe ser mayor a :max.',
        'file'    => ':attribute no debe ser mayor que :max kilobytes.',
        'string'  => ':attribute no debe ser mayor que :max caracteres.',
        'array'   => ':attribute no debe tener más de :max elementos.',
    ],
    'mimes'                => ':attribute debe ser un archivo con formato: :values.',
    'mimetypes'            => ':attribute debe ser un archivo con formato: :values.',
    'min'                  => [
        'numeric' => 'El tamaño de :attribute debe ser de al menos :min.',
        'file'    => 'El tamaño de :attribute debe ser de al menos :min kilobytes.',
        'string'  => ':attribute debe contener al menos :min caracteres.',
        'array'   => ':attribute debe tener al menos :min elementos.',
    ],
    'not_in'               => ':attribute es inválido.',
    'numeric'              => ':attribute debe ser numérico.',
    'not_regex'            => 'El formato de :attribute no es válido',
    'present'              => 'El campo :attribute debe estar presente.',
    'regex'                => 'El formato de :attribute es inválido.',
    'required'             => 'El campo :attribute es obligatorio.',
    'required_if'          => 'El campo :attribute es obligatorio cuando :other es :value.',
    'required_unless'      => 'El campo :attribute es obligatorio a menos que :other esté en :values.',
    'required_with'        => 'El campo :attribute es obligatorio cuando :values está presente.',
    'required_with_all'    => 'El campo :attribute es obligatorio cuando :values está presente.',
    'required_without'     => 'El campo :attribute es obligatorio cuando :values no está presente.',
    'required_without_all' => 'El campo :attribute es obligatorio cuando ninguno de :values estén presentes.',
    'same'                 => ':attribute y :other deben coincidir.',
    'size'                 => [
        'numeric' => 'El tamaño de :attribute debe ser :size.',
        'file'    => 'El tamaño de :attribute debe ser :size kilobytes.',
        'string'  => ':attribute debe contener :size caracteres.',
        'array'   => ':attribute debe contener :size elementos.',
    ],
    'string'               => 'El campo :attribute debe ser una cadena de caracteres.',
    'timezone'             => 'El :attribute debe ser una zona válida.',
    'unique'               => ':attribute ya ha sido registrado.',
    'uploaded'             => 'Subir :attribute ha fallado.',
    'url'                  => 'El formato :attribute es inválido.',

    'minLength' => 'El campo :attribute debe ser de :size caracteres',
    'sameAs' => 'La confirmación no coincide',

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
        'password' => [
            'min' => 'La :attribute debe contener más de :min caracteres',
        ],
        'email' => [
            'unique' => 'El :attribute ya ha sido registrado.',
        ],
    ],

    'iban' => 'El IBAN es inválido',
    'cif' => 'El CIF es inválido',
    'nif' => 'El NIF es inválido',
    'nie' => 'El NIE es inválido',
    'password' => 'Password debe tener mínimo 6 caracteres, con al menos un dígito, una letra mayúscula, una letra minúscula y un símbolo especial',

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

    'attributes' => [
        'actions' => 'Acciones',

        'created_at' => 'Creado en',

        'id' => 'ID',
        'name' => 'Nombre',
        'role_id' => 'Rol',
        'groups' => 'Grupos',
        'provider_id' => 'Proveedor',
        'holding_id' => 'Holding',
        'nick' => 'Nick',
        'email' => 'Email',
        'password' => 'Contraseña',
        'password_confirmation' => 'Confirmar contraseña',

        'user_id' => 'Usuario',
        'country_id' => 'País',
        'province_id' => 'Provincia',
        'locality' => 'Localidad',
        'address' => 'Dirección',
        'address.address' => 'Dirección',
        'postcode' => 'Código postal',
        'invalid_postcode' => 'Código postal inválido',
        'phone' => 'Teléfono',
        'mobile' => 'Móvil',
        'address_type_id' => 'Tipo de Dirección',
        'web' => 'Web',
        'fax' => 'Fax',

        'accounting_numbers' => 'Cuentas Contables',

        'name_fiscal' => 'Nombre Fiscal',
        'cif' => 'CIF',
        'cif_fiscal' => 'CIF Fiscal',
        'exported' => 'Exportado',
        'a3com' => 'Exportado a A3Com',
        'max_risk' => 'Riesgo máximo',
        'origin_code' => 'Código de origen',
        'external_account' => 'Número Externo',
        'client_type_id' => 'Tipo de Cliente',
        'payment_type_id' => 'Forma de Pago',
        'catcher_id' => 'Usuario captación',
        'address_id' => 'Principal',
        'fiscal_address_id' => 'Fiscal',
        'deleted_at' => 'Fecha de Eliminación',
        'deleted' => 'Eliminado',
        'comments' => 'Comentarios',

        'position' => 'Cargo',

        'content' => 'Contenido',
        'log_level_id' => 'Nivel de Log',

        'file' => 'Archivo',
        'attachment' => 'Adjunto',

        'send_mail_invoice' => 'Enviar email de factura',
        'print_discounts' => 'Imprimir descuentos',
        'active_appraisals' => 'Activar tasaciones',
        'active_pdf' => 'Activar PDF',
        'active_sending_appraisements' => 'Activar envío de tasaciones',
        'active_sending_auth' => 'Activar envíos de autorización',
        'communications_email' => 'Email de Comunicaciones',
        'communications_email_1' => 'Email de Comunicaciones 1',
        'communications_email_2' => 'Email de Comunicaciones 2',
        'destruction_email' => 'Email de Siniestros',
        'imp_auth_disassembly' => 'Importe Autorización de Desmontaje',
        'imp_auth_repair' => 'Importe Autorización de Reparación',
        'imp_km' => 'Importe por KM',
        'imp_photo' => 'Importe por Foto',
        'imp_diets' => 'Importe por Dietas',
        'gt_client_id' => 'Cliente GT',

        'intervention_type_id' => 'Tipo de Intervención',
        'fixed_imp' => 'Importe Fijo',
        'bill_imp' => 'Importe Minuta',
        'service_imp' => 'Importe Servicio',
        'collaborator_imp' => 'Importe Colaborador',

        'accounting_account_id' => 'Cuenta Contable',
        'canary_accounting_account_id' => 'Cuenta Contable de Canarias',
        'tax_id' => 'Impuesto',
        'tax_type_id' => 'Tipo de Impuesto',
        'billing_type_id' => 'Tipo de Facturación',
        'description' => 'Descripción',
        'iban' => 'IBAN',
        'account_number' => 'Número de Cuenta',

        'client_id' => 'Cliente',

        'longitude' => 'Longitud',
        'latitude' => 'Latitud',
        'vehicles_amount' => 'Número de Vehículos Máximo',
        'holidays_saturation' => 'Vacaciones - Saturación',
        'user_extranet' => 'Usuario de Extranet',
        'pass_extranet' => 'Contraseña de Extranet',

        'provinces' => 'Provincias',
        'holdings' => 'Holdings',
        'vehicle_brands' => 'Marcas de Vehículo',
        'vehicle_models' => 'Modelos de Vehículo',

        'garage_networks' => 'Redes de Talleres',
        'garage_network_id' => 'Red de Taller',

        'garage_external_id' => 'ID Taller Externo',

        'date_range' => 'Rango de Fechas',
        'start_date' => 'Fecha de Inicio',
        'end_date' => 'Fecha Fin',

        'expert_office_id' => 'Gabinete',
        'expert_office' => 'Gabinete', // boolean
        'replacement_type_id' => 'Tipo de Recambio',
        'provider_account_id' => 'Cuenta de Proveedor',
        'user_gt' => 'Usuario GT',
        'pass_gt' => 'Password GT',

        'service_category_id' => 'Categoría de Servicio',
        'service_subcategory_id' => 'Subcategoría de Servicio',

        'general_state_id' => 'Estado General',
        'status_code_id' => 'Código de Estado',
        'code' => 'Código',
        'vehicle_brand_id' => 'Marca',
        'vehicle_model_id' => 'Modelo',
        'expert_id' => 'Perito',
        'garage_id' => 'Taller',
        'franchise_id' => 'Franquicia',
        'coverage_id' => 'Cobertura',
        'origin_budget_id' => 'Origen de Presupuesto',
        'office_id' => 'Oficina',
        'file_number' => 'Expediente',
        'budget_code' => 'Código de Presupuesto',
        'closing_date' => 'Fecha de cierre',
        'expert_date' => 'Fecha de Peritación',
        'policy_number' => 'Número de Póliza',
        'repair_authorization_number' => 'Nº Autorización de Reparación',
        'rid' => 'RID',
        'destruction_number' => 'Número de Siniestro',
        'plate' => 'Matrícula',
        'km' => 'Kilómetros',
        'vin' => 'Nº de Bastidor',
        'version' => 'Versión',
        'motor_code' => 'Código de Motor',
        'damages' => 'Daños',
        'venal_price' => 'Precio Venal',
        'transfer_distance' => 'Distancia de Desplazamiento',
        'accident_place' => 'Lugar de Accidente',
        'accident_version' => 'Versión del Accidente',
        'accident_date' => 'Fecha del Accidente',
        'estimated_reparation_days' => 'Tiempo estimado de Reparación',
        'technical_report' => 'Informe Técnico',
        'notes' => 'Notas',

        'vehicle_at_risk' => 'Vehículo a Riesgo',
        'commitment' => 'Compromiso',
        'structural_damages' => 'Daños Estructurales',
        'charge_to_other_companies' => 'Cargo a otras Compañías',
        'pending_budget' => 'Presupuesto Pendiente',
        'external_expert' => 'Perito Externo',
        'expert_rated' => 'Minutado por Perito',
        'not_located' => 'No Localizado',
        'urgent_reparation' => 'Reparación Urgente',
        'europcar_payment' => 'Pago a Europcar',

        'operations' => 'Operaciones',
        'operation_id' => 'Operación',
        'operation_value_id' => 'Valor',

        'status' => 'Estado',
        'previous_status' => 'Estado Anterior',
        'net_amount' => 'Importe Neto',

        'filename' => 'Nombre de fichero'
    ],
];
