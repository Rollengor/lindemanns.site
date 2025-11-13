@extends('admin.layouts.base')

@section('title', __('titles.settings') . ' - ' . config('app.name'))

@section('panel')
    <x-admin.main-panel :title="__('titles.settings')" />
@endsection

@section('content')
    <x-admin.container>

        <div class="d-flex flex-column gap-4">
            <ul class="nav nav-pills flex-nowrap overflow-x-auto px-3 px-xs-4 mx-n3 mb-n2 mx-xs-n4 gap-3 pb-2">
                <li class="nav-item">
                    <x-admin.button
                        class="text-uppercase active text-nowrap"
                        data-bs-toggle="pill"
                        data-bs-target="#email"
                        :btn="'btn-outline-secondary'"
                        :title="__('buttons.email')"
                    />
                </li>

                <li class="nav-item">
                    <x-admin.button
                        class="text-uppercase text-nowrap"
                        data-bs-toggle="pill"
                        data-bs-target="#contacts"
                        :btn="'btn-outline-secondary'"
                        :title="__('buttons.contacts')"
                    />
                </li>

                <li class="nav-item">
                    <x-admin.button
                        class="text-uppercase text-nowrap"
                        data-bs-toggle="pill"
                        data-bs-target="#footer"
                        :btn="'btn-outline-secondary'"
                        :title="__('buttons.footer')"
                    />
                </li>
            </ul>

            <div class="tab-content">
                <!-- email -->
                <div class="tab-pane fade show active" id="email">
                    @php
                        $valueEmail = $settingEmail['data']['email'] ?? null;
                    @endphp

                    <form action="{{ route('admin.settings.email.update', $settingEmail->id) }}" method="POST" class="d-flex flex-column gap-4">
                        @csrf
                        @method('PATCH')

                        <div>На вказану електронну адресу надходитимуть листи, відправлені користувачами, які заповнили будь-яку з форм на сайті.</div>

                        <!-- email -->
                        <x-admin.field.email
                            :name="'email'"
                            :value="old('email', $valueEmail ?? null)"
                            :placeholder="__('fields.email')"
                        />

                        <x-admin.button
                            class="me-auto"
                            data-submit-loader
                            :type="'submit'"
                            :title="__('buttons.save')"
                            :iconName="'floppy'"
                            :withLoader="true"
                        />
                    </form>
                </div>

                <!-- contacts -->
                <div class="tab-pane fade" id="contacts">
                    <form action="{{ route('admin.settings.contacts.update', $settingContacts->id) }}" method="POST" class="d-flex flex-column gap-4">
                        @csrf
                        @method('PATCH')

                        <x-admin.addetible-fields.wrapper>
                            @if(isset($settingContacts->data['phones']) && count($settingContacts->data['phones']))
                                @foreach($settingContacts->data['phones'] as $phone)
                                    <x-admin.addetible-fields.column>
                                        <!-- tel -->
                                        <x-admin.field.tel
                                            :name="'phones[]'"
                                            :value="old('phones', $phone)"
                                            :placeholder="__('fields.phone')"
                                            :required="false"
                                        />
                                    </x-admin.addetible-fields.column>
                                @endforeach
                            @else
                                <x-admin.addetible-fields.column>
                                    <!-- tel -->
                                    <x-admin.field.tel
                                        :name="'phones[]'"
                                        :value="old('phones')"
                                        :placeholder="__('fields.phone')"
                                        :required="false"
                                    />
                                </x-admin.addetible-fields.column>
                            @endif
                        </x-admin.addetible-fields.wrapper>

                        <x-admin.addetible-fields.wrapper>
                            @if(isset($settingContacts->data['emails']) && count($settingContacts->data['emails']))
                                @foreach($settingContacts->data['emails'] as $email)
                                    <x-admin.addetible-fields.column>
                                        <!-- email -->
                                        <x-admin.field.email
                                            :name="'emails[]'"
                                            :value="old('emails', $email)"
                                            :placeholder="__('fields.email')"
                                            :required="false"
                                        />
                                    </x-admin.addetible-fields.column>
                                @endforeach
                            @else
                                <x-admin.addetible-fields.column>
                                    <!-- email -->
                                    <x-admin.field.email
                                        :name="'emails[]'"
                                        :value="old('email')"
                                        :placeholder="__('fields.email')"
                                        :required="false"
                                    />
                                </x-admin.addetible-fields.column>
                            @endif
                        </x-admin.addetible-fields.wrapper>

                        <!-- address -->
                        <x-admin.field.text
                            :name="'address'"
                            :value="old('address', $settingContacts->data['address'] ?? null)"
                            :placeholder="__('fields.address')"
                        />

                        @foreach(['facebook', 'instagram', 'viber', 'telegram', 'twitter', 'linkedin', 'youtube'] as $social)
                            <!-- facebook -->
                            <x-admin.field.text
                                :name="$social"
                                :value="old($social, $settingContacts->data[$social] ?? null)"
                                :placeholder="Str::ucfirst($social)"
                                :required="false"
                            />
                        @endforeach

                        <x-admin.button
                            class="me-auto"
                            data-submit-loader
                            :type="'submit'"
                            :title="__('buttons.save')"
                            :iconName="'floppy'"
                            :withLoader="true"
                        />
                    </form>
                </div>

                <!-- footer -->
                <div class="tab-pane fade" id="footer">
                    <form action="{{ route('admin.settings.footer.update', $settingFooter->id) }}" method="POST" class="d-flex flex-column gap-4">
                        @csrf
                        @method('PATCH')

                        <!-- text -->
                        <x-admin.field.text
                            :name="'info'"
                            :value="old('info', $settingFooter->data['info'] ?? null)"
                            :placeholder="__('fields.shortDescription')"
                            :required="false"
                        />

                        <!-- registration -->
                        <x-admin.field.text
                            :name="'registration'"
                            :value="old('registration', $settingFooter->data['registration'] ?? null)"
                            :placeholder="__('fields.registrationText')"
                            :required="false"
                        />

                        <x-admin.button
                            class="me-auto"
                            data-submit-loader
                            :type="'submit'"
                            :title="__('buttons.save')"
                            :iconName="'floppy'"
                            :withLoader="true"
                        />
                    </form>
                </div>
            </div>
        </div>

    </x-admin.container>
@endsection
