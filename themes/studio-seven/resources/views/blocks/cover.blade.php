{{--
  Title: Cover
  Description: Description of example
  Category: template-blocks
  Icon: hammer
  Post-Type: page post
  Keywords: example
--}}

@php
  $data = Block::cover($block['data']);
@endphp

<section class="b-cover">
  <div class="container-fluid">
    <div class="row">
      <div class="col-22 col-lg-6 offset-1 offset-lg-5">
        <div class="b-cover__title">
          <div class="b-cover__title-suptitle">Nouveauté</div>
          @include('elements/title', ['data' => $data['titles']])
        </div>
        <div class="b-cover__content">
          {!! wpautop($data['content']) !!}
        </div>
        <div class="b-cover__button">
          @include('elements/button', ['data' => $data])
        </div>
      </div>
      <div class="col-22 col-lg-7 offset-1 offset-lg-2">
        <div class="b-cover__image">@include('elements/image', ['data' => $data['image']])</div>
      </div>
    </div>
  </div>
</section>
