<div class="d-flex flex-column gap-4">
    <!-- address -->
    <x-admin.field.text
        :name="'content_data['. config('app.locale') .'][address]'"
        :value="old('content_data'. config('app.locale') .'..address', data_get($page->content_data, 'address'))"
        :placeholder="__('admin.address')"
    />

    <x-admin.dynamic-fields.wrapper>
        @foreach(data_get($page->content_data, 'phones', []) as $phone)
            <x-admin.dynamic-fields.group>
                <div class="d-flex flex-column gap-4">
                    <!-- phone -->
                    <x-admin.field.tel
                        :name="'content_data['. config('app.locale') .'][phones][' . $loop->index . ']'"
                        :value="$phone"
                        :placeholder="__('admin.phone_number')"
                    />
                </div>
            </x-admin.dynamic-fields.group>
        @endforeach

        <x-slot:template>
            <x-admin.dynamic-fields.group>
                <div class="d-flex flex-column gap-4">
                    <!-- phone -->
                    <x-admin.field.tel
                        :name="'content_data['. config('app.locale') .'][phones][0]'"
                        :placeholder="__('admin.phone_number')"
                    />
                </div>
            </x-admin.dynamic-fields.group>
        </x-slot:template>
    </x-admin.dynamic-fields.wrapper>

    <x-admin.dynamic-fields.wrapper>
        @foreach(data_get($page->content_data, 'emails', []) as $email)
            <x-admin.dynamic-fields.group>
                <div class="d-flex flex-column gap-4">
                    <!-- email -->
                    <x-admin.field.email
                        :name="'content_data['. config('app.locale') .'][emails][' . $loop->index . ']'"
                        :value="$email"
                        :placeholder="__('admin.email')"
                    />
                </div>
            </x-admin.dynamic-fields.group>
        @endforeach

        <x-slot:template>
            <x-admin.dynamic-fields.group>
                <div class="d-flex flex-column gap-4">
                    <!-- email -->
                    <x-admin.field.email
                        :name="'content_data['. config('app.locale') .'][emails][0]'"
                        :placeholder="__('admin.email')"
                    />
                </div>
            </x-admin.dynamic-fields.group>
        </x-slot:template>
    </x-admin.dynamic-fields.wrapper>
</div>
