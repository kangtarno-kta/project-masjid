<?php

return [

    /*
    |--------------------------------------------------------------------------
    | HTMLPurifier Configuration
    |--------------------------------------------------------------------------
    |
    | Konfigurasi utama HTMLPurifier untuk membersihkan HTML
    | yang berasal dari input pengguna.
    |
    */

    'encoding' => 'UTF-8',

    /*
    |--------------------------------------------------------------------------
    | Finalize
    |--------------------------------------------------------------------------
    |
    | Mengaktifkan proses finalisasi HTMLPurifier.
    |
    */

    'finalize' => true,

    /*
    |--------------------------------------------------------------------------
    | Cache Path
    |--------------------------------------------------------------------------
    |
    | Lokasi cache HTMLPurifier.
    |
    */

    'cachePath' => storage_path('app/purifier'),

    /*
    |--------------------------------------------------------------------------
    | Configurations
    |--------------------------------------------------------------------------
    |
    | Konfigurasi khusus jika diperlukan.
    |
    */

    'configs' => [],

    /*
    |--------------------------------------------------------------------------
    | Settings
    |--------------------------------------------------------------------------
    |
    | Pengaturan HTMLPurifier.
    |
    */

    'settings' => [

        /*
        |--------------------------------------------------------------------------
        | Editor Berita
        |--------------------------------------------------------------------------
        |
        | Hanya HTML yang diperlukan oleh editor berita yang diizinkan.
        | Tag dan atribut berbahaya akan dibuang oleh HTMLPurifier.
        |
        */

        'berita' => [

            /*
            |--------------------------------------------------------------------------
            | Doctype
            |--------------------------------------------------------------------------
            */

            'HTML.Doctype' => 'HTML 4.01 Transitional',

            /*
            |--------------------------------------------------------------------------
            | HTML yang diperbolehkan
            |--------------------------------------------------------------------------
            |
            | Hanya tag berikut yang boleh disimpan.
            |
            */

            'HTML.Allowed' =>
            'p,strong,em,i,u,h3,blockquote,ul,ol,li,br,' .
                'a[href|title|target]',

            /*
            |--------------------------------------------------------------------------
            | CSS yang diperbolehkan
            |--------------------------------------------------------------------------
            |
            | Hanya CSS sederhana yang diperlukan editor berita.
            |
            */

            'CSS.AllowedProperties' => [

                'text-align',
                'font-weight',
                'font-style',
                'text-decoration',

            ],

            /*
            |--------------------------------------------------------------------------
            | Keamanan Resource Eksternal
            |--------------------------------------------------------------------------
            |
            | Resource eksternal seperti gambar atau resource lainnya
            | tidak diperbolehkan.
            |
            */

            'URI.DisableExternalResources' => true,

            /*
            |--------------------------------------------------------------------------
            | Skema URL
            |--------------------------------------------------------------------------
            */

            'URI.AllowedSchemes' => [

                'http' => true,
                'https' => true,
                'mailto' => true,

            ],

            /*
            |--------------------------------------------------------------------------
            | Auto Format
            |--------------------------------------------------------------------------
            */

            'AutoFormat.AutoParagraph' => true,

            'AutoFormat.RemoveEmpty' => true,

        ],

    ],

];
