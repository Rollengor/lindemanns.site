<div class="toast-alerts toast-container d-flex flex-column gap-3 position-fixed left-0 bottom-0 p-3">
    @stack('alerts')

    <x-admin.alert
        id="waitRequestProcessedMessage"
        class="hide"

        :title="__('titles.waiting')"
        :message="__('texts.requestProcessing')"
        :type="'info'"
        :alone="true"
    />

    @if($errors->any())
        @foreach($errors->all() as $message)
            <x-admin.alert
                :title="__('titles.error')"
                :message="$message"
                :type="'error'"
            />
        @endforeach
    @endif

    @if(session()->has('success'))
        <x-admin.alert
            :title="__('titles.success')"
            :message="session()->get('success')"
            :type="'success'"
        />
    @endif

    @if(session()->has('danger'))
        <x-admin.alert
            :title="__('titles.error')"
            :message="session()->get('danger')"
            :type="'error'"
        />
    @endif
</div>
