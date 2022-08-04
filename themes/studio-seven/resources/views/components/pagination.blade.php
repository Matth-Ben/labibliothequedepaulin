@php
  $pagination = get_the_posts_pagination(array(
    'screen_reader_text' => ' ',
    'mid_size'  => 2,
    'prev_text' => '<div class="button"></div>',
    'next_text' => '<div class="button"></div>',
  ));
@endphp

@if ($pagination)
  <div class="c-pagination">
    <div class="container">
      <div class="text-center">
        {!! $pagination !!}
      </div>
    </div>
  </div>
@endif
