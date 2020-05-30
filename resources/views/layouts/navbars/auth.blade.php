<div class="sidebar" data-color="black" data-active-color="success">
    <div class="logo">
        <a href="javascript:void0" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ asset('/image/372x372.png') }}" alt="asd">
            </div>
        </a>
        <a href="javascript:void0" class="simple-text logo-normal">
            {{ __('YOOOOOON') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            @can('admin')
                <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                    <a href="{{ route('page.index', 'dashboard') }}">
                        <i class="nc-icon nc-bank"></i>
                        <p>{{ __('Dashboard') }}</p>
                    </a>
                </li>
                <li class="{{ $elementActive == 'user' ? 'active' : '' }}">
                    <a href="{{ route('user.index') }}">
                        <i class="nc-icon nc-badge"></i>
                        <p>{{ __('Akun') }}</p>
                    </a>
                </li>
            @endcan

            @can('ppc')
                <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                    <a href="{{ route('ppc.dashboard') }}">
                        <i class="nc-icon nc-bank"></i>
                        <p>{{ __('Dashboard') }}</p>
                    </a>
                </li>
                <li class="{{ $elementActive == 'ppc-dex' ? 'active' : '' }}">
                    <a href="{{ route('ppc.index') }}">
                        <i class="nc-icon nc-paper"></i>
                        <p>{{ __('Buat Pengajuan') }}</p>
                    </a>
                </li>
{{--                    <li class="{{ $elementActive == 'ppc-dex-draft' ? 'active' : '' }}">--}}
{{--                        <a href="{{ route('ppc.draftDex') }}">--}}
{{--                            <i class="nc-icon nc-paper"></i>--}}
{{--                            <p>{{ __('Draft Pengajuan') }}</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
            @endcan

            @can('ppcMan')
                <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                    <a href="{{ route('ppc.dashboard') }}">
                        <i class="nc-icon nc-bank"></i>
                        <p>{{ __('Dashboard') }}</p>
                    </a>
                </li>
                <li class="{{ $elementActive == 'signature' ? 'active' : '' }}">
                    <a href="{{ route('ppc.sigview') }}">
                        <i class="nc-icon nc-badge"></i>
                        <p>{{ __('Tanda Tangan') }}</p>
                    </a>
                </li>
                <li class="{{ $elementActive == 'ajuan' ? 'active' : '' }}">
                    <a href="{{ route('nyapp.dex') }}">
                        <i class="nc-icon nc-paper"></i>
                        <p>{{ __('Daftar Pengajuan') }}</p>
                    </a>
                </li>
                <li class="{{ $elementActive == 'hbapp' ? 'active' : '' }}">
                    <a href="{{ route('nyapp.hbapp') }}">
                        <i class="nc-icon nc-paper"></i>
                        <p>{{ __('Approved List') }}</p>
                    </a>
                </li>
                <li class="{{ $elementActive == 'hbrej' ? 'active' : '' }}">
                    <a href="{{ route('nyapp.hbrej') }}">
                        <i class="nc-icon nc-paper"></i>
                        <p>{{ __('Rejected List') }}</p>
                    </a>
                </li>
            @endcan

            @can('logMan')
                <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                    <a href="{{ route('logman.dash') }}">
                        <i class="nc-icon nc-bank"></i>
                        <p>{{ __('Dashboard') }}</p>
                    </a>
                </li>
                <li class="{{ $elementActive == 'signature' ? 'active' : '' }}">
                    <a href="{{ route('log.sigview') }}">
                        <i class="nc-icon nc-badge"></i>
                        <p>{{ __('Tanda Tangan') }}</p>
                    </a>
                </li>
                <li class="{{ $elementActive == 'ppmj-dex' ? 'active' : '' }}">
                    <a href="{{ route('logman.Ppmjin') }}">
                        <i class="nc-icon nc-minimal-right"></i>
                        <p>{{ __('PPMJ Masuk') }}</p>
                    </a>
                </li>
                <li class="{{ $elementActive == 'pmt-dex' ? 'active' : '' }}">
                    <a href="{{ route('logman.pmt') }}">
                        <i class="nc-icon nc-single-copy-04"></i>
                        <p>{{ __('Daftar PMT') }}</p>
                    </a>
                </li>
                <li class="{{ $elementActive == 'spk-dex' ? 'active' : '' }}">
                    <a href="{{ route('logman.spk') }}">
                         <i class="nc-icon nc-single-copy-04"></i>
                         <p>{{ __('Daftar SPK') }}</p>
                    </a>
                </li>
                <li class="{{ $elementActive == 'sjan-dex' ? 'active' : '' }}">
                    <a href="{{ route('logman.sjan') }}">
                         <i class="nc-icon nc-single-copy-04"></i>
                         <p>{{ __('Daftar SJAN') }}</p>
                    </a>
                </li>
            @endcan

            @can('logUudp')
                 <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                    <a href="{{ route('logman.dash') }}">
                            <i class="nc-icon nc-bank"></i>
                        <p>{{ __('Dashboard') }}</p>
                    </a>
                </li>
                <li class="{{ $elementActive == 'uudp' ? 'active' : '' }}">
                    <a href="{{route('logUudp.uudp')}}">
                        <i class="nc-icon nc-single-02"></i>
                        <p>{{ __('UUDP') }}</p>
                    </a>
                </li>
            @endcan

            @can('logStaff')
                <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                    <a href="{{ route('logman.dash') }}">
                        <i class="nc-icon nc-bank"></i>
                        <p>{{ __('Dashboard') }}</p>
                    </a>
                </li>
                <li class="{{ $elementActive == 'vendor' ? 'active' : '' }}">
                    <a href="{{ route('logstaff.vendorDex') }}">
                        <i class="nc-icon nc-air-baloon"></i>
                        <p>{{ __('Vendor') }}</p>
                    </a>
                </li>
                <li class="{{ $elementActive == 'po' ? 'active' : '' }}">
                    <a href="{{ route('logstaff.pmtPO') }}">
                        <i class="nc-icon nc-bank"></i>
                        <p>{{ __('PMT-PO')  }}</p>
                    </a>
                </li>
            @endcan

            @can('gudStaff')
                <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                    <a href="{{ route('gudMan.dash') }}">
                        <i class="nc-icon nc-bank"></i>
                        <p>{{ __('Dashboard') }}</p>
                    </a>
                </li>
                <li class="{{ $elementActive == 'pmt-dex' ? 'active' : '' }}">
                    <a href="{{ route('gudstaff.pmt') }}">
                        <i class="nc-icon nc-single-copy-04"></i>
                        <p>{{ __('Daftar PMT') }}</p>
                    </a>
                </li>
                <li class="{{ $elementActive == 'spk-dex' ? 'active' : '' }}">
                     <a href="{{ route('gudstaff.spk') }}">
                        <i class="nc-icon nc-single-copy-04"></i>
                        <p>{{ __('Daftar SPK') }}</p>
                     </a>
                </li>
                <li class="{{ $elementActive == 'sjan-dex' ? 'active' : '' }}">
                    <a href="{{ route('gudstaff.sjan') }}">
                        <i class="nc-icon nc-single-copy-04"></i>
                        <p>{{ __('Daftar SJAN') }}</p>
                    </a>
                </li>
            @endcan
        </ul>
    </div>
</div>
