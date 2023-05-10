@extends('layouts.admin')
@section('main')

@forelse ($annonces as $itemAnnonce )
    
<div class="mx-auto px-4 py-4 max-w-xl my-auto">
    <div class="bg-gray-50 md:bg-white md:shadow-xl rounded-lg mb-6 ">
      
      <a target="_blank" rel="noreferrer noopener" href="https://www.wionews.com/science/astronomer-clicks-photo-of-potentially-hazardous-asteroid-coming-towards-earth-451098">
        <div class="md:flex-shrink-0">

          <img src="{{Storage::url($itemAnnonce->image)}}" alt="uploaded cover image"
            class="object-cover h-full w-full rounded-lg rounded-b-none">

        </div>
      </a>
      
      <div class="py-1">
        <div class="p-4">
          <h2 class="truncate font-bold mb-2 md:mt-4 text-2xl text-gray-800 tracking-normal">{{$itemAnnonce->name}}</h2>
          
          <p class="break-words text-sm text-gray-700 px-2 mr-1">{{$itemAnnonce->description}}</p>
          
        </div>
        

        <div class="flex items-center justify-between p-2 md:p-4 md:mx-4">
          <a target="_blank" rel="noreferrer noopener" href="">
            <div class="flex items-center">
              <div class="text-sm ml-2">
                <p class=" text-black leading-none">{{$itemAnnonce->lieux}} </p>
                <p class=" text-black leading-none">{{$itemAnnonce->category->name}} </p>
                <p class="text-black leading-none">{{$itemAnnonce->prix}} €</p>
                

                
                <p class="text-gray-700">{{$itemAnnonce->created_at}}</p>
                
              </div>
            </div>
          </a>
          <!--bouton suppression-->
          <a href="{{route('admin.annonce.destroy',$itemAnnonce->id)}}"  class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m6 4.125l2.25 2.25m0 0l2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
              </svg>
            </a>
                      <!--bouton approuvation-->
          <a href="#"  class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 8.25H7.5a2.25 2.25 0 00-2.25 2.25v9a2.25 2.25 0 002.25 2.25h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25H15m0-3l-3-3m0 0l-3 3m3-3V15" />
              </svg>
              
            </a>
            <!--bouton modification-->
          <a target="_blank" rel="noreferrer noopener" href="{{route('admin.annonce.edit', $itemAnnonce->id)}}"
            class="bg-orange-400 hover:bg-orange-500 text-white rounded-full px-8 py-2">
            Modifier
          </a>
        </div>
      </div>
    </div>
  </div>
@empty
    
@endforelse

@endsection


