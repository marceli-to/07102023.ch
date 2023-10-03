<?php
namespace App\Livewire;
use App\Models\Media;
use Livewire\Component;

class MediaListing extends Component
{
  public function render()
  {
    // Get all files from storage/app/public/uploads
    $files = \Storage::files('public/uploads');

    // Filter out any non-image files (allowed are: video/mp4,video/webm,video/ogg,video/3gpp,video/quicktime,video/x-matroska,video/x-ms-wmv,video/x-flv,image/png,image/jpeg,image/gif,image/webp)
    $files = array_filter($files, function($file) {
      return in_array(\Storage::mimeType($file), Media::MIMETYPES);
    });

    // Map the files into a format we can use in our view
    $files = array_map(function($file) {
      return [
        'name' => \Str::after($file, 'public/uploads/'),
        'url' => \Storage::url($file),
        'last_modified' => \Storage::lastModified($file),
        'type' => \Str::before(\Storage::mimeType($file), '/'),
        'mime' => \Storage::mimeType($file),
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
