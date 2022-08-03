{{--
  Title: Contenu Flexible
  Description: Une ou deux colonnes : contenu / médias
  Category: template-blocks
  Icon: columns
  Post-Type: post page
  Keywords: contenu colonnes flexible image vidéo média
--}}

@php
  $data = Block::flexibleContent($block['data']);
@endphp

<section class="b-flexible-content">
  <div class="container-fluid">
    <div class="row">
      @foreach ($data['components'] as $component)
        @php
          if (count($data['components']) === 1) {
            if ($component['name'] === 'flexible-classic-content') {
              $col = 'col-lg-20 offset-md-2';
            }
          } else {
            if ($component['name'] === 'flexible-classic-content') {
              $col = 'col-lg-10';
            } else {
              $col = 'col-lg-9';
            }
          }
        @endphp
        <div class="col-22 {{ $col }} offset-1 @if($loop->index === 0){{ 'offset-lg-2' }}@endif">
          @include('components/' . $component['name'], ['data' => $component['data']])
        </div>
      @endforeach
    </div>
  </div>
</section>
