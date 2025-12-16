<footer class="footer">
    <div class="container">
        <div class="footer-body">
            <div class="footer-col footer-contacts">
                <x-public.logo class="footer-logo"/>

                <div class="footer-contacts-links">
                    <p><a href="tel:41796750423" class="base-link">+41 79 675 04 23</a></p>
                    <p><a href="mailto:contact@tnduniverse.com" class="base-link">contact@tnduniverse.com</a></p>
                </div>

                <address>Zurich, Switzerland</address>
            </div>

            <div class="footer-col footer-menu">
                <ul>
                    <li><a href="{{ route('public.about') }}" class="{{ request()->routeIs('public.about') ? 'is-active' : '' }}">{{ __('base.about') }}</a></li>
                    <li><a href="{{ route('public.services') }}" class="{{ request()->routeIs('public.service*') ? 'is-active' : '' }}">{{ __('base.expertise') }}</a></li>
                    <li><a href="#">{{ __('base.portfolio') }}</a></li>
                    <li><a href="{{ route('public.news') }}" class="{{ request()->routeIs('public.news*') ? 'is-active' : '' }}">{{ __('base.news') }}</a></li>
                    <li><a href="{{ route('public.contacts') }}" class="{{ request()->routeIs('public.contacts') ? 'is-active' : '' }}">{{ __('base.contacts') }}</a></li>
                </ul>

                <ul>
                    <li><a href="#">{{ __('base.imprint') }}</a></li>
                    <li><a href="#">{{ __('base.privacy_notice') }}</a></li>
                    <li><a href="#">{{ __('base.terms_of_use') }}</a></li>
                </ul>
            </div>

            <div class="footer-col footer-socials">
                <div class="footer-socials-title">{{ __('base.follow_us') }}</div>
                <x-public.socials/>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="copyright">© 2025 TND Universe. All rights reserved.</div>
            <a href="#" class="creator">
                <img src="/img/citi-logo.svg" alt="CITI Advertising" class="img-fluid">
            </a>
        </div>
    </div>
</footer>
