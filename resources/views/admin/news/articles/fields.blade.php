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
                            :name="'title['. $lang .']'"
                            :value="old('title.' . $lang, isset($article) ? $article->getTranslation('title', $lang) : null)"
                            :placeholder="__('admin.title')"
                        />

                        <!-- short description -->
                        <x-admin.field.text
                            :name="'short_description['. $lang .']'"
                            :value="old('short_description.' . $lang, isset($article) ? $article->getTranslation('short_description', $lang) : null)"
                            :placeholder="__('admin.short_description')"
                            :required="false"
                        />

                        <!-- description -->
                        <x-admin.field.wysiwyg
                            :name="'description['. $lang .']'"
                            :value="old('description.' . $lang, isset($article) ? $article->getTranslation('description', $lang) : null)"
                            :placeholder="__('admin.description')"
                            :buttons="'blockquote|fontColor|list|image'"
                        />

                        <!-- seo title -->
                        <x-admin.field.text
                            :name="'seo_title['. $lang .']'"
                            :value="old('seo_title.' . $lang, isset($article) ? $article->getTranslation('seo_title', $lang) : null)"
                            :placeholder="__('admin.seo_title')"
                            :required="false"
                        />

                        <!-- seo description -->
                        <x-admin.field.text
                            :name="'seo_description['. $lang .']'"
                            :value="old('seo_description.' . $lang, isset($article) ? $article->getTranslation('seo_description', $lang) : null)"
                            :placeholder="__('admin.seo_description')"
                            :required="false"
                        />

                        <!-- seo keywords -->
                        <x-admin.field.text
                            :name="'seo_keywords['. $lang .']'"
                            :value="old('seo_keywords.' . $lang, isset($article) ? $article->getTranslation('seo_keywords', $lang) : null)"
                            :placeholder="__('admin.seo_keywords')"
                            :required="false"
                        />
                    </div>
                </x-admin.tabs.pane>
            @endforeach
        </x-slot:content>
    </x-admin.tabs.wrapper>

    <!-- category -->
    <x-admin.field.select
        :placeholder="__('admin.category')"
        :name="'category_id'"
    >
        @foreach($categories as $category)
            <option {{ isset($article) && $article->first_category?->id === $category->id ? 'selected' : null }} value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </x-admin.field.select>

    <!-- sort -->
    <x-admin.field.number
        :name="'sort'"
        :value="old('sort', isset($article) ? $article->sort : 10000)"
        :placeholder="__('admin.sort')"
    />

    <!-- active -->
    <x-admin.field.checkbox
        class="m-0 me-auto"

        :name="'active'"
        :value="1"
        :title="__('admin.show')"
        :checked="isset($article) ? $article->active : true"
        :required="false"
    />
</div>
