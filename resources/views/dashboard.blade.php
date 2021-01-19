<x-header/>
    <div class="bg-yellow-400 py-10 px-10 mb-10 text-center text-white">
        <h1>Moja półka</h1>
    </div>
    <h2 class="text-center w-full">NOWOŚCI</h2>
    <div class="md:flex py-4 px-1 md:border-2 border-blue-500">
        @foreach($newest_books as $item)
            <div class="w-full md:w-1/4 md:mx-1 text-center">
                <a href="/books/single/{{$item->id}}">
                <img style="width:100%;height:400px;object-fit:cover;overflow:hidden;" src="{{ (!is_null($item->file_url)) ? asset('/storage/img/'.basename($item->file_url)) : asset('/storage/img/VCqKhFEZthXwVqof2KhBSeJpkBgybL5BlBu5URxy.jpeg') }}"/>
                <h2>{{$item->title}}</h2>
                <p>{{$item->author}}</p>
                <p>{{$item->year}}</p>
                <p>{{$item->category_name}}</p>
                <form method="POST" action="/statuses/addoredit">
                @csrf
                    <input type="hidden" name="status" value="planowane"/>
                    <input type="hidden" name="book_id" value="{{$item->id}}"/>
                    <button class="w-full bg-yellow-400 text-white rounded hover:bg-yellow-300 px-4 py-2 focus:outline-none" type="submit">Dodaj do planowanych</button>
                </form>
                </a>
            </div>
        @endforeach
    </div>
        <h2 class="text-center w-full mt-10">POLECANE DLA CIEBIE</h2>
    <div class="md:flex py-4 px-1 md:border-2 border-blue-500">
        @foreach($featured_books as $item)
            <div class="w-full md:w-1/5 md:mx-1 text-center">
                <a href="/books/single/{{$item->id}}">
                <img style="width:100%;height:400px;object-fit:cover;overflow:hidden;" src="{{ (!is_null($item->file_url)) ? asset('/storage/img/'.basename($item->file_url)) : asset('/storage/img/VCqKhFEZthXwVqof2KhBSeJpkBgybL5BlBu5URxy.jpeg') }}"/>
                <h2>{{$item->title}}</h2>
                <p>{{$item->author}}</p>
                <p>{{$item->year}}</p>
                </a>
            </div>
        @endforeach
    </div>
    <div class="bg-blue-200 py-4 px-1 md:px-48 my-10">
        <h2 class="text-center">Wyszukiwarka</h2>
        <form method="GET" action="/search-result">
            <input class="placeholder-black w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-500" type="text" name="search_slug" placeholder="Wpisz tytuł, autora lub rok wydania">
            <select class="mb-4 md:mb-0 w-full md:w-1/2 md:ml-32 border bg-white rounded px-3 py-2 outline-none" name="search_category">
                <option value="">Wybierz kategorię</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->category_name}}</option>
            @endforeach
            </select>
            <button class="w-full md:w-1/4 bg-yellow-400 text-white rounded hover:bg-yellow-300 px-4 py-2 focus:outline-none" type="submit">Szukaj</button>
        </form>
    </div>
<a href="?status=planowane#my_list"><button class="w-full md:w-1/5 bg-yellow-400 text-white rounded hover:bg-yellow-300 px-4 py-2 focus:outline-none my-1 md:ml-32">Planowane</button></a>
<a href="?status=przeczytane#my_list"><button class="w-full md:w-1/5 bg-yellow-400 text-white rounded hover:bg-yellow-300 px-4 py-2 focus:outline-none my-1">Przeczytane</button></a>
<a href="?status=odrzucone#my_list"><button class="w-full md:w-1/5 bg-yellow-400 text-white rounded hover:bg-yellow-300 px-4 py-2 focus:outline-none my-1">Odrzucone</button></a>
<a href="/dashboard#my_list"><button class="w-full md:w-1/5 bg-yellow-400 text-white rounded hover:bg-yellow-300 px-4 py-2 focus:outline-none my-1">Wszystkie</button></a>
<table class="w-full text-center border-2 border-blue-500 my-10" id="my_list">
    <tr>
    <th class="hidden md:block">Zdjęcie</th>
    <th>Tytuł</th>
    <th>Autor</th>
    <th>Kategoria</th>
    <th>Status</th>
    </tr>
    @foreach($books as $item)
        <tr>
        <td class="hidden md:block">
        <img style="width:100px;height:100px;object-fit:cover;overflow:hidden;" src="
{{ (!is_null($item->file_url)) ? asset('/storage/img/'.basename($item->file_url)) : asset('/storage/img/VCqKhFEZthXwVqof2KhBSeJpkBgybL5BlBu5URxy.jpeg') }}"/>
        </td>
        <td><a href="/books/single/{{$item->book_id}}">{{$item->title}}</a></td>
        <td>{{$item->author}}</td>
        <td>{{$item->category_name}}</td>
        <td>{{$item->status}}</td>
        </tr>
    @endforeach
</table>
<x-footer/>
