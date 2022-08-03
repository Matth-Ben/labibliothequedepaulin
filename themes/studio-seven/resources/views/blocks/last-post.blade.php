{{--
  Title: Dernier articles
  Description: Description of example
  Category: template-blocks
  Icon: hammer
  Post-Type: page post
  Keywords: example
--}}

@php
  $data = Block::lastArticles($block['data']);
  $posts = $data['posts'];
@endphp

<section class="b-last-post">
  <div class="b-last-post__title">
    @include('elements/title', ['data' => $data['titles']])
  </div>
  <div class="container-fluid">
    <div class="row">
      @while($posts->have_posts()) @php $posts->the_post() @endphp
        <div class="col-22 col-lg-9 offset-1 offset-lg-2">
          @include('components/card-post', ['id' =>get_the_ID()])
        </div>
      @endwhile
    </div>
    <div class="b-last-post__button">
      @include('elements/button', ['data' => [
        'button' => [
          'title' => 'En savoir plus',
          'url' => esc_url(get_permalink(get_option('page_for_posts'))),
          'target' => '',
        ]
      ]])
    </div>
  </div>
</section>
