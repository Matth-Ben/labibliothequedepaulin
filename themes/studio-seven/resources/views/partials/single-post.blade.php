@php
  $data = Single::post();
  // $data_last_post = Component::lastPosts('post', get_post_term($data['id']), $data['id']);

  if (!empty($data['image']['url'])) {
    $image = $data['image'];
  }
@endphp

<div data-router-view="page">
  <div class="single single-post">
    <section class="single-post__image">
      @include('elements/image', ['data' => $image])
    </section>
    <section class="single-post__body">
      <div class="container-fluid">
        <div class="row">
          <div class="offset-md-2 col-md-20">
            <div class="single-post__top">
              <div class="single-post__back color-style-default">
                <div class="button">
                  <a href="{{ get_the_permalink(get_option('page_for_posts')) }}">
                    <span>{{ display_svg('arrow') }}</span>
                    Mes articles
                  </a>
                </div>
              </div>
            </div>
            <div class="single-post__inner">
              <div class="single-post__content">
                <div class="single-post__head">
                  @include('elements/title', [
                    'data' => $data['titles']
                  ])
                </div>
                <div class="single-post__gutenberg">{!! the_content() !!}</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    {{-- @include('components/last-posts', ['data' => $data_last_post]) --}}
  </div>
</div>
