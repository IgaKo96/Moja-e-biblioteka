<x-header/>
    <div class="bg-yellow-400 py-10 px-10 mb-10 text-center text-white">
        <h1>Wyniki wyszukiwania</h1>
    </div>
<div class="md:grid grid-cols-6 text-center">
	@foreach($books as $book)
	<div class="md:mx-4 my-4">
		<a href="/books/single/{{$book->id}}">
		<img style="width:100%;height:400px;object-fit:cover;overflow:hidden;" src="
{{ (!is_null($book->file_url)) ? asset('/storage/img/'.basename($book->file_url)) : asset('/storage/img/VCqKhFEZthXwVqof2KhBSeJpkBgybL5BlBu5URxy.jpeg') }}"
/>
		<h2>Tytuł:</h2>
		<p>{{$book->title}}</p>
		<h2>Autor:</h2>
		<p>{{$book->author}}</p>
		<h2>Rok wydania</h2>
		<p>{{$book->year}}</p>
		</a>
	</div>
	@endforeach
</div>
<x-footer/>

