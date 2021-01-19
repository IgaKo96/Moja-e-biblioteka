<x-header/>
<h1>List all grades</h1>
<a href="/grades/add"><button>Add Grade</button></a>
<br/><br/>
<table border="1">
<tr>
<th>Value</th>
<th>Book id</th>
<th>User id</th>
<th>Created at</th>
<th>Updated at</th>
</tr>
@foreach($data as $item)
<tr>
<td>{{$item->value}}</td>
<td>{{$item->book_id}}</td>
<td>{{$item->user_id}}</td>
<td>{{$item->created_at}}</td>
<td>{{$item->updated_at}}</td>
</tr>
@endforeach
</table>