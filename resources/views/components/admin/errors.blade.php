@if($errors->any())
    <div {{ $attributes }}>
        @foreach($errors->all() as $message)
            <div>{{ $message }}</div>
        @endforeach
    </div>
@endif<?php
