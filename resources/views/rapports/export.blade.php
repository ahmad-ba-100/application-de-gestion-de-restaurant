



<table>
<div class="conrainer">
<div class="row">
<div class="card">
                                    <thead>
                                  <tr>
                                      
                                  <th>Id</th>
                                            <th>Menus</th>
                                            <th>Tables</th>
                                          <th>serveurs</th>
                                            <th>Quantité</th>
                                            <th>Total</th>
                                            <th>Type de paiement</th>
                                            <th>Etat de paiement</th>
                                           
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($sales as $sale)
                                                <tr>
                                                    <td>
                                                        {{ $sale->id }}
                                                    </td>
                                                    <td>
                                                        @foreach($sale->menus()->where("sales_id",$sale->id)->get() as $menu)
                                                            
                                                                        <h5 >
                                                                            {{ $menu->titre }}
                                                                        </h5>
                                                                        <h5 class="text-muted">
                                                                            {{ $menu->prix }} DH
                                                                        </h5>
                                                                   
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach($sale->tables()->where("sales_id",$sale->id)->get() as $table)
                                                            
                                                        
                                                                        <h5 >
                                                                            {{ $table->nom}}
                                                                        </h5>
                                                                   
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        {{ $sale->nom}}
                                                    </td>
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
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="5">
                                                    Rapport de {{$from}} à {{$to}}

                                                </td>
                                                <td>
                                                    {{$total}} dh
                                                </td>
                                            </tr>

                                  </tbody>
</div>
</div>
</div>
                                </table>