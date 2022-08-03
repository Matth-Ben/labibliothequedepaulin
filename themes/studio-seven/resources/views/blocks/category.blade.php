{{--
  Title: Categories
  Description: Description of example
  Category: template-blocks
  Icon: hammer
  Post-Type: page post
  Keywords: example
--}}

@php
  $data = Block::categories($block['data']);
@endphp

<section class="b-category">
  <div class="b-category__title">
    @include('elements/title', ['data' => $data['titles']])
  </div>
  <div class="row">
    @foreach ($data['categories'] as $item)
      <div class="col-22 col-lg-6 offset-1 @if($loop->index === 0){{'offset-lg-2'}}@endif">
        <a class="b-category__item" href="{!! $item['link'] !!}">
          <figure>
            <img src="{!! $item['image']['url'] !!}" alt="{!! $item['image']['alt'] !!}" height="350">
          </figure>
          <div class="b-category__item-title">
            <h3>{{ $item['title'] }}</h3>
          </div>
        </a>
      </div>
    @endforeach
  </div>
</section>
