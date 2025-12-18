@extends('public.layouts.base')

@section('content')
    <section class="container inner-page-head is-text-left">
        <h1 class="inner-page-title">Imprint</h1>
    </section>

    <section class="container formatted-text inner-page-content">
        <p>LINDEMANN LAW AG (“LINDEMANNLAW”)</p>
        <p>
            UID <a href="https://www.uid.admin.ch/Detail.aspx?uid_id=CHE189957041">CHE-189.957.041</a><br>
            LEI-Number 894500W9Q9NBHB64CR39
        </p>
        <p>
            Mühlgasse 11<br>
            8001 Zurich<br>
            Switzerland
        </p>
        <p>
            <a href="tel:41445707350">+41 44 570 73 50</a><br>
            <a href="mailto:mail@lindemannlaw.ch">mail@lindemannlaw.ch</a>
        </p>
    </section>

    @include('public.sections.contact-section')
@endsection
