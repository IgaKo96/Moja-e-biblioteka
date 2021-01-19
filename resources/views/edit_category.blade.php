<x-header/>
	<div class="bg-yellow-400 py-10 px-10 mb-10 text-center text-white">
		<h1>Edytuj kategorię</h1>
	</div>
<form class="px-4 md:mx-96 md:px-4 md:py-4 md:border-2 md:border-blue-500" action="" method="POST">
	@csrf
	<input class="placeholder-black w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-500" type="text" name="category_name" value="{{$category->category_name}}" placeholder="Nazwa kategorii" /><br/><br/>
	<button class="bg-yellow-400 text-white rounded hover:bg-yellow-300 px-4 py-2 focus:outline-none" type="submit">Edytuj</button>
</form>
<x-footer/>
