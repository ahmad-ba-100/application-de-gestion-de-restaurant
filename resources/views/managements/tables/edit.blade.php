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
                    Vous  êtes dans les tables
                    
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
                                        <i class="fas fa-plus"></i> Modifier la tables {{$table->titre}}
                                    </h3>
                                
                                    <form action="{{route('tables.update',$table->id)}}" method="post">
                                    @csrf
                                      <!--  @method("PUT")-->
                                      <input type="hidden" name="_method" value="PUT">
                                     
                                    
                                    <div class="form-group">
                                        <input
                                            type="text" name="nom" id="nom"
                                            class="form-control"
                                            placeholder="Titre" value="{{$table->nom}}"
                                        >
                                    </div>
                                    <div></br></div>
                                    <div class="form-group">
                                        <select name="status" class="form-control">
                                            <option value="" disabled>
                                                Disponible
                                            </option>
                                            <option {{ $table->status === 1 ? "selected" : "" }} value="1">Oui</option>
                                            <option {{ $table->status === 0 ? "selected" : "" }} value="0">Non</option>
                                        </select>
                                        <div></br></div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <button class="btn btn-warning">
                                            Modifier
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
