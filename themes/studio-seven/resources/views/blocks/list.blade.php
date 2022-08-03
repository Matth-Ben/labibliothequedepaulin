{{--
  Title: Liste
  Description: Description of example
  Category: template-blocks
  Icon: hammer
  Post-Type: page post
  Keywords: example
--}}

@php
  $data = Block::list($block['data']);
@endphp

<section class="b-list">
  <div class="container-fluid">
    <div class="row align-items-end">
      @foreach ($data['list'] as $item)
        <div class="col-22 col-lg-9 offset-1 offset-lg-2">
          <div class="b-list__item">
            <div class="b-list__item-title">
              <h2>{!! $item['title'] !!}</h2>
            </div>
            <div class="b-list__item-body">
              {!! wpautop($item['subtitle']) !!}
              <ul class="b-list__item-body__list">
                @foreach ($item['elements'] as $el)
                  <li class="b-list__item-body__list-element">{!! $el !!}</li>
                @endforeach
              </ul>
              <div class="b-list__item-button">
                @include('elements/button', ['data' => $item])
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
