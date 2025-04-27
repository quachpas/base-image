<?php
declare(strict_types=1);

/**
 * Small script to generate custom Docker image.
 *
 * Steps:
 *
 * - Replace build number
 * - Replace ISO date.
 */


$types = ['web', 'cli'];

foreach ($types as $type) {

    // copy original file
    copy(sprintf('%s/Dockerfile-%s.original', __DIR__, $type), sprintf('%s/Dockerfile.%s', __DIR__, $type));
    $filename = sprintf('%s/Dockerfile.%s', __DIR__, $type);
    $content  = file_get_contents($filename);
    $counter  = trim(file_get_contents('counter.txt'));
    $date     = trim(file_get_contents('date.txt'));

    $content = str_replace('%BASE_IMAGE_BUILD_NO%', $counter, $content);
    $content = str_replace('%BASE_IMAGE_BUILD_DATE%', $date, $content);

    file_put_contents($filename, $content);
    debugMessage(sprintf('Added build date and time for image type %s in file %s.', $type, $filename));

    unset($content);
}

function debugMessage(string $str): void
{
    echo sprintf("%s\n", $str);
}
