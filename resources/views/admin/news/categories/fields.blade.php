<div class="d-flex flex-column gap-4">
    <x-admin.tabs.wrapper>
        <x-slot:nav>
            @foreach(supported_languages_keys() as $lang)
                <x-admin.tabs.nav-item
                    :is-active="$loop->first"
                    :target="'locale-' . $lang"
                    :title="$lang"
                />
            @endforeach
        </x-slot:nav>

        <x-slot:content>
            @foreach(supported_languages_keys() as $lang)
                <x-admin.tabs.pane :is-active="$loop->first" :id="'locale-' . $lang">
                    <div class="d-flex flex-column gap-4">
                        <!-- title -->
                        <x-admin.field.text
                            :name="'name['. $lang .']'"
                            :value="old('name.' . $lang, isset($category) ? $category->getTranslation('name', $lang) : null)"
                            :placeholder="__('admin.name')"
                        />
                    </div>
                </x-admin.tabs.pane>
            @endforeach
        </x-slot:content>
    </x-admin.tabs.wrapper>

    <!-- sort -->
    <x-admin.field.number
        :name="'sort'"
        :value="old('sort', isset($category) ? $category->sort : 100)"
        :placeholder="__('admin.sort')"
    />

    <!-- active -->
    <x-admin.field.radio-switch
        class="m-0 me-auto"

        :name="'active'"
        :title="__('admin.show')"
        :checked="isset($category) ? $category->active : true"
    />
</div>
