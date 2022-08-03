@php
  $data = Component::cardPost($id);
@endphp

<a href="{!! $data['url'] !!}" class="card-post">
  <div class="card-post__content">
    <div class="card-post__head">
      <div class="card-post__head-thumbnail">
        @include('elements/image', ['data' => $data['image']])
      </div>
    </div>
    <div class="card-post__body">
      <h3 class="card-post__body-title">{!! $data['title'] !!}</h3>
      <div class="card-post__body-excerpt">{!! $data['excerpt'] !!}</div>
    </div>
  </div>
</a>
