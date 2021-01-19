<head>
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<style>
  h1 {
    font-size:32px;
  }
  h2 {
    font-size:24px;
  }
  h3 {
    font-size:19px;
  }
  h4 {
    font-size:16px;
  }
  h5 {
    font-size:13px;
  }
  h6 {
    font-size:11px;
  }
</style>
</head>
<nav x-data="{show:false}" class="flex items-center justify-between flex-wrap bg-blue-500 p-6">
  <div class="flex items-center flex-shrink-0 text-white mr-6">
    <a href="/"><img style="width:250px;height:103px;" src="{{asset('/storage/Logo2.png')}}"/></a>
  </div>
  <div class="block md:hidden">
    <button @click="show=!show" class="flex items-center px-3 py-2 border rounded text-gray-100 border-gray-200 hover:text-white hover:border-white">
      <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
    </button>
  </div>
  <div @click.away="show = false" :class="{ 'block': show, 'hidden': !show }" class="w-full block flex-grow md:flex md:justify-end md:w-auto">
    <div>
    <a href="/" class="block md:inline-block text-lg px-4 py-2 leading-none rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white hover:bg-white mt-4 md:mt-0">Strona główna</a>
    @if (Auth::check())
    @if(auth()->user()->isAdmin)
 	  <a href="/books/list" class="block md:inline-block text-lg px-4 py-2 leading-none rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 md:mt-0">Lista książek</a>
 	  <a href="/categories/list" class="block md:inline-block text-lg px-4 py-2 leading-none rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 md:mt-0">Lista kategorii</a>
    @endif
    
    <a href="/dashboard" class="block md:inline-block text-lg px-4 py-2 leading-none rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 md:mt-0">Moja półka</a>
    <a href="/user/profile" class="block md:inline-block text-lg px-4 py-2 leading-none rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 md:mt-0">Profil</a>
    <form class="block md:inline-block text-lg px-4 py-2 leading-none rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 md:mt-0" method="POST" action="{{ route('logout') }}">
    @csrf
    <a href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();">{{ __('Wyloguj') }}</a>
    </form>
    @else
    <a href="/login" class="block md:inline-block text-lg px-4 py-2 leading-none rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 md:mt-0">Zaloguj</a>
    <a href="/register" class="block md:inline-block text-lg px-4 py-2 leading-none rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 md:mt-0">Zarejestruj</a>
    @endif
    </div>
  </div>
</nav>
