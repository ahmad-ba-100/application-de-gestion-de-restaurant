<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-warning" class="p-6 bg-white border-b border-gray-200">
                    Modification d'un paiement
                      
                </div>
            </div>
    </x-slot>
    <div class="container">
        <form id="add-sale" action="{{ route('sales.edit',$sale->id) }}" method="post">
            @csrf
            @method("PUT")
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <a href="/paiement" class="btn btn-outline-secondary">
                                    <i class="fa fa-chevron-left"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                @foreach ($tables as $table)
                                    <div class="col-md-3">
                                        <div class="card p-2 mb-2 d-flex
                                                    flex-column justify-content-center
                                                    align-items-center
                                                    list-group-item-action">
                                            <div class="align-self-end">
                                                <input type="checkbox" name="table_id[]"
                                                    id="table"
                                                    checked
                                                    value="{{ $table->id }}"
                                                >
                                            </div>
                                            <i class="fa fa-chair fa-5x"></i>
                                            <span class="mt-2 text-muted font-weight-bold">
                                                {{ $table->nom }}
                                            </span>
                                            <hr>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-2">
                <div class="col-md-12 card p-3">
                    <div class="row">
                        @foreach($menus as $menu)
                            <div class="col-md-4 mb-2">
                                <div class="card h-100">
                                    <div class="card-body d-flex
                                    flex-column justify-content-center
                                    align-items-center">
                                        <div class="align-self-end">
                                            <input type="checkbox" name="menu_id[]"
                                                id="menu_id"
                                                checked
                                                value="{{ $menu->id }}"
                                            >
                                        </div>
                                        <img
                                            src="{{ asset('images/menus/'. $menu->image) }}" alt="{{ $menu->titre}}"
                                            class="img-fluid rounded-circle"
                                            width="100"
                                            height="100"
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
                    </div>
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <div class="form-group">
                                <select name="servant_id" class="form-control">
                                    <option value="" selected disabled>
                                        Serveur
                                    </option>
                                    @foreach ($servants as $servant)
                                        <option
                                            {{ $servant->id === $sale->servant_id ? "selected" : "" }}
                                            value="{{ $servant->id }}">
                                            {{ $servant->nom }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div></br></div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        Qté
                                    </div>
                                </div>
                                <input type="number"
                                    name="quantite"
                                    class="form-control"
                                    placeholder="Qté"
                                    value="{{ $sale->quantite }}"
                                >
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        $
                                    </div>
                                </div>
                                <input type="number"
                                    name="prix_total"
                                    class="form-control"
                                    placeholder="Prix"
                                     value="{{ $sale->prix_total }}"
                                >
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        .00
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        $
                                    </div>
                                </div>
                                <input type="number"
                                    name="total_reçu"
                                    class="form-control"
                                    placeholder="Total"
                                     value="{{ $sale->total_reçu }}"
                                >
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        .00
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        $
                                    </div>
                                </div>
                                <input type="number"
                                    name="reste"
                                    class="form-control"
                                    placeholder="Reste"
                                     value="{{ $sale->reste }}"
                                >
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        .00
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <select name="type_paiement" class="form-control">
                                    <option value="" selected disabled>
                                        Type de paiement
                                    </option>
                                    <option value="cash"
                                        {{ $sale->type_paiement === "cash" ? "selected" : ""}}
                                        >
                                        Espéce
                                    </option>
                                    <option value="card"
                                    {{ $sale->payment_type === "card" ? "selected" : ""}}
                                    >
                                        Carte bancaire
                                    </option>
                                </select>
                            </div>
                            <div></br></div>
                            <div class="form-group">
                                <select name="status_payment" class="form-control">
                                    <option value="" selected disabled>
                                        Etat de paiement
                                    </option>
                                    <option value="paid" {{ $sale->payment_status === "paid" ? "selected" : ""}}>
                                        Payé
                                    </option>
                                    <option value="unpaid" {{ $sale->payment_status === "unpaid" ? "selected" : ""}}>
                                        Impayé
                                    </option>
                                </select>
                            </div>
                            <div class="espace"></br></div>
                            <div class="form-group">
                                <button
                                    onclick="event.preventDefault();
                                        document.getElementById('add-sale').submit();
                                    "
                                    class="btn btn-primary"
                                >
                                    Valider
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
