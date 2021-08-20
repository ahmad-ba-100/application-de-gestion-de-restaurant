<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
  
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Vous  êtes dans les serveurs
                    
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                            @include('layouts.sidebar')
                            </div>
                            <div class="col-md-8">
                                
                                    <h3 class="text-secondary border-bottom mb-3 p-2">
                                        <i class="fas fa-plus"></i> Ajouter un serveurs
                                    </h3>
                                
                                    <form action="{{route('serveurs.store')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input
                                            type="text" name="nom" id="nom"
                                            class="form-control"
                                            placeholder="Nom et Prénom"
                                        >
                                    </div>
                                    <div></br></div>
                                    <div class="form-group">
                                        <input
                                            type="text" name="adresse" id="adresse"
                                            class="form-control"
                                            placeholder="Adresse"
                                        >
                                    </div>
                                    <div></br></div>
                                    <div class="form-group">
                                        <button class="btn btn-warning">
                                            Ajouter
                                        </button>
                                    </div>
                                </form>
                                
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    




    

</x-app-layout>
