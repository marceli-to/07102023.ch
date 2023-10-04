<div class="md:grid md:grid-cols-12 md:gap-16">
  @livewire('media-upload')
  @if ($files)
    @foreach($files as $file)
      @if ($file['type'] === 'video')
        <x-figure class="mb-16 md:mb-0 md:col-span-6 xl:col-span-3">
          <video controls class="block w-full h-full object-contain" loading="lazy">
            <source src="{{ $file['url'] }}" type="{{ $file['mime'] }}">
          </video>
        </x-figure>
      @endif

      @if ($file['type'] === 'image')
        <x-figure class="mb-16 md:mb-0 md:col-span-6 xl:col-span-3">
          <img 
            src="{{ $file['resizable'] ? '/img/cache/large/' . $file['name'] : $file['url'] }}" 
            width="{{ $file['width'] }}" 
            height="{{ $file['height'] }}" 
            class="block w-full h-full object-contain" 
            loading="lazy">
        </x-figure>
      @endif

    @endforeach
  @endif
</div>
