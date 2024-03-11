<?php

    $FILES = 'files'; // константа в яку записали назву папки з оригінальними файлами
    $FILES_N = 'files_new'; // константа в яку записали назву папки для копій

    include './functions/translit.php'; // функція яка заміняє кирилицю на латиницю
    include './functions/getfiles.php'; // функція яка повертає масив файлів в папці (їх назви)
    include './functions/deletesymbols.php'; // функція яка видаляє зайві символи

    // 1. Подивитись в папку з файлами та вивести їх в консоль.
    $files = getfiles($FILES); // масив що містить старі назви файлів

    // 2. Створити функцію, яка замінить літери з кирилиці на латиницю
    $new_files = []; // масив латинських назв
    foreach($files as $file){
        $new_files[$file] = translit($file);
    }

    // 3. Створити функцію, яка видаляє символи, пробіли з рядка
    $new_files_clear = []; // масив латинських назв без зайвих символів
    foreach ($new_files as $key => $file){
        $new_files_clear[$key] = deletesymbols($file);
    }

    print_r($new_files_clear); // Отримали індексований масив, у якого ключ - стара назва, значення - нова назва.

function renaming($new_files_clear,$FILES,$FILES_N)
{
    if (!is_dir($FILES_N)) {
        if (mkdir($FILES_N, 0777)) {
        }
    } else {

    }
    $files = scandir($FILES);
    $files = array_diff($files, array('.', '..'));


    foreach ($files as $file) {
        $source = $FILES . '/' . $file;
        $destination = $FILES_N . '/' . $file;
        copy($source, $destination);

    }
    foreach ($new_files_clear as $key => $file) {
        $old = $FILES_N . '/' . $key;
        $new = $FILES_N . '/' . $file;
        if (file_exists($old)) {

            rename($old, $new);
        }
    }
}
renaming($new_files_clear,$FILES,$FILES_N);
