<section class="container contact-section">
    <div class="contact-section-content">
        <div class="contact-section-body">
            <div class="contact-section-head">
                <h2 class="contact-section-title">Ready to Build Your Future?</h2>
                <p class="contact-section-description">Trusted real estate partner in Zug. Global perspective, Swiss quality, and strong growth potential.</p>
            </div>

            <div class="contact-section-links">
                <p><a href="tel:41796750423" class="base-link">+41 79 675 04 23</a></p>
                <p><a href="mailto:sales@lindemannsreal.com" class="base-link">sales@lindemannsreal.com</a></p>
            </div>
        </div>

        <div class="contact-section-form">
            <div class="contact-section-form-head">
                <h4 class="contact-section-form-title">Contact Us to Get Some Exclusive</h4>
                <div class="contact-section-form-avatar">
                    <img src="/img/circle-logo.svg" alt="Circle logo" class="img-fluid">
                    <img src="/img/avatar.jpg" alt="Circle logo" class="img-fluid">
                </div>
            </div>

            <form action="#" method="POST" class="form contact-section-form-body">
                @csrf
                @method('POST')

                <div class="form-fields">
                    <div class="form-fields-row">
                        <label class="form-control">
                            <input data-form-field type="text" name="first_name" class="form-field" required>
                            <span class="form-control-placeholder">{{ __('base.your_name') }} <sup>*</sup></span>
                        </label>

                        <label class="form-control">
                            <input data-form-field type="text" name="last_name" class="form-field" required>
                            <span class="form-control-placeholder">{{ __('base.last_name') }} <sup>*</sup></span>
                        </label>
                    </div>

                    <label class="form-control">
                        <input data-form-field type="tel" name="phone" class="form-field" required>
                        <span class="form-control-placeholder">{{ __('base.phone') }} <sup>*</sup></span>
                    </label>

                    <label class="form-control">
                        <input data-form-field type="email" name="email" class="form-field" required>
                        <span class="form-control-placeholder">{{ __('base.email') }} <sup>*</sup></span>
                    </label>
                </div>

                <button type="submit" class="btn btn-submit">{{ __('base.send') }}</button>

                <p class="form-info">By clicking “Send,” I agree to the <a href="#">Privacy Policy</a>.</p>
            </form>
        </div>
    </div>
</section>
