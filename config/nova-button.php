<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Global defaults
    |--------------------------------------------------------------------------
    |
    | This package makes a few assumptions for initial global settings.
    | Edit these values if you want the global defaults to be different.
    |
    */

    'defaults' => [
        'style' => 'link-primary',
        'loadingStyle' => 'link-grey',
        'loadingText' => 'Loading',
        'successStyle' => 'link-success',
        'successText' => 'Success',
        'errorStyle' => 'link-danger',
        'errorText' => 'Failed',
    ],

    /*
    |--------------------------------------------------------------------------
    | Style options
    |--------------------------------------------------------------------------
    |
    | These styles are all the styles that can be used in the frontend. You are
    | free to add, edit or delete to your likings.
    |
    | The CSS classes below come from Tailwind CSS, which is shipped with Nova.
    |
    */

    'styles' => [
        // Fill
        'success' => 'cursor-pointer p-2 rounded bg-green-500 text-white font-bold',
        'primary' => 'cursor-pointer p-2 rounded bg-gray-50 text-black font-bold',
        'warning' => 'cursor-pointer p-2 rounded bg-yellow-500 text-white font-bold',
        'danger' => 'cursor-pointer p-2 rounded bg-red-500 text-white font-bold',
        'info' => 'cursor-pointer p-2 rounded bg-blue-500 text-white font-bold',
        'grey' => 'cursor-pointer p-2 rounded bg-gray-500 text-white font-bold',

        // Outline
        'success-outline' => 'cursor-pointer p-2 rounded bg-green-500 text-white font-bold border-2',
        'primary-outline' => 'cursor-pointer p-2 rounded bg-gray-50 text-black font-bold border-2',
        'warning-outline' => 'cursor-pointer p-2 rounded bg-yellow-500 text-white font-bold border-2',
        'danger-outline' => 'cursor-pointer p-2 rounded bg-red-500 text-white font-bold border-2',
        'info-outline' => 'cursor-pointer p-2 rounded bg-blue-500 text-white font-bold border-2',
        'gray-outline' => 'cursor-pointer p-2 rounded bg-gray-500 text-white font-bold border-2',

        // Link
        'success-link' => 'cursor-pointer dim inline-block text-green-500 font-bold',
        'primary-link' => 'cursor-pointer dim inline-block text-gray-50 font-bold',
        'warning-link' => 'cursor-pointer dim inline-block text-yellow-500 font-bold',
        'danger-link' => 'cursor-pointer dim inline-block text-red-500 font-bold btn',
        'info-link' => 'cursor-pointer dim inline-block text-blue-500 font-bold btn',
        'grey-link' => 'cursor-pointer dim inline-block text-gray-500 font-bold btn',

        // Custom
        'custom' => 'bg-green-500',
    ],
];
