<?php
//echo phpinfo();
$inputFile = __DIR__ . '/input.txt';
$outputFile = __DIR__ . '/output.txt';

if (file_exists($inputFile)) {
    $text = file_get_contents($inputFile);

    $position = 0;
    if (!empty($text)) {
        $text = preg_replace_callback('/\w+/u', function ($matches) use (&$position) {
            $position++;
            list($replacement) = $matches;
            if ($position % 3 == 0 && $position % 5 == 0) {
                $replacement = 'ПЯТНАДЦАТЬ';
            } elseif ($position % 3 == 0) {
                $replacement = 'ТРИ';
            } elseif ($position % 5 == 0) {
                $replacement = 'ПЯТЬ';
            }
            return $replacement;
        }, $text);
        file_put_contents($outputFile, $text);
    } else {
        echo 'file is empty';
    }
}