<form action="{{route('store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="helper-text" class="block mb-2  mt-10 text-sm font-medium text-gray-900 dark:text-white">description</label>
    <textarea row="4" name="formDescription"  aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="entrez une description...">

   </textarea>
<button type="submit">ajouter</button>

@foreach ($exercices as $itemExercice)
<p>{{$itemExercice->description}}</p>
    
@endforeach
</form>