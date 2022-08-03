<div class="c-classic-content">
  @if(!empty($data['titles']))
    <div class="c-classic-content__title">
      @include('elements/title', ['data' => $data['titles']])
    </div>
  @endif

  @if(!empty($data['content']))
    <div class="c-classic-content__content">
      {!! wpautop($data['content']) !!}
    </div>
  @endif

  @if(!empty($data['button']))
    @include('elements/button', ['data' => $data])
  @endif
</div>
