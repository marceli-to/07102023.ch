<div class="grid grid-cols-12 gap-16">
  @livewire('media-upload')
  @if ($files)
    @foreach($files as $file)
      <figure class="col-span-3 aspect-square flex items-center justify-center bg-green-200">
        <img src="{{ $file['url'] }}" class="block w-full h-full object-contain">
      </figure>
    @endforeach
  @endif
</div>
