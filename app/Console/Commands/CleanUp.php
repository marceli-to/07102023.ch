<?php
namespace App\Console\Commands;
use App\Models\Project;
use App\Models\Message;
use App\Services\Media;
use Illuminate\Console\Command;

class Cleanup extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'cleanup:files';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Clean up temp files';

  /**
   * Create a new command instance.
   *
   * @return void
   */
  public function __construct()
  {
      parent::__construct();
  }

  /**
   * Execute the console command.
   *
   * @return int
   */
  public function handle()
  {
    $this->info('Cleaning files');

    // Folder: uploads/temp
    $files = \Storage::listContents('tmp');
    collect($files)->each(function($file) {
      if ($file->lastModified() < now()->subMinutes(15)->getTimestamp()) {
        \Storage::delete($file->path());
      }
    });
  }
}
