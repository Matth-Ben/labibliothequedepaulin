@extends('layouts.app')

@php
  $id = get_option('page_for_posts');
@endphp

@section('content')
  <div data-router-view="page">
    <div class="news">
      <div class="news__header">
        <h1>{!! get_the_title($id) !!}</h1>
      </div>
      <div class="news__body">
        <div class="container-fluid">
          <div class="row">
            @php $count = 0; @endphp
            @while(have_posts()) @php the_post() @endphp
            <div class="col-22 col-lg-9 offset-1 offset-lg-2">
              <div class="news__card">
                @include('components/card-post', ['id' => get_the_ID()])
              </div>
              @php $count++; @endphp
            </div>
            @endwhile
          </div>
        </div>
      </div>

      <div class="news__pagination">
        <div class="container-fluid">
          <div class="row">
            <div class="col-22 col-lg-20 offset-1 offset-lg-2">
              @include('components/pagination')
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
