<x-header/>
    <div class="bg-yellow-400 py-10 px-10 mb-10 text-center text-white">
        <h1>Lista wszystkich kategorii</h1>
    </div>
<a href="/categories/add"><button class="bg-yellow-400 text-white rounded hover:bg-yellow-300 px-4 py-2 focus:outline-none">Dodaj kategorię</button></a>
<br/><br/>
<table border="1">
<tr>
<th>Nazwa kategorii</th>
<th>Stworzona</th>
<th>Aktualizowana</th>
<th>Akcje</th>
</tr>
@foreach($data as $item)
<tr>
<td class="text-center"><a href="/categories/single/{{$item->id}}">{{$item->category_name}}</a></td>
<td class="text-center">{{$item->created_at}}</td>
<td class="text-center">{{$item->updated_at}}</td>
<td class="text-center"><a href="/categories/edit/{{$item->id}}">Edit</a></td>
</tr>
@endforeach
</table>
<x-footer/>
