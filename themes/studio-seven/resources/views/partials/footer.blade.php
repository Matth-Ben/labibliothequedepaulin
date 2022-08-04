<footer class="footer">
  <div class="container-fluid">
    <div class="row align-items-center">
      <div class="col-lg-7 offset-lg-2">
        <a href="{{ home_url() }}" aria-label="Accueil" class="footer__logo">
          <figure>
            <img src="{{ $GLOBALS['options']['footer']['logo1']['url'] }}" width="275" height="175" alt="Logo-footer">
          </figure>
        </a>
        <div class="footer__separator"></div>
        <div class="footer__copyright">
          {!! wpautop($GLOBALS['options']['footer']['copyright']) !!}
        </div>
      </div>
      <div class="col-lg-3 offset-lg-1">
        <div class="footer__menu">
          @foreach ($GLOBALS['navigation']['footer_navigation_1'] as $item)
            <div class="footer__menu-item">
              <a href="{{ $item['url'] }}" class="footer__menu-item__link">{{ $item['title'] }}</a>
            </div>
          @endforeach
        </div>
      </div>
      <div class="col-lg-3 offset-lg-1">
        <div class="footer__menu">
          @foreach ($GLOBALS['navigation']['footer_navigation_2'] as $item)
            <div class="footer__menu-item">
              <a href="{{ $item['url'] }}" class="footer__menu-item__link">{{ $item['title'] }}</a>
            </div>
          @endforeach
        </div>
      </div>
      <div class="col-lg-4 offset-lg-1">
        <div class="footer__logo-2">
          <figure>
            <img src="{{ $GLOBALS['options']['footer']['logo2']['url'] }}" width="230" height="244" alt="Logo">
          </figure>
        </div>
        <div class="footer__copyright mobile">
          {!! wpautop($GLOBALS['options']['footer']['copyright']) !!}
        </div>
      </div>
    </div>
  </div>
</footer>
