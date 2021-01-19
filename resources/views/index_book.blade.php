<x-header/>
    <div class="bg-yellow-400 py-10 px-10 mb-10 text-center text-white">
        <h1>Lista wszystkich książek</h1>
    </div>
<a href="/books/add"><button class="bg-yellow-400 text-white rounded hover:bg-yellow-300 px-4 py-2 focus:outline-none">Dodaj książke</button></a>
<br/><br/>
<table border="1">
<tr>
<th>Obraz</th>
<th>Tytuł</th>
<th>Autor</th>
<th>ID kategorii</th>
<th>Rok</th>
<th>Opis</th>
<th>Akcje</th>
</tr>
@foreach($data as $item)
<tr>
<td>
<img style="width:100px;height:100px;" src="
{{ (!is_null($item->file_url)) ? asset('/storage/img/'.basename($item->file_url)) : asset('/storage/img/VCqKhFEZthXwVqof2KhBSeJpkBgybL5BlBu5URxy.jpeg') }}"
/>
</td>
<td class="text-center"><a href="/books/single/{{$item->id}}">{{$item->title}}</a></td>
<td class="text-center">{{$item->author}}</td>
<td class="text-center">{{$item->category_id}}</td>
<td class="text-center">{{$item->year}}</td>
<td class="text-center">{{$item->description}}</td>
<td class="text-center"><a href="/books/edit/{{$item->id}}">Edit</a></td>
</tr>
@endforeach
</table>
<x-footer/>


