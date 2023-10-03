<?php
namespace App\Livewire;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;
use Livewire\Form;

class MediaUpload extends Component
{
  use WithFileUploads;
 
  #[Rule('image|max:1024')] // 1MB Max
  public $photo;

  public function save()
  {
    $this->validate();
    $this->photo->store('public/photos');
    $this->reset();
    $this->redirect('/media'); 

  }

  public function delete()
  {
    $this->photo->delete();
    $this->reset();
    $this->render();
  }

  public function render()
  {
    return view('livewire.media-upload');
  }
}
