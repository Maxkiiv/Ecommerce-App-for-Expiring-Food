<div class="bg-base-200 border-b border-base-300">
    <div class="container mx-auto px-4 py-4">
        <div class="breadcrumbs text-sm">
            <ul>
                <li><a href="{{ route('home.index') }}" class="link-hover">Home</a></li>
                @if (Route::currentRouteName() != 'home' || Route::currentRouteName() != 'home.index')
                    <li>
                        <p>{{ Str::ucfirst(request()->segment(1)) }}</p>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
