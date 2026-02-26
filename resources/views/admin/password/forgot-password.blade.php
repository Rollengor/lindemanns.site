@extends('admin.layouts.auth')

@section('content')
    <div
        data-overlayscrollbars-initialize
        class="w-100 h-100"
    >
        <div class="d-flex flex-column h-100">
            <div class="p-3 p-sm-4 my-auto">
                <form
                    action="{{ route('password.email') }}"
                    method="POST"
                    class="rounded border border-dark border-opacity-25 col-12 col-xs-9 col-sm-7 col-md-5 col-xl-4 col-hd-3 mx-auto shadow-fill"
                >
                    @csrf
                    @method('POST')

                    <!-- heading -->
                    <div class="p-3 border-bottom border-dark border-opacity-25 text-center">
                        <h1 class="fs-4 m-0 lh-sm text-uppercase">{{ __('admin.forgot_password') }}</h1>
                        <div class="fs-5 text-gray">{{ config('app.name') }}</div>

                        <div class="mt-3">{{ __('admin.forgot_password_message') }}</div>
                    </div>

                    <!-- fields -->
                    <div class="d-flex flex-column gap-4 py-4 px-3 px-xs-4">
                        <!-- email -->
                        <x-admin.field.email
                            :placeholder="__('admin.email')"
                            :name="'email'"
                            :value="old('email')"
                        />
                    </div>

                    <!-- status -->
                    <div
                        data-status="{{ session('status') ? 'sended' : null }}"
                        class="{{ session('status') ? null : 'd-none' }} p-3 text-success border-top border-dark border-opacity-25 text-center"
                    >
                        @if (session('status'))
                            <div>{{ session('status') }}</div>
                        @endif
                        <div
                            data-delay-timer
                            class="text-black"
                        >{{ __('admin.can_resend_timer') }}: <span data-delay-timer-view>00:00</span></div>
                    </div>

                    <!-- errors -->
                    <x-admin.errors class="p-3 text-danger border-top border-dark border-opacity-25 text-center" />

                    <!-- actions -->
                    <div
                        class="d-flex flex-column align-items-center gap-2 p-3 pt-4 border-top border-dark border-opacity-25 text-center">
                        <button
                            type="submit"
                            class="btn btn-secondary px-3 submit-loader"
                        >
                            <span>{{ __('admin.email_password_reset_link') }}</span>

                            <span class="submit-loader-spinner">
                                <span class="spinner-border m-auto text-white"></span>
                            </span>
                        </button>

                        <a
                            href="{{ route('login') }}"
                            class="text-decoration-none"
                        >{{ __('admin.go_to_login') }}</a>

                        <x-admin.lang :withIcon="true" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('footer-scripts')
    <script>
        (function() {
            const form = document.querySelector('form');
            const submitBtn = form.querySelector('button[type="submit"]');
            const status = document.querySelector('[data-status]');
            const delay = document.querySelector('[data-delay-timer]');
            const delayView = delay.querySelector('[data-delay-timer-view]');
            let lastDelayTime = +localStorage.getItem('lastDelayTime');
            let interval = null;

            if (!lastDelayTime && status.dataset.status !== 'sended') return;

            form.addEventListener('submit', preventSubmit);
            submitBtn.setAttribute('disabled', 'disabled');

            status.classList.remove('d-none');

            lastDelayTime = lastDelayTime || Date.now();
            localStorage.setItem('lastDelayTime', lastDelayTime);

            viewTime(getRemainingTime(lastDelayTime));

            interval = setInterval(() => {
                const currentDelayTime = getRemainingTime(lastDelayTime);

                viewTime(currentDelayTime);

                if (currentDelayTime === 0) {
                    status.classList.add('d-none');
                    localStorage.removeItem('lastDelayTime');

                    form.removeEventListener('submit', preventSubmit);
                    submitBtn.removeAttribute('disabled');

                    clearInterval(interval);
                }
            }, 1000);

            function getRemainingTime(lastTime) {
                const maxTime = 60;
                const difference = Math.floor((Date.now() - lastTime) / 1000);

                return maxTime >= difference ? maxTime - difference : 0;
            }

            function viewTime(time) {
                delayView.textContent = `00:${time < 10 ? '0' + time : time}`;
            }

            function preventSubmit(e) {
                e?.preventDefault();
            }
        })();
    </script>
@endpush
