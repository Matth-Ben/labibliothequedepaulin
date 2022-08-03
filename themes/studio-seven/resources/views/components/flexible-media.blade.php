<div class="f-media f-media--{{ $data['media'] }} h-100">
  @if ($data['media'] === 'image')
    <div class="f-media__image h-100">
      @include('elements/image', ['data' => $data['image']])
    </div>
  @else
    <div class="f-media__video h-100">
      @include('components/video', ['data' => $data['video']])
    </div>
  @endif
</div>
