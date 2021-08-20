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
                            <a href="{{route('paiement.index')}}"class="btn btn-warning" class="btn btn-outline-secondary">
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

                            <div class="col-md-8">
                                <div class="d-flex flex-row justify-content-between align-items-center border-bottom pb-1">
                                    <h3 class="text-secondary">
                                        <i class="fas fa-credit-card"></i> Ventes
                                    </h3>
                               <a   href="{{route('paiement.index')}}" class="btn btn-warning">
                                        <i class="fas fa-plus fa-x2"></i>
                                        
                                    </a>
                                </div>
                                <table class=" table table-hoble table-respossive-sm">
                                    <thead>
                                        <tr>
                                        <th>Id</th>
                                            <th>Menus</th>
                                            <th>Tables</th>
                                          <!--  <th>serveurs</th>-->
                                            <th>Quantité</th>
                                            <th>Total</th>
                                            <th>Type de paiement</th>
                                            <th>Etat de paiement</th>
                                            <th>Action</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($sales as $sale)
                                        <tr>
                                        <td>
                                                    {{ $sale->id }}
                                         </td>
                                        <td>
                                                @foreach($sale->menus()->where("sales_id",$sale->id)->get() as $menu)
                                        <div class="col-md-4 mb-2">
                                            <div class="h-100">
                                                <div class=" d-flex
                                                flex-column justify-content-center
                                                align-items-center">
                                                   
                                                    <img
                                                        src="{{ asset('images/menus/'. $menu->image) }}" 
                                                        class="img-fluid rounded-circle"
                                                        width="50"
                                                        height="50"
                                                    >
                                                    <h5 class="font-weight-bold mt-2">
                                                        {{ $menu->titre }}
                                                    </h5>
                                                    <h5 class="text-muted">
                                                        {{ $menu->prix }} DH
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                                </td>
                                                <td>
                                                @foreach($sale->tables()->where("sales_id",$sale->id)->get() as $table)
                                        <div class="col-md-4 mb-2">
                                            <div class=" h-100">
                                                <div class="d-flex
                                                flex-column justify-content-center
                                                align-items-center">
                                                <i class="fa fa-chair fa-3x"></i>
                                               
                                                    <h5 class="text-muted mt-2">
                                                        {{ $table->nom }} 
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                                </td>
                                                <!--   <td>    
                                                    $sale->servant->nom
                                                </td> -->
                                                <td>
                                                    {{ $sale->quantite}}
                                                </td>
                                                <td>
                                                    {{ $sale->total_reçu}}
                                                </td>
                                                <td>
                                                    {{ $sale->type_paiement === "cash" ? "Espéce" : "Carte bancaire"}}
                                                </td>
                                                <td>
                                                    {{ $sale->status_payment === "paid" ? "Payé" : "Impayé"}}
                                                </td>
                                            
                                               
                                               
                                        <td class="d-flex flex-row justify-content-center align-items-center">
                                        <a href="{{ route('menus.edit',$menu->id) }}" class="btn btn-warning mr-1 ">
                                        <i class="fas fa-edit"></i>
                                        </a>
                                        <form id="{{ $sale->id }}" action="{{ route('sales.destroy',$sale->id) }}" method="post">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button
                                                            onclick="
                                                                event.preventDefault();
                                                                if(confirm('Voulez vous supprimer la vente{{ $sale->id }} ?'))
                                                                document.getElementById('{{$sale->id}}').submit()" class="btn btn-danger">
                                                                
                                                            
                                                            
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>

                                        
                                        </td>
                                        </tr>

                                        @endforeach
                                    </tbody>

                                </table>
                                <div class="my-3 d-flex justify-content-center align-items-center">
                                    {{ $sales->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    

</x-app-layout>
