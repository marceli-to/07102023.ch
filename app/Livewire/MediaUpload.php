<?php
namespace App\Livewire;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;
use Livewire\Form;
use App\Models\Media;

class MediaUpload extends Component
{
  use WithFileUploads;
 
  #[Rule('required|mimetypes:video/mp4,video/webm,video/ogg,video/3gpp,video/x-matroska,video/x-ms-wmv,video/x-flv,image/png,image/jpeg,image/gif,image/webp|max:64000')]
  public $file;

  public function save()
  {
    // check if upload folder exists
    if (!\Storage::exists('public/uploads'))
    {
      \Storage::makeDirectory('public/uploads');
    }
    $this->validate();
    $this->file->store('public/uploads');
    $this->reset();
    $this->redirect('/media'); 
  }

  public function delete()
  {
    $this->file->delete();
    $this->reset();
    $this->render();
  }

  public function render()
  {
    return view('livewire.media-upload');
  }
}
