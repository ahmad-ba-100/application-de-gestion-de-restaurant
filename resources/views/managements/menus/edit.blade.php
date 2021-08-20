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
                    Vous  êtes dans les catégories
                    
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
                                        <i class="fas fa-plus"></i> Modifier le  un Menu {{ $menu->titre }}
                                    </h3>
                                
                                    <form action="{{route('menus.update',$menu->id)}}" method="post"  enctype="multipart/form-data">
                                    @csrf
                                    @method("PUT")
                                    <div class="form-group">
                                        <input
                                            type="text" name="titre" id="titre"
                                            class="form-control"
                                            placeholder="Titre"
                                        >
                                    </div>
                                    <div></br></div>
                                    <div class="form-group">
                                        <textarea
                                            name="description" id="description"
                                            rows="5"
                                            cols="30"
                                            class="form-control"
                                            placeholder="Description"
                                        >{{ $menu->description }}</textarea>
                                    </div>
                                    <div></br></div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                $
                                            </div>
                                        </div>
                                        <input type="number"
                                            name="prix"
                                            class="form-control"
                                            placeholder="Prix"
                                        >
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                .00
                                            </div>
                                        </div>
                                    </div>
                                    <div></br></div>
                                    <img src="{{ asset('images/menus/'.$menu->image) }}"
                                            width="200"
                                            height="200"
                                            class="img-fluid"
                                            alt="{{ $menu->titre }}">
                                    </div>
                                    <div></br></div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Image
                                            </span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file"
                                                name="image"
                                                class="custom-file-input"
                                            >
                                            <label class="custom-file-label">
                                                2mg max
                                            </label>
                                        </div>
                                    </div>
                                  
                                    <div></br></div>
                                    <div class="form-group">
                                        <select name="category_id" id="category_id" class="form-control">
                                            <option value="" selected disabled>Choisir une catégorie</option>
                                            @foreach ($categories as $category)
                                                <option {{ $category['id'] === $menu->category['id'] ? "selected" : ""}} value="{{ $category['id'] }}">
                                                    {{ $category['titre'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div></br></div>
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
