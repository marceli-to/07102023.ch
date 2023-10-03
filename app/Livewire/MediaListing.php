<?php
namespace App\Livewire;
use Livewire\Component;

class MediaListing extends Component
{
  public function render()
  {

    // Get all files from storage/app/public/photos
    $files = \Storage::files('public/photos');


    // Filter out any non-image files
    $files = array_filter($files, function($file) {
      return \Str::endsWith($file, ['.jpg', '.png', '.gif']);
    });

    // Map the files into a format we can use in our view
    $files = array_map(function($file) {
      return [
        'name' => \Str::after($file, 'public/photos/'),
        'url' => \Storage::url($file),
        // get last modified date
        'last_modified' => \Storage::lastModified($file),
      ];
    }, $files);

    // Sort the files by last modified date
    usort($files, function($a, $b) {
      return $b['last_modified'] <=> $a['last_modified'];
    });

    return view('livewire.media-listing', [
      'files' => $files,
    ]);
  }
}
