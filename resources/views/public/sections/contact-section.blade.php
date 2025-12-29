@if(isset($contactUsSection))
    <section class="container contact-section">
        <div class="contact-section-content bg-img-cover" style="background-image: url({{ $contactUsSection->getFirstMediaUrl('bg-image', 'hd-webp') }});">
            <div class="contact-section-body">
                <div class="contact-section-head">
                    <h2 class="contact-section-title">{{ $contactUsSection->title }}</h2>
                    <p class="contact-section-description">{{ data_get($contactUsSection->content_data, 'description') }}</p>
                </div>

                <div class="contact-section-links">
                    <p>
                        @foreach(data_get($contactUsSection->content_data, 'phones', []) as $phone)
                            <a href="tel:{{ get_only_numbers($phone) }}" class="base-link">{{ $phone }}</a>
                        @endforeach
                    </p>
                    <p>
                        @foreach(data_get($contactUsSection->content_data, 'emails', []) as $email)
                            <a href="mailto:{{ $email }}" class="base-link">{{ $email }}</a>
                        @endforeach
                    </p>
                </div>
            </div>

            <div class="contact-section-form">
                <div class="contact-section-form-head">
                    <h4 class="contact-section-form-title">Contact Us to Get Some Exclusive</h4>
                    {{--<div class="contact-section-form-avatar">
                        <x-public.circle-logo/>
                        <img src="/img/avatar.jpg" alt="Circle logo" class="img-fluid">
                    </div>--}}
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

                    <p class="form-info">By clicking “Send,” I agree to the <a href="{{ route('public.privacy-notice') }}">{{ __('public.privacy_notice') }}</a>.</p>

                    <button type="submit" class="btn btn-submit">{{ __('base.send') }}</button>
                </form>
            </div>
        </div>
    </section>
@endif
