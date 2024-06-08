<nav x-data="{ open: false }" class="pt-10 pb-5 bg-high-purplle border-none fixed top-0 left-0 w-full z-50border-white">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">


                <!-- Navigation Links -->
                <div class="flex justify-center items-center space-x-8 sm:-my-px sm:ms-10 sm:flex text-white">
                    
                       
                   <a href="{{ url()->previous() }}">

                    <img class="w-10 h-10 min-w-10 min-h-10" src="{{ asset('imagens/seta.png') }}" alt="seta">
                   </a>
                </div>
            </div>

            <!-- Barra de pesquisa -->
            <form class="flex my-2.5 ml-6 flex-grow w-full border border-none rounded-full bg-purplle text-white"action="{{ route('posts.search') }}" method="GET ">

                <input required name="query"class="focus:ring-0 rounded-full bg-purplle w-full placeholder-white pl-8 border-none" type="text" placeholder="Pesquise">

                <button type="submit" class="flex justify-center items-center bg-orange rounded-r-full px-5">
                    <x-search-icon/>
                </button>

            </form>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6 rounded-full my-9 text-black">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button>
                            <img class="w-7 h-7 m-4 min-w-8 min-h-8" src="{{ asset('imagens/menu.png') }}" alt="seta">
                        </button>
                    </x-slot>

                    <x-slot name="content">

                        <x-dropdown-link :href="route('perfil')">
                            {{ __('Perfil') }}
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Configurações') }}
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('mustella')">
                            {{ __('Tela Inicial') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden text-white">
                <button @click="open = ! open">
                    <img class="w-7 h-7 m-4 min-w-8 min-h-8" src="{{ asset('imagens/menu.png') }}" alt="seta">
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden text-white sm:hidden">

        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('mustella')" :active="request()->routeIs('mustella')">
                {{ __('mustella') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-1 pb-1 border-none border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="space-y-1">
                <x-responsive-nav-link :href="route('perfil')">
                {{ __('Perfil') }}
                </x-responsive-nav-link>
            </div>

            <div class="mt-1 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Configurações') }}
                </x-responsive-nav-link>
            </div>

            <div class="mt-1 mb-1 space-y-1">
                <x-responsive-nav-link :href="route('mustella')">
                    {{ __('Tela Inicial') }}
                </x-responsive-nav-link>
            </div>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
