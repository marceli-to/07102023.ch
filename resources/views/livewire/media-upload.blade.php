<div class="col-span-3 aspect-square flex items-center justify-center">
  <form>
    @if ($errors->has('photo') && $photo)
      <span class="error">
        {{ $errors->first('photo')}}
      </span>
    @endif

    @if ($photo) 
      <img src="{{ $photo->temporaryUrl() }}" class="block w-full h-auto max-w-xs">
      <button type="button" wire:click="save">Save photo</button>
      <button type="button" wire:click="delete">delete photo</button>
    @endif
    <div
      x-data="{ uploading: false, progress: 0 }"
      x-on:livewire-upload-start="uploading = true"
      x-on:livewire-upload-finish="uploading = false"
      x-on:livewire-upload-error="uploading = false"
      x-on:livewire-upload-progress="progress = $event.detail.progress"
    >
      <div x-show="uploading">
        <progress max="100" x-bind:value="progress"></progress>
      </div>

      @if (!$photo) 
        <label class="cursor-pointer my-2" for="fileUpload" x-data="{ files: null }">
          <input type="file" class="sr-only" id="fileUpload" wire:model="photo" x-on:change="files = Object.values($event.target.files)">
          <span x-show="!files" class="block aspect-square w-150 flex relative bg-white p-5">
            <span class="block w-5 h-1/2 bg-black absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"></span>
            <span class="block h-5 w-1/2 bg-black absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"></span>
          </span>
        </label>
      @endif
    </div>
  </form>
</div>