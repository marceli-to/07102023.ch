<div class="grid grid-cols-12 gap-16">
  @livewire('media-upload')
  @if ($files)
    @foreach($files as $file)
      @if ($file['type'] === 'video')
        <figure class="col-span-3 aspect-square flex items-center justify-center bg-green-200">
          <video controls class="block w-full h-full object-contain">
            <source src="{{ $file['url'] }}" type="{{ $file['mime'] }}">
          </video>
        </figure>
      @endif

      @if ($file['type'] === 'image')
        <figure class="col-span-3 aspect-square flex items-center justify-center bg-green-200">
          <img src="{{ $file['url'] }}" class="block w-full h-full object-contain">
        </figure>
      @endif

    @endforeach
  @endif
</div>
