<x-app-layout>
    <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <i class=" text-warning fas fa-hamburger"></i> {{ __('Restaurant') }}
        </h2>
        <div   class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div   class="bg-warning" class="bg-warning" class="p-6 bg-white border-b border-gray-200">
                    Choisir un Département
                    
                </div>
            </div>
    </x-slot>

    <div class="container">
        
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4 d-flex flex-column align-items-center justify-content-center">
                            <i class="fa fa-cog fa-5x text-danger"></i>
                            <a href="/categories" class="font-weight-bold btn btn-link">
                                Gestion
                            </a>
                        </div>
                        <div class="col-sm-4 d-flex flex-column align-items-center justify-content-center">
                            <i class="fa fa-shopping-bag fa-5x text-primary"></i>
                            <a href="/paiement" class="font-weight-bold btn btn-link">
                                Finance
                            </a>
                        </div>
                        <div class="col-sm-4 d-flex flex-column align-items-center justify-content-center">
                            <i class="fa fa-clipboard-list fa-5x text-success"></i>
                            <a href="/rapports" class="font-weight-bold btn btn-link">
                                Arhives&Rapport
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
