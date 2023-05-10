@extends('layouts.admin')
@section('main')
    
<form  action="{{route('admin.category')}}" method="post">   
    @csrf
    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Ajouter</label>
    <div class="relative">

        <input type="text"  name="category" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ajouter une catégorie" required>
        <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ajouter</button>
    </div>
</form>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg py-10">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>

                <th scope="col" class="px-6 py-3">
                    Category
                </th>

                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>

            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        @forelse ($categories as $itemCategory )
                        
                        
                    <td class="px-6 py-4">
                        <form action="{{route('admin.category.edit',$itemCategory->id)}}"  method="post">   
                            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Modifier</label>
                            <div class="relative">

                               
                                <input type="text"name="category" value="{{$itemCategory->name}}" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ajouter une catégorie" required>

                                <button type="submit"  class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Modifier</button>
                            </div>
                        </form>
                    </td>
    
                    <td class="px-6 py-4">
                       
                        <a  href="{{route('admin.category.destroy',$itemCategory->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Supprimer</a>
                        </td>
            </tr>
                    @empty
                        
                    @endforelse

    



        </tbody>
    </table>
</div>

@endsection