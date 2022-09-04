<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">


    <div class="app-brand demo ">
        <a href="{{route('home')}}" class="app-brand-link">
            <img src="{{ asset('frest-assets/logo.png') }}" width="100%">
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx menu-toggle-icon d-none d-xl-block fs-4 align-middle"></i>
            <i class="bx bx-x d-block d-xl-none bx-sm align-middle"></i>
        </a>
    </div>


    <div class="menu-divider mt-0  ">
    </div>

    <div class="menu-inner-shadow"></div>



    <ul class="menu-inner py-1">
        <li class="menu-item active">
            <a href="{{route('home')}}" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-home"></i>
                <div data-i18n="{{ __('Dashboard') }}">{{ __('Dashboard') }}</div>
            </a>
        </li>
    </ul>



</aside>
<!-- / Menu -->
