<div class="grid gap-4">
    <div class="d-flex flex-column gap-4 g-col-12 g-col-lg-5 g-col-xl-4">
        <!-- hero image -->
        <x-admin.field.image
            :name="'hero_image'"
            :placeholder="__('admin.hero_image') . ' ( 3 / 2 )'"
            :ratio="'3x2'"
            :src="isset($project) && $project->hasMedia($project->mediaHero) ? $project->getFirstMediaUrl($project->mediaHero, 'md-webp') : null"
            :required="isset($project) ? !$project->hasMedia($project->mediaHero) : true"
        />
    </div>

    <div class="d-flex flex-column gap-4 g-col-12 g-col-lg-7 g-col-xl-8">
        <x-admin.tabs.wrapper>
            <x-slot:nav>
                @foreach(supported_languages_keys() as $lang)
                    <x-admin.tabs.nav-item
                        :is-active="$loop->first"
                        :target="'main-locale-' . $lang"
                        :title="$lang"
                    />
                @endforeach
            </x-slot:nav>

            <x-slot:content>
                @foreach(supported_languages_keys() as $lang)
                    <x-admin.tabs.pane :is-active="$loop->first" :id="'main-locale-' . $lang">
                        <div class="d-flex flex-column gap-4">
                            <!-- title -->
                            <x-admin.field.text
                                :name="'title['. $lang .']'"
                                :value="old('title.' . $lang, isset($project) ? $project->getTranslation('title', $lang) : null)"
                                :placeholder="__('admin.title')"
                            />

                            <!-- short description -->
                            <x-admin.field.textarea
                                :name="'short_description['. $lang .']'"
                                :value="old('short_description.' . $lang, isset($project) ? $project->getTranslation('short_description', $lang) : null)"
                                :placeholder="__('admin.short_description')"
                            />

                            <!-- location -->
                            <x-admin.field.text
                                :name="'location['. $lang .']'"
                                :value="old('location.' . $lang, isset($project) ? $project->getTranslation('location', $lang) : null)"
                                :placeholder="__('admin.location')"
                            />

                            <x-admin.dynamic-fields.wrapper>
                                @php
                                    $tags = isset($project) ? $project->getTranslation('tags', $lang) : [];
                                @endphp

                                @foreach($tags ?: [] as $tag)
                                    <x-admin.dynamic-fields.group>
                                        <div class="d-flex flex-column gap-4">
                                            <!-- tag name -->
                                            <x-admin.field.text
                                                :name="'tags['. $lang .'][' . $loop->index . ']'"
                                                :value="$tag"
                                                :placeholder="__('admin.tag_name')"
                                            />
                                        </div>
                                    </x-admin.dynamic-fields.group>
                                @endforeach

                                <x-slot:template>
                                    <x-admin.dynamic-fields.group>
                                        <div class="d-flex flex-column gap-4">
                                            <!-- tag name -->
                                            <x-admin.field.text
                                                :name="'tags['. $lang .'][0]'"
                                                :placeholder="__('admin.tag_name')"
                                            />
                                        </div>
                                    </x-admin.dynamic-fields.group>
                                </x-slot:template>
                            </x-admin.dynamic-fields.wrapper>
                        </div>
                    </x-admin.tabs.pane>
                @endforeach
            </x-slot:content>
        </x-admin.tabs.wrapper>

        <!-- sort -->
        <x-admin.field.number
            :name="'sort'"
            :value="old('sort', isset($project) ? $project->sort : 1000)"
            :placeholder="__('admin.sort')"
        />

        <!-- active -->
        <x-admin.field.radio-switch
            class="m-0 me-auto"

            :name="'active'"
            :title="__('admin.show')"
            :checked="isset($project) ? $project->active : true"
        />
    </div>
</div>
