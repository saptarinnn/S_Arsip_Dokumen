<li class="menu-item {{ request()->fullUrlIs(url($href)) ? 'active' : '' }}">
    <a {{ $attributes }} class="menu-link">
        <i class="menu-icon tf-icons bx bx-{{ $icon }}"></i>
        <div data-i18n="Basic">{{ $slot }}</div>
    </a>
</li>
