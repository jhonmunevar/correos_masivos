@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{ config('app.name') }}
        @endcomponent
    @endslot

    {{-- Body --}}
    {{ $slot }}

    {{-- Subcopy --}}
    @isset($subcopy)
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endisset

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            Sede: Cra 7 # 63-44, Bogotá Colombia<br>
            Conmutador: (+57) (1) 4846980<br>
            Ventanilla de radicación: Cra 7 # 63-44, Bogotá Colombia<br>
            Horario de atención al público: Lunes a viernes, 8:00am a 1:00pm y de 2:00pm a 5:30pm<br>
            Correo y notificaciones judiciales: info@jep.gov.co<br>
            © {{ date('Y') }} {{ config('app.name') }}.
        @endcomponent
    @endslot
@endcomponent
