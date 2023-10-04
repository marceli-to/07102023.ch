<div class="mb-16 md:mb-0 md:col-span-6 xl:col-span-3 aspect-square flex items-center justify-center relative">


  @if ($file) 
    @php $type = \Str::before($file->getMimeType(), '/') @endphp
    @if ($type === 'video')
      <x-figure class="w-full h-full">
        <video controls class="block w-full h-auto">
          <source src="{{ $file->temporaryUrl() }}" type="{{ $file->getMimeType() }}">
        </video>
      </x-figure>
    @endif
    @if ($type === 'image')
      <x-figure class="w-full h-ful">
        <img src="{{ $file->temporaryUrl() }}" class="block w-full h-auto">
      </x-figure>
    @endif
    <div class="w-full absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 flex flex-col items-center gap-16 justify-between">
      <button type="button" class="bg-green-400 w-1/2 px-12 py-3 text-white" wire:click="save">Save</button>
      <button type="button" class="bg-red-400 w-1/2 px-12 py-3 text-white" wire:click="delete">Delete</button>
    </div>
  @else  
    <form class="flex flex-col grow h-full justify-center items-center">
      <div
        x-data="{ uploading: false, progress: 0 }"
        x-on:livewire-upload-start="uploading = true"
        x-on:livewire-upload-finish="uploading = false"
        x-on:livewire-upload-error="uploading = false"
        class="w-full h-full flex items-center justify-center"
      >
        <div x-cloak x-show="uploading" class="spinner"></div>

        <div x-cloak x-show="!uploading">
          @if ($errors->has('file') && $file)
            <span class="absolute top-0 left-0 z-50 p-10 font-semibold text-orange text-base text-center w-full">
              {{ $errors->first('file')}}
            </span>
          @endif
      
          @if ($this->getErrorBag())
            <div class="absolute top-0 left-0 z-50 p-10 font-semibold text-orange text-base w-full">
              <ul class="list-none">
                @foreach($this->getErrorBag()->get('file') as $error)
                  <li class="block mb-8">
                    {{ __($error) }}
                  </li>
                @endforeach
              </ul>
            </div>
          @endif
        </div>

        @if (!$file) 
          <label class="cursor-pointer block aspect-square w-full relative" for="fileUpload" x-show="!uploading" x-data="{ file: null }">
            <input 
              type="file" 
              class="sr-only" 
              id="fileUpload" 
              wire:model.change="file"
              accept="image/jpeg,image/gif,image/webp"
              x-on:change="file = $event.target.file ? Object.values($event.target.file) : null">
            <div x-show="!file" class="block bg-white w-full h-full">
              <x-plus class="w-82 h-87 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2" />
            </div>
          </label>
        @endif
      </div>
    </form>
  @endif
</div>