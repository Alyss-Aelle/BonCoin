@extends('layouts.client')
@section('main')

<!--banners-->
<section class="bg-cover bg-center bg-opacity-50" style="background-image: url(/images/8e9c00ab5b998bdcedc91714e69238712.jpg)">
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
       
        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Pick Up</h1>
      
        <p class="mb-8 text-lg font-normal text-white lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Votre site de revente en tout genre.<br> Maintenant disponible.</p>
        <div class="flex flex-col mb-8 lg:mb-16 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
            <a href="#articles" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-black rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                Voir Les Annonces
                <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </a>
           
        </div>
      
    </div>
</section>
<!--fin banners-->

<!--debut category tabs-->

<div class="border-b border-gray-200  dark:border-gray-700">
    <ul class="flex flex-wrap-mb-px text-sm  font-medium text-center text-gray-500 dark:text-gray-400">
        
        <li class="mr-2">
            @forelse ($categories as $itemCategory )
            <a href="{{route('trier',$itemCategory->id)}}" class="inline-flex p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                <svg aria-hidden="true" class="w-5 h-5 mr-2 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path></svg><p class=" text-black leading-none">{{$itemCategory->name}} </p>
            </a>
            @empty
            @endforelse
        </li>
    </ul>

</div>


<!--fin category tabs-->

 <!--Cards Annonces-->
<div class=" flex justify-center items-center py-20 ">
      <div class="md:px-1 md:grid md:grid-cols-2 lg:grid-cols-3 gap-5 space-y-4 md:space-y-0">
       
@forelse ($annonces as $itemAnnonce )

    <!--Titre-->
  <section id="articles">
<div class="max-w-sm bg-white px-6 pt-6 pb-2 rounded-xl shadow-lg transform hover:scale-105 transition duration-500">
    <h3 class="mb-3 text-xl font-bold text-indigo-600">{{$itemAnnonce->name}}</h3>
        <!--image-->
    <div class="relative">
      <img class="imgsize rounded-xl" src="{{Storage::url($itemAnnonce->image)}}" alt="Colors" />
      <p class="absolute top-0 bg-yellow-300 text-gray-800 font-semibold py-1 px-3 rounded-br-lg rounded-tl-lg">{{$itemAnnonce->prix}}€</p>
    </div>
     <!--description-->
    <h1 class="mt-4 text-gray-800 text-l font-bold cursor-pointer">{{Str::limit($itemAnnonce->description,50)}}</h1>
    <div class="my-4">
      <div class="flex space-x-1 items-center">
        <span>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 mb-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </span>
        <p>{{$itemAnnonce->created_at}}</p>
      </div>
      <div class="flex space-x-1 items-center">
        <span>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 mb-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
          </svg>
        </span>

        
            <!--Categorie-->

            
        <p>{{$itemAnnonce->category->name}}</p>
      </div>
      <div class="flex space-x-1 items-center">
        <span>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 mb-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
          </svg>
        </span>


            <!--Lieux-->
        <p>{{$itemAnnonce->lieux}}</p>
      </div>
          <!--bouton-->
      <a href="{{route('publicclient.detail',$itemAnnonce)}}" class="mt-4 text-xl w-full text-white bg-indigo-600 py-2 rounded-xl shadow-lg">Details</a>
    </div>

    <a href="{{route('profile.favoris.add',$itemAnnonce->id)}}">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
          </svg>
          
    </a>
    
  </div>
</section>
       <!--Fin Cards Annonces-->
            

@empty
    
@endforelse
</div>
</div>
@endsection