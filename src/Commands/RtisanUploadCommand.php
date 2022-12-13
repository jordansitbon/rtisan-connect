<?php

namespace Rtisan\Connect\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Rtisan\Connect\RtisanConnect;

class RtisanUploadCommand extends Command
{
    public $signature = 'rtisan:upload';

    public $description = 'Upload your language files to your Rtisan project';

    public function handle(): int
    {
        if (! config('rtisan-connect.token', false)) {
            $this->error('Please set your Rtisan token in .env file.');
            $this->error('You can find your token on your Rtisan project page.');

            return self::FAILURE;
        }

        $this->info('Reading language files and zip them...');
        $zip_path = RtisanConnect::zipDirectory(lang_path(), 'app/rtisan-connect/upload.zip');

        $this->info('Send zip file to Rtisan...');
        $token = config('rtisan-connect.token');
        $request = Http::attach('file', file_get_contents($zip_path), 'rtisan-connect.zip')
            ->post(RtisanConnect::BASE_URL.'/api/projects/connect/lang/'.$token);

        $this->info('Cleaning up...');
        \File::delete($zip_path);

        if ($request->successful()) {
            $this->info('Language files uploaded successfully.');

            return self::SUCCESS;
        } else {
            $this->error('Something went wrong.');

            return self::FAILURE;
        }
    }
}
