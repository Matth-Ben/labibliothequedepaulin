<div class="button">
  <a href="{{ $data['button']['url'] }}" @if($data['target']){{ 'target="_blank" rel="noopener"' }}@endif>
    {!! $data['button']['title'] !!}
  </a>
</div>
