@extends('admin.layouts.base')

@section('title', __('titles.edit') . ' - ' . config('app.name'))

@section('panel')
    <x-admin.main-panel
        :title="__('titles.edit')"
    >
        <x-admin.button
            data-submit-loader
            :type="'submit'"
            :form="'updateForm'"
            :title="__('buttons.save')"
            :iconName="'floppy'"
            :withLoader="true"
            :withMiniStyle="true"
        />
    </x-admin.main-panel>
@endsection

@section('content')
    <x-admin.container
        :id="'updateForm'"
        :action="route('admin.footer.update', $setting->id)"
        :method="'PATCH'"
    >

        <div class="d-flex flex-column gap-4">
            <ul class="nav nav-pills flex-nowrap overflow-x-auto px-3 px-xs-4 mx-n3 mb-n2 mx-xs-n4 gap-3 pb-2">
                <li class="nav-item">
                    <x-admin.button
                        class="text-uppercase text-nowrap active"
                        data-bs-toggle="pill"
                        data-bs-target="#info"
                        :btn="'btn-outline-secondary'"
                        :title="__('buttons.info')"
                    />
                </li>
                <li class="nav-item">
                    <x-admin.button
                        class="text-uppercase text-nowrap"
                        data-bs-toggle="pill"
                        data-bs-target="#socials"
                        :btn="'btn-outline-secondary'"
                        :title="__('buttons.socials')"
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
                        data-bs-target="#open-hours"
                        :btn="'btn-outline-secondary'"
                        :title="__('buttons.openHours')"
                    />
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="info">
                    <div class="d-flex flex-column gap-4">
                        <!-- title -->
                        <x-admin.field.text
                            :name="'info[title]'"
                            :value="$setting->data['info']['title'] ?? null"
                            :placeholder="__('fields.title')"
                        />

                        <!-- description -->
                        <x-admin.field.wysiwyg
                            :name="'info[description]'"
                            :value="$setting->data['info']['description'] ?? null"
                            :placeholder="__('fields.description')"
                            :height="150"
                        />

                        <!-- copyright -->
                        <x-admin.field.text
                            :name="'info[copyright]'"
                            :value="$setting->data['info']['copyright'] ?? null"
                            :placeholder="__('fields.copyright')"
                        />
                    </div>
                </div>

                <div class="tab-pane fade" id="socials">
                    <div class="d-flex flex-column gap-4">
                        @foreach(['facebook', 'instagram', 'viber', 'twitter', 'linkedin', 'youtube', 'whatsapp'] as $social)
                            <x-admin.field.text
                                :name="'socials[' . $social . ']'"
                                :value="$setting->data['socials'][$social] ?? null"
                                :placeholder="Str::ucfirst($social)"
                                :required="false"
                            />
                        @endforeach
                    </div>
                </div>

                <div class="tab-pane fade" id="contacts">
                    <div class="d-flex flex-column gap-4">
                        <x-admin.field.text
                            :name="'contacts[address]'"
                            :value="$setting->data['contacts']['address'] ?? null"
                            :placeholder="__('fields.address')"
                            :required="false"
                        />

                        <x-admin.field.tel
                            :name="'contacts[phone]'"
                            :value="$setting->data['contacts']['phone'] ?? null"
                            :placeholder="__('fields.phone')"
                            :required="false"
                        />

                        <x-admin.field.email
                            :name="'contacts[email]'"
                            :value="$setting->data['contacts']['email'] ?? null"
                            :placeholder="__('fields.email')"
                            :required="false"
                        />

                        <x-admin.field.text
                            :name="'contacts[map]'"
                            :value="$setting->data['contacts']['map'] ?? null"
                            :placeholder="__('fields.map')"
                            :required="false"
                        />
                    </div>
                </div>

                <div class="tab-pane fade" id="open-hours">
                    <div class="d-flex flex-column gap-4">
                        @foreach(['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $day)
                            <x-admin.field.text
                                :name="'open_hours[' . $day . ']'"
                                :value="$setting->data['open_hours'][$day] ?? null"
                                :placeholder="__('fields.' . $day)"
                            />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </x-admin.container>
@endsection
