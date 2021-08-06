@inject('layoutHelper', '\JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')

@php( $dashboard_url = View::getSection('dashboard_url') ?? config('adminlte.dashboard_url', 'home') )

@if (config('adminlte.use_route_url', false))
    @php( $dashboard_url = $dashboard_url ? route($dashboard_url) : '' )
@else
    @php( $dashboard_url = $dashboard_url ? url($dashboard_url) : '' )
@endif

<a href="{{ $dashboard_url }}"
    @if($layoutHelper->isLayoutTopnavEnabled())
        class="navbar-brand logo-switch {{ config('adminlte.classes_brand') }}"
    @else
        class="brand-link bg-white{{ config('adminlte.classes_brand') }}"
    @endif>

    {{-- Small brand logo --}}
    <img src="{{ asset('img/logo50.png') }}"
         alt="{{ config('adminlte.logo_img_alt', 'AdminLTE') }}"
         class="{{ config('adminlte.logo_img_class') }} logo-xs">

    {{-- Large brand logo --}}
    <img src="{{ asset('img/logo.png') }}"
         alt="{{ config('adminlte.logo_img_alt', 'AdminLTE') }}"
         class="{{ config('adminlte.logo_img_class')}} logo-xl">
         <br/>
         <p class="name-user logo-xl">{{ Auth::user()->name }}</p>
    {{-- <span class="brand-text font-weight-light {{ config('adminlte.classes_brand_text')}} logo-xl">
        <br/>
        <strong class="">{{ Auth::user()->name }}</strong>
    </span> --}}

</a>
