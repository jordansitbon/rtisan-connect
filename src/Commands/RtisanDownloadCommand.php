<?php

namespace Rtisan\Connect\Commands;

use Illuminate\Console\Command;
use Rtisan\Connect\RtisanConnect;

class RtisanDownloadCommand extends Command
{
    public $signature = 'rtisan:download';

    public $description = 'Download language files from Rtisan';

    public function handle(): int
    {
        if (! config('rtisan-connect.token', false)) {
            $this->error('Please set your Rtisan token in .env file.');
            $this->error('You can find your token on your Rtisan project page.');

            return self::FAILURE;
        }

        $old_zip_path = 'app/rtisan-connect/old-lang.'.now()->format('Ymd-His').'.zip';
        $this->info('ZIP current language files to "/storage/'.$old_zip_path.'"...');
        RtisanConnect::zipDirectory(lang_path(), $old_zip_path);

        $this->info('Delete current language files...');
        \File::deleteDirectory(lang_path());

        $this->info('Download ZIP file from Rtisan...');
        $token = config('rtisan-connect.token');
        $zip_path = storage_path('app/rtisan-connect/download.zip');
        \File::put($zip_path, file_get_contents('https://getrtisan.com/api/projects/connect/lang/'.$token));

        $this->info('Extracting ZIP file...');
        $zip = new \ZipArchive();
        $zip->open($zip_path);
        $zip->extractTo(lang_path());
        $zip->close();

        $this->info('Cleaning up...');
        \File::delete($zip_path);

        return self::SUCCESS;
    }
}
