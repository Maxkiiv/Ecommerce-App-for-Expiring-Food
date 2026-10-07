<div class="max-lg:collapse bg-base-200 lg:mb shadow-sm w-full rounded-md">
    <input id="navbar-1-toggle" class="peer hidden" type="checkbox" />
    <label for="navbar-1-toggle" class="fixed inset-0 hidden max-lg:peer-checked:block"></label>
    <div class="collapse-title navbar">
        <div class="navbar-start">
            <label for="navbar-1-toggle" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </label>
            <button class="btn btn-ghost text-xl">{{ config('appsettings.store_name') }}</button>
        </div>
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
                <li><a href="{{ route('home.index') }}">Home</a></li>
                <li><a href="{{ route('store.index') }}">Store</a></li>
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @endguest
                @auth
                    <li>
                        <details>
                            <summary>Profile</summary>
                            <ul class="p-2 bg-base-100 w-40 z-1">
                                <li><a href="{{ route('cart.index') }}">Cart</a></li>
                                <li><a href="#">Order History</a></li>
                                <li><a href="{{ route('appearance.edit') }}">Appearance</a></li>
                                <li><a href="{{ route('profile.edit') }}">Profile</a></li>
                                <li><a href="{{ route('security.edit') }}">Security</a></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </details>
                    </li>
                    <li><a href="{{ route('filament.admin.pages.dashboard') }}">Dashboard</a></li>
                @endauth
                <li><a href="#">About</a></li>
            </ul>
        </div>
        {{-- <div class="navbar-end">
            <input type="text" placeholder="Search" class="input input-bordered w-64 lg:w-auto" />
        </div> --}}

        @auth
            <div class="navbar-end">
                <ul class="menu menu-horizontal px-1">
                    <li><a href="{{ route('cart.index') }}">
                            <div class="indicator">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <span class="badge badge-sm indicator-item"><x-ui.button.cart-icon /></span>
                            </div>
                        </a></li>
                </ul>

                <!-- NAVBAR PROFILE -->
                <div class="dropdown dropdown-end">
                    <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                        <div class="w-10 rounded-full">
                            <img alt="Tailwind CSS Navbar component"
                                src="{{ asset('storage/images/profiles/default.png') }} " />
                        </div>
                    </div>
                    <ul tabindex=" -1"
                        class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                        <li>
                            <a href="{{ route('profile.edit') }}" class="justify-between">
                                Profile
                                <span class="badge">Edit</span>
                            </a>
                        </li>
                        <li><a href="{{ route('appearance.edit') }}">Appearance</a></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
                <!-- END NAVBAR PROFILE -->
            </div>
        @endauth



    </div>

    {{-- Responsive Menu --}}
    <div class="collapse-content lg:hidden z-1">
        <ul class="menu">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('store.index') }}">Store</a></li>
            <li><a href="#">About</a></li>
            @auth
                <li>
                    <a href="#">Profile</a>
                    <ul>
                        <li><a href="{{ route('cart.index') }}">Cart</a></li>
                        <li><a href="#">Order History</a></li>
                        <li><a href="{{ route('appearance.edit') }}">Appearance</a></li>
                        <li><a href="{{ route('profile.edit') }}">Profile</a></li>
                        <li><a href="{{ route('security.edit') }}">Security</a></li>
                        <li><a href="#">Order History</a></li>
                        <li><a href="#">Sign Out</a></li>
                    </ul>
                </li>
            @endauth
        </ul>
    </div>
</div>
