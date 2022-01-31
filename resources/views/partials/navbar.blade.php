<header class='flex justify-between items-center py-5 text-lg'>
    <div><a href="{{ route('home') }}">Le S</a></div>
    <nav>
        <livewire:search />
        <a href="{{ route('jobs.index') }}" class="mr-5 hover:text-blue-500">Nos missions</a>
        @guest
            <a href="{{ route('login') }}" class="mr-5 hover:text-blue-500">Se connecter</a>
            <a href=" {{ route('register') }}" class="mr-5 hover:text-blue-500">S'enregistrer</a>
        @else
            <a href=" {{ route('home') }}" class="mr-5 hover:text-blue-500">Tableau de bord</a>
            <a href=" {{ route('conversation.index') }}" class="mr-5 hover:text-blue-500">Mes conversations</a>
            <a href=" {{ route('logout') }}" class="hover:text-blue-500"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();">Se deconnecter</a>
            <form id="logout-form" method="POST" action="{{ route('logout') }}" style="diplay: none">@csrf</form>
        @endguest
    </nav>
</header>
