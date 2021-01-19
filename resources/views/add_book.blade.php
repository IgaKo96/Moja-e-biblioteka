<x-header/>
	<div class="bg-yellow-400 py-10 px-10 mb-10 text-center text-white">
		<h1>Dodaj książkę</h1>
	</div>
<form class="px-4 md:mx-96 md:px-4 md:py-4 md:border-2 md:border-blue-500" action="/books/add" method="POST" enctype="multipart/form-data">
	@csrf
	<input class="placeholder-black w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-500" type="text" name="title" placeholder="Tytuł książki" autofocus="true" /><br/><br/>
	<input class="placeholder-black w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-500" type="text" name="author" placeholder="Autor książki" /><br/><br/>
	<textarea class="placeholder-black w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" name="description" placeholder="Opis książki"></textarea><br/><br/>
	<select class="w-full border bg-white rounded px-3 py-2 outline-none" name="category_id">
		@foreach($categories as $category)
  		<option value="{{$category->id}}">{{$category->category_name}}</option>
  		@endforeach
	</select><br/><br/>
	<input class="placeholder-black w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-500" type="text" name="year" placeholder="Rok wydania" /><br/><br/>
	<input class="placeholder-black w-full text-gray-700 px-3 py-2 border rounded" type="file" name="file"/><br/><br/>
	<button class="bg-yellow-400 text-white rounded hover:bg-yellow-300 px-4 py-2 focus:outline-none" type="submit">Dodaj</button>
</form>
<x-footer/>
