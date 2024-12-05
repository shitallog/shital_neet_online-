<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\File;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
class DeleteOldFiles extends Command
{
    protected $signature = 'files:delete-old';
    protected $description = 'Delete files that are older than 1 year';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Find files older than 1 year
        $oldFiles = File::where('uploaded_at', '<', Carbon::now()->subYear())->get();

        foreach ($oldFiles as $file) {
            // Delete file from storage
            Storage::delete($file->path);

            // Delete the file record from the database
            $file->delete();
        }

        $this->info('Old files deleted successfully.');
    }
}
