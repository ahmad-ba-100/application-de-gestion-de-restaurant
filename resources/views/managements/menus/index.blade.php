<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <i class=" text-warning fas fa-hamburger"></i> {{ __('Restaurant') }}
        </h2>
        <div   class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div   class="bg-warning" class="bg-warning" class="p-6 bg-white border-b border-gray-200">
                    Vous  êtes dans les Menu
                    
                </div>
            </div>
    </x-slot>
  
    
    <div class="container">
    <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                            <a href="/dashboard"class="btn btn-warning" class="btn btn-outline-secondary">
                                    <i  class="  fa fa-chevron-left"></i>
                                </a> 
                            </div>
                        </div>
                    </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                @include('layouts.sidebar')
                            </div>
                            <div class="col-md-8">
                                <div class="d-flex flex-row justify-content-between align-items-center border-bottom pb-1">
                                    <h3 class="text-secondary">
                                        <i class="fas fa-clipboard-list"></i> Menu
                                    </h3>
                               <a   href="{{route('menus.create')}}" class="btn btn-warning">
                                        <i class="fas fa-plus fa-x2"></i>
                                        
                                    </a>
                                </div>
                                <table class=" table table-hoble table-respossive-sm">
                                    <thead>
                                        <tr>
                                        <th>Id</th>
                                            <th>Titre</th>
                                            <th>Description</th>
                                            <th>Prix</th>
                                            <th>Catégorie</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach($menus as $menu)
                                        <tr>
                                        <td>
                                                    {{ $menu->id }}
                                                </td>
                                                <td>
                                                    {{ $menu->titre }}
                                                </td>
                                                <td>
                                                    {{ substr($menu->description,0,100)}}
                                                </td>
                                                <td>
                                                    {{ $menu->prix}} DH
                                                </td>
                                                <td>
                                                {{$menu->category['titre'] }}
                                                
                                                </td>
                                                
                                                <td>
                                                    <img src="{{ asset('images/menus/'.$menu->image) }}" alt="{{ $menu->titre}}"
                                                        class="fluid rounded" width="60" height="60"
                                                    >
                                                </td>
                                        <td class="d-flex flex-row justify-content-center align-items-center">
                                        <a href="{{ route('menus.edit',$menu->id) }}" class="btn btn-warning mr-1 ">
                                        <i class="fas fa-edit"></i>
                                        </a>
                                        <form id="{{ $menu->id }}" action="{{ route('menus.destroy',$menu->slug) }}" method="post">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button
                                                            onclick="
                                                                event.preventDefault();
                                                                if(confirm('Voulez vous supprimer la menu{{ $menu->titre }} ?'))
                                                                document.getElementById('{{$menu->id}}').submit()" class="btn btn-danger">
                                                                
                                                            
                                                            
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>

                                        
                                        </td>
                                        </tr>

                                        @endforeach
                                    </tbody>

                                </table>
                                <div class="my-3 d-flex justify-content-center align-items-center">
                                    {{ $menus->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    

</x-app-layout>
