
<!-- Menu desktop -->
<div class="menu-desktop">
  <ul class="main-menu">
    <li class="{{ Request::is('') ? 'active-menu' : '' }}">
      <a href="{{ route('frontend.home') }}">Trang chủ</a>
    </li>
    <li class="{{ Request::is('san-pham') ? 'active-menu' : '' }}">
      <a href="{{ route('frontend.product') }}">Sản phẩm</a>
    </li>
    <li class="label1 {{ Request::is('gio-hang') ? 'active-menu' : '' }}" data-label1="hot">
      <a href="{{ route('frontend.cart') }}">Giỏ hàng</a>
    </li>
    <li class="{{ Request::is('gioi-thieu') ? 'active-menu' : '' }}">
      <a href="{{ route('frontend.about') }}">Giới thiệu</a>
    </li>
    <li class="{{ Request::is('lien-he') ? 'active-menu' : '' }}">
      <a href="{{ route('frontend.contact') }}">Liên hệ</a>
    </li>
  </ul>
</div>