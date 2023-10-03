<div class="col-span-3 aspect-square flex items-center justify-center relative">
  <form>
    @if ($errors->has('file') && $file)
      <span class="error">
        {{ $errors->first('file')}}
      </span>
    @endif

    @if ($file) 
      @php $type = \Str::before($file->getMimeType(), '/') @endphp
      @if ($type === 'video')
        <div class="aspect-square flex items-center justify-center bg-gray-100">
          <video controls class="block w-full h-auto max-w-xs">
            <source src="{{ $file->temporaryUrl() }}" type="{{ $file->getMimeType() }}">
          </video>
        </div>
      @endif
      @if ($type === 'image')
        <div class="aspect-square flex items-center justify-center bg-gray-100">
          <img src="{{ $file->temporaryUrl() }}" class="block w-full h-auto max-w-xs">
        </div>
      @endif
      <div class="w-full absolute left-0 bottom-0 flex justify-between">
        <button type="button" class="bg-green-400 w-full px-12 py-3 text-white" wire:click="save">Save</button>
        <button type="button" class="bg-red-400 w-full px-12 py-3 text-white" wire:click="delete">Delete</button>
      </div>
      
    @endif
    <div
      x-data="{ uploading: false, progress: 0 }"
      x-on:livewire-upload-start="uploading = true"
      x-on:livewire-upload-finish="uploading = false"
      x-on:livewire-upload-error="uploading = false"
      x-on:livewire-upload-progress="progress = $event.detail.progress"
    >
      <div x-cloak x-show="uploading" class="spinner"></div>
      @if (!$file) 
        <label class="cursor-pointer my-2" for="fileUpload" x-show="!uploading" x-data="{ file: null }">
          <input 
            type="file" 
            class="sr-only" 
            id="fileUpload" 
            wire:model="file"
            accept="video/*, image/*"
            x-on:change="file = Object.values($event.target.file)">
          <span x-show="!file" class="block aspect-square w-150 flex relative bg-white p-5">
            <span class="block w-5 h-1/2 bg-orange absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"></span>
            <span class="block h-5 w-1/2 bg-orange absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"></span>
          </span>
        </label>
      @endif
    </div>
  </form>
</div>