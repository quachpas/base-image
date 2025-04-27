<?php
declare(strict_types=1);

/**
 * Small script to generate two custom Dockerfiles.
 *
 * Steps:
 *
 * - Replace build number
 * - Replace ISO date.
 */


// loop over both types.
$types = ['web', 'cli'];

foreach ($types as $type) {

    // First, copy the original file to the destination file.
    $originalFilename = sprintf('%s/Dockerfile-%s.original', __DIR__, $type);
    $filename         = sprintf('%s/Dockerfile.%s', __DIR__, $type);
    copy($originalFilename, $filename);

    // get the content of the file and the content of the counter and date.
    $content = file_get_contents($filename);
    $counter = trim(file_get_contents('counter.txt'));
    $date    = trim(file_get_contents('date.txt'));

    // replace both in the content of the Dockerfile.
    $content = str_replace('%BASE_IMAGE_BUILD_NO%', $counter, $content);
    $content = str_replace('%BASE_IMAGE_BUILD_DATE%', $date, $content);

    // write the content to the file.
    file_put_contents($filename, $content);
    debugMessage(sprintf('Added build date and time for image type %s in file %s.', $type, $filename));

    unset($content);
}

function debugMessage(string $str): void
{
    echo sprintf("%s\n", $str);
}
