<?php

return [
    /**
     * DataTables search options.
     */
    'search'          => [
        /**
         * Smart search will enclose search keyword with wildcard string "%keyword%".
         * SQL: column LIKE "%keyword%"
         */
        'smart'            => true,

        /**
         * Case insensitive will search the keyword in lower case format.
         * SQL: LOWER(column) LIKE LOWER(keyword)
         */
        'case_insensitive' => true,

        /**
         * Wild card will add "%" in between every characters of the keyword.
         * SQL: column LIKE "%k%e%y%w%o%r%d%"
         */
        'use_wildcards'    => false,
    ],

    /**
     * DataTables fractal configurations.
     */
    'fractal'         => [
        /**
         * Request key name to parse includes on fractal.
         */
        'includes'   => 'include',

        /**
         * Default fractal serializer.
         */
        'serializer' => 'League\Fractal\Serializer\DataArraySerializer',
    ],

    /**
     * DataTables script view template.
     */
    'script_template' => 'datatables::script',

    /**
     * DataTables internal index id response column name.
     */
    'index_column'    => 'DT_Row_Index',

    /**
     * Namespaces used by the generator.
     */
    'namespace'       => [
        /**
         * Base namespace/directory to create the new file.
         * This is appended on default Laravel namespace.
         * Usage: php artisan datatables:make User
         * Output: App\DataTables\UserDataTable
         * With Model: App\User (default model)
         * Export filename: users_timestamp
         */
        'base'  => 'DataTables',

        /**
         * Base namespace/directory where your model's are located.
         * This is appended on default Laravel namespace.
         * Usage: php artisan datatables:make Post --model
         * Output: App\DataTables\PostDataTable
         * With Model: App\Post
         * Export filename: posts_timestamp
         */
        'model' => '',
    ],

    /**
     * PDF generator to be used when converting the table to pdf.
     * Available generators: excel, snappy
     * Snappy package: barryvdh/laravel-snappy
     * Excel package: maatwebsite/excel
     */
    'pdf_generator'   => 'excel',

    /**
     * Snappy PDF options.
     */
    'snappy'          => [
        'options'     => [
            'no-outline'    => true,
            'margin-left'   => '0',
            'margin-right'  => '0',
            'margin-top'    => '10mm',
            'margin-bottom' => '10mm',
        ],
        'orientation' => 'landscape',
    ],

    'columns' => [
        /*
         * List of columns hidden/removed on json response.
         */
        'excess' => ['rn', 'row_num'],

        /*
         * List of columns to be escaped. If set to *, all columns are escape.
         * Note: You can set the value to empty array to disable XSS protection.
         */
        'escape' => '*',

        /*
         * List of columns that are allowed to display html content.
         * Note: Adding columns to list will make us available to XSS attacks.
         */
        'raw' => ['action', 'status', 'mixed', 'verified', 'complete', 'paid', 'driver'],

        /*
         * List of columns are are forbidden from being searched/sorted.
         */
        'blacklist' => ['password', 'remember_token'],

        /*
         * List of columns that are only allowed fo search/sort.
         * If set to *, all columns are allowed.
         */
        'whitelist' => '*',
    ],
];
