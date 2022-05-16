{{--
<div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
    @php $available_locales = [ 'English' => 'en','Hebrew' => 'he'];
    $current_locale = 'en';
 @endphp
    @foreach($available_locales as $locale_name => $available_locale)
        @if($available_locale === $current_locale)
            <span class="ml-2 mr-2 text-gray-700">{{ $locale_name }}</span>
        @else
            <a class="ml-1 underline ml-2 mr-2" href="language/{{ $available_locale }}">
                <span>{{ $locale_name }}</span>
            </a>
        @endif
    @endforeach
</div>
--}}


{{--<li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
        <i class="flag-icon flag-icon-us">Language</i>
    </a>
    <div class="dropdown-menu dropdown-menu-right p-0" style="left: inherit; right: 0px;">
        <a href="#" class="dropdown-item active">
            <i class="flag-icon flag-icon-us mr-2"></i> English
        </a>
        <a href="#" class="dropdown-item">
            <i class="flag-icon flag-icon-de mr-2"></i> Hebrew
        </a>
        <a href="#" class="dropdown-item">
            <i class="flag-icon flag-icon-fr mr-2"></i> French
        </a>
        <a href="#" class="dropdown-item">
            <i class="flag-icon flag-icon-es mr-2"></i> Spanish
        </a>
    </div>
</li>--}}


{{--<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ Config::get('languages')[App::getLocale()] }}
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        @foreach (Config::get('languages') as $lang => $language)
            @if ($lang != App::getLocale())
                <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"> {{$language}}</a>
            @endif
        @endforeach
    </div>
</li>--}}

<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="flag-icon flag-icon-{{Config::get('languages')[App::getLocale()]['flag-icon']}}"></span> {{ Config::get('languages')[App::getLocale()]['display'] }}
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        @foreach (Config::get('languages') as $lang => $language)
            @if ($lang != App::getLocale())
                <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"><span class="flag-icon flag-icon-{{$language['flag-icon']}}"></span> {{$language['display']}}</a>
            @endif
        @endforeach
    </div>
</li>
