<x-header/>
    <div class="bg-yellow-400 py-10 px-10 mb-10 text-center text-white">
        <h1>Książka: {{$book->title}}</h1>
    </div>

<div class="md:flex py-4 px-1 md:mx-1 text-center">
  <div class="w-full md:w-1/3 md:mx-1">
    <img style="width:100%;height:550px;object-fit:cover;overflow:hidden;" src="
{{ (!is_null($book->file_url)) ? asset('/storage/img/'.basename($book->file_url)) : asset('/storage/img/VCqKhFEZthXwVqof2KhBSeJpkBgybL5BlBu5URxy.jpeg') }}"
/>
  </div>
  <div class="w-full md:w-2/3 md:mx-1 md:py-16 px-4">
    <div class="md:grid grid-cols-2">
      <div>
        <h2>Tytuł:</h2>
        <p>{{$book->title}}</p>
      </div>
      <div>
        <h2>Autor:</h2>
        <p>{{$book->author}}</p>
      </div>
      <div>
        <h2>Rok wydania:</h2>
        <p>{{$book->year}}</p>
      </div>
      <div>
        <h2>Kategoria:</h2>
        <p>{{$category->category_name}}</p>
      </div>
      <div>
        <h2>Ocena:</h2>
        <p>{{$grade}}</p>
      </div>
    </div>
    <div class="md:flex md:mx-1">
    <div class="w-full md:w-1/2 px-4 py-4">
      @if (Auth::check())
      <h2 class="my-4">Oceń książke</h2>
      <form action="/grades/addoredit" method="POST">
        @csrf
        <select class="mb-4 md:mb-0 w-full border bg-white rounded px-3 py-2 outline-none" name="value">
          <option value="1" {{ ( $user_grade == 1) ? 'selected' : '' }}>1</option>
          <option value="2" {{ ( $user_grade == 2) ? 'selected' : '' }}>2</option>
          <option value="3" {{ ( $user_grade == 3) ? 'selected' : '' }}>3</option>
          <option value="4" {{ ( $user_grade == 4) ? 'selected' : '' }}>4</option>
          <option value="5" {{ ( $user_grade == 5) ? 'selected' : '' }}>5</option>
          <option value="6" {{ ( $user_grade == 6) ? 'selected' : '' }}>6</option>
          <option value="7" {{ ( $user_grade == 7) ? 'selected' : '' }}>7</option>
          <option value="8" {{ ( $user_grade == 8) ? 'selected' : '' }}>8</option>
          <option value="9" {{ ( $user_grade == 9) ? 'selected' : '' }}>9</option>
          <option value="10" {{ ( $user_grade == 10) ? 'selected' : '' }}>10</option>     
        </select>
        <input type="hidden" name="book_id" value="{{$book->id}}"/>
        <button class="mt-4 w-full bg-yellow-400 text-white rounded hover:bg-yellow-300 px-4 py-2 focus:outline-none" type="submit">Oceń</button>
      </form>
      @endif
    </div>
    <div class="w-full md:w-1/2 px-4 py-4">
      @if (Auth::check())
      <h2 class="my-4">Dodaj status</h2>
      <form action="/statuses/addoredit" method="POST">
        @csrf
        <select class="mb-4 md:mb-0 w-full border bg-white rounded px-3 py-2 outline-none" name="status">
          <option value="planowane" {{ ( $user_status == 'planowane') ? 'selected' : '' }}>Planowane</option>
          <option value="przeczytane" {{ ( $user_status == 'przeczytane') ? 'selected' : '' }}>Przeczytane</option>
          <option value="odrzucone" {{ ( $user_status == 'odrzucone') ? 'selected' : '' }}>Odrzucone</option>    
        </select>
        <input type="hidden" name="book_id" value="{{$book->id}}"/>
        <button class="mt-4 w-full  bg-yellow-400 text-white rounded hover:bg-yellow-300 px-4 py-2 focus:outline-none" type="submit">Dodaj status</button>
      </form>
      @endif
    </div>
    </div>
  </div>
</div>
<div class="text-center">
  <h2>Opis:</h2>
  <p>{{$book->description}}</p>
</div>
<x-footer/>
