<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class SettingHelper
{
    public static function defaultImage()
    {
        return Storage::url('images/general/default-image.webp');
    }

    public static function descSite()
    {
        return 'Zakatel adalah sebuah lembaga nir laba yang mengelola zakat, infak, shodaqoh, dan wakaf dan mendistribusikannya kepada yang berhak sesuai syariat Islam.';
    }

    public static function convert($content)
    {
        $classConversion = [
            // Aliases
            'ql-align-center' => 'text-center',
            'ql-align-right' => 'text-right',
            'ql-align-justify' => 'text-justify',
            'ql-font-serif' => 'font-serif',
            'ql-font-monospace' => 'font-mono',
            'ql-clean' => 'prose', // Tailwind prose class for general text styling

            // Font Sizes
            'ql-size-small' => 'text-xs',
            'ql-size-large' => 'text-lg',
            'ql-size-huge' => 'text-4xl',

            // Text Styles
            'ql-bold' => 'font-bold',
            'ql-italic' => 'italic',
            'ql-underline' => 'underline',
            'ql-strike' => 'line-through',

            // Text Colors
            'ql-color-red' => 'text-red-500',
            'ql-color-green' => 'text-green-500',
            'ql-color-blue' => 'text-blue-500',
            // ...

            // Background Colors
            'ql-bg-red' => 'bg-red-500',
            'ql-bg-green' => 'bg-green-500',
            'ql-bg-blue' => 'bg-blue-500',
            // ...

            // List Styles
            'ql-list' => 'list-disc',
            'ql-bullet' => 'list-disc',
            'ql-indent-1' => 'pl-4',
            'ql-indent-2' => 'pl-8',
            // ...

            // Others - Example: Link
            'ql-link' => 'text-blue-500 underline hover:no-underline hover:text-blue-700',
        ];

        // Penanganan khusus untuk tag-list
        $content = str_replace('<ol>', '<ol class="list-decimal pl-4">', $content);
        $content = str_replace('<ul>', '<ul class="list-disc pl-4">', $content);

        foreach ($classConversion as $quillClass => $tailwindClass) {
            $content = str_replace($quillClass, $tailwindClass, $content);
        }

        return $content;
    }
}