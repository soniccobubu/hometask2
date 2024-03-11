<?php

    function translit(string $filename) : string
    {
        $transliterationTable = [
            'а' => 'a',
            'б' => 'b',
            'в' => 'v',
            'г' => 'h',
            'ґ' => 'g',
            'д' => 'd',
            'е' => 'e',
            'є' => 'ie',
            'ж' => 'zh',
            'з' => 'z',
            'и' => 'y',
            'і' => 'i',
            'ї' => 'i',
            'й' => 'i',
            'к' => 'k',
            'л' => 'l',
            'м' => 'm',
            'н' => 'n',
            'о' => 'o',
            'п' => 'p',
            'р' => 'r',
            'с' => 's',
            'т' => 't',
            'у' => 'u',
            'ф' => 'f',
            'х' => 'kh',
            'ц' => 'ts',
            'ч' => 'ch',
            'ш' => 'sh',
            'щ' => 'shch',
            'ь' => '',
            'ю' => 'iu',
            'я' => 'ia',
        ];
        $lowercase_str = iconv("UTF-8", "ASCII//TRANSLIT", $filename);
        $filename = strtr($filename, $transliterationTable);
        return $filename;
    }
