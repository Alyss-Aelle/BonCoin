@extends('layouts.admin')
@section('main')



    <!-- formulaire titre-->
    <form action="{{route('admin.annonce.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        
    <label for="helper-text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">titre</label>
    <input type="text" name="formTitre" value="venddescrabes" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="entrez un titre.. ">

    @error('formTitre')
    Vous devez saisir un titre 
    @enderror

    <!-- formulaire description-->

        
    <label for="helper-text" class="block mb-2  mt-10 text-sm font-medium text-gray-900 dark:text-white">description</label>
    <textarea row="4" name="formDescription"  aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="entrez une description...">

    </textarea>


    @error('formDescription')
    Vous devez saisir une Description
    @enderror

    <!-- formulaire Lieux-->
    <label for="helper-text" class="block mb-2 mt-10 text-sm font-medium text-gray-900 dark:text-white">Lieux</label>
    <input type="text" name="formLieux"  aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="entrez un Lieux.. ">

    @error('formLieux')
    Vous devez saisir un lieux 
    @enderror

    <!-- formulaire catégorie-->
    <select name="category" class="mt-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option selected>Choisir une catégorie</option>
        @foreach ($annonceCategories as $itemCategory)
        <!--selection d'une catégorie-->
        <option value="{{$itemCategory->id}}" selected>{{$itemCategory->name}}</option>
       @endforeach



       <div class="mb-5">
        @csrf
  <label for="image" class="mb-3 mt-10 block text-base font-medium text-orange-700">
    Image
  </label>

  <input  type="file"
          name="formImg" 

          
    placeholder="Ajoutez votre image"
    class="w-full rounded-md border border-red-200 bg-white py-3 px-6 text-gray-700 outline-none focus:border-purple-300 focus:shadow-md"
    />
    <!--Ajout de l'image -->
    @isset($itemImg)
    <div class="relative h-20 w-20 p-2">
      <img
        class="h-full w-full  object-cover object-center"
        src="{{Storage::url($itemImg->image)}}"
        alt=""
      />
      <span class="absolute right-0 bottom-0 h-2 w-2 rounded-full "></span>
    </div>
    @endisset

    @error('image')
      Vous devez ajouter une imager au bon format
    @enderror
</div>

 <!-- formulaire prix-->

    
<label for="helper-text" class="block mb-2 mt-10 text-sm font-medium text-gray-900 dark:text-white">Prix</label>
<input name="formPrix" type="number" value="20" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="entrez un prix">




@error('formImg')
Vous devez ajouter une image
@enderror

    </select>







    <button type="submit" class="mt-10 text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Red to Yellow</button>







    </form>
@endsection