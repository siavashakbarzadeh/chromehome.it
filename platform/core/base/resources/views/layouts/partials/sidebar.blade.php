@php
    $menus = dashboard_menu()->getAll();
@endphp
@foreach ($menus as $menu)
    @php $menu = apply_filters(BASE_FILTER_DASHBOARD_MENU, $menu); @endphp

        <li class="nav-item @if ($menu['active']) active @endif" id="{{ $menu['id'] }}">
            <a href="{{ $menu['url'] }}" class="nav-link nav-toggle">
                <i class="{{ $menu['icon'] }}"></i>
                <span class="title">
                {{ !is_array(trans($menu['name'])) ? trans($menu['name']) : null }}
                    {!! apply_filters(BASE_FILTER_APPEND_MENU_NAME, null, $menu['id']) !!}</span>
                @if (isset($menu['children']) && count($menu['children'])) <span class="arrow @if ($menu['active']) open @endif"></span> @endif
            </a>
            @if (isset($menu['children']) && count($menu['children']))
                <ul class="sub-menu @if (!$menu['active']) hidden-ul @endif">
                    @foreach ($menu['children'] as $item)
                        <li class="nav-item @if ($item['active']) active @endif" id="{{ $item['id'] }}">
                            <a href="{{ $item['url'] }}" class="nav-link">
                                <i class="{{ $item['icon'] }}"></i>
                                {{ trans($item['name']) }}
                                {!! apply_filters(BASE_FILTER_APPEND_MENU_NAME, null, $item['id']) !!}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </li>

    


@endforeach
<li class="nav-item" id="0">
    <a href="{{ route('admin.ecommerce.questionnaires.index') }}" class="nav-link nav-toggle">
        <i class="fa fa-question"></i>
        <span class="title">Questionari</span>
    </a>
</li>

{{--<li class="nav-item" id="1">--}}
{{--    <a href="{{ route('admin.ecommerce.offertype.view') }}" class="nav-link nav-toggle">--}}
{{--        <i class="fab fa-periscope"></i>--}}
{{--        <span class="title">Suggeriti</span>--}}
{{--    </a>--}}
{{--</li>--}}
{{--<li class="nav-item" id="2">--}}
{{--    <a href="{{ route('admin.ecommerce.offerte.list-view') }}" class="nav-link nav-toggle">--}}
{{--        <i class="fa fa-percent" aria-hidden="true"></i>--}}
{{--        <span class="title">Offerte</span>--}}
{{--    </a>--}}
{{--</li>--}}
