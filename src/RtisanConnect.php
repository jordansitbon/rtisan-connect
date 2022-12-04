<?php

namespace Rtisan\Connect;

class RtisanConnect
{
    public static function zipDirectory($dir, $path): string
    {
        $files = \File::allFiles($dir);
        $zip_path = storage_path($path);

        \File::makeDirectory(dirname($zip_path), 0755, true, true);

        $zip = new \ZipArchive();
        $zip->open($zip_path, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

        foreach ($files as $file) {
            $zip->addFile($file->getPathname(), $file->getRelativePathname());
        }

        $zip->close();

        return $zip_path;
    }
}
