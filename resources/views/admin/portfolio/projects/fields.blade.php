<x-admin.tabs.wrapper>
    <x-slot:nav>
        <x-admin.tabs.nav-item
            :is-active="true"
            :target="'main-section'"
            :title="__('admin.main')"
        />

        <x-admin.tabs.nav-item
            :target="'description-section'"
            :title="__('admin.description')"
        />

        <x-admin.tabs.nav-item
            :target="'files-section'"
            :title="__('admin.files')"
        />

        <x-admin.tabs.nav-item
            :target="'seo-section'"
            :title="__('admin.seo')"
        />
    </x-slot:nav>

    <x-slot:content>
        <x-admin.tabs.pane :is-active="true" :id="'main-section'">
            @include('admin.portfolio.projects.tabs.main')
        </x-admin.tabs.pane>

        <x-admin.tabs.pane :id="'description-section'">
            @include('admin.portfolio.projects.tabs.description')
        </x-admin.tabs.pane>

        <x-admin.tabs.pane :id="'files-section'">
            @include('admin.portfolio.projects.tabs.files')
        </x-admin.tabs.pane>

        <x-admin.tabs.pane :id="'seo-section'">
            @include('admin.portfolio.projects.tabs.seo')
        </x-admin.tabs.pane>
    </x-slot:content>
</x-admin.tabs.wrapper>
