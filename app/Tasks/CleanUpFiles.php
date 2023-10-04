<?php
namespace App\Tasks;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CleanUpFiles
{
  public function __invoke()
  {
    \Artisan::call('cleanup:files');
  }
}