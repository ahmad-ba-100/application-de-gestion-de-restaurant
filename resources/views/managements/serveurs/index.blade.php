<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <i class=" text-warning fas fa-hamburger"></i> {{ __('Restaurant') }}
        </h2>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-warning" class="p-6 bg-white border-b border-gray-200">
                    Vous  êtes dans les serveurs
                    
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
                                        <i class="fas fa-user-cog"></i> Serveurs
                                    </h3>
                               <a   href="{{route('serveurs.create')}}" class="btn btn-warning">
                                        <i class="fas fa-plus fa-x2"></i>
                                        
                                    </a>
                                </div>
                                <table class=" table table-hoble table-respossive-sm">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nom et Prénom</th>
                                            <th>Addresse</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($servants as $servant)
                                        <tr>
                                        <td>
                                            {{$servant->id}}
                                        </td>
                                        <td>
                                            {{$servant->nom}}
                                        </td>
                                        <td>
                                                    @if ($servant->adresse)
                                                        {{ $servant->adresse }}
                                                    @else
                                                        <span class="text-danger">
                                                            Non Disponible
                                                        </span>
                                                    @endif
                                                </td>
                                        <td class="d-flex flex-row justify-content-center align-items-center">
                                        <a href="{{ route('serveurs.edit',$servant->id) }}" class="btn btn-warning mr-1 ">
                                        <i class="fas fa-edit"></i>
                                        </a>
                                        <form id="{{ $servant->id }}" action="{{ route('serveurs.destroy',$servant->id) }}" method="post">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button
                                                            onclick="
                                                                event.preventDefault();
                                                                if(confirm('Voulez vous supprimer ce serveur {{ $servant->nom}} ?'))
                                                                document.getElementById('{{$servant->id}}').submit()" class="btn btn-danger">

                                                            
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>

                                        
                                        </td>
                                        </tr>

                                        @endforeach
                                    </tbody>

                                </table>
                                <div class="my-3 d-flex justify-content-center align-items-center">
                                    {{ $servants->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    

</x-app-layout>
