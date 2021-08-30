<x-app-layout>
    <x-slot name="header">
        <h2>Page Titel</h2>
    </x-slot>
    <a href="{{ url('/fetch') }}" class="btn btn-xs btn-info pull-right">Fetch</a>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
    <table class="table  table-responsive  table-bordered ">
        <thead>
          <tr>

            <th scope="col">ID</th> 
            <th scope="col">Nom</th>
            <th scope="col">Prénom </th>
            <th scope="col">Prix total</th>
            <th scope="col">Methode de payement</th>
            <th scope="col">Numéro de telephone</th>
            <th scope="col">Wilaya</th>
            
          </tr>
        </thead>
        @foreach ($livraisons as $livraison)
        <tbody>
          <tr>
            
            <td>{{$order->tracking}}</td>
            <td>{{$order->order_id}}</td>
            <td>{{$order->first_name}}</td>
            <td>{{$order->family_name}}</td>
            <td>{{$order->contact_phone}}</td>
            <td>{{$order->adress}}</td>
            <td>{{$order->to_commune_name}}</td>
            <td>{{$order->product_list}}</td>
            <td>{{$order->price}}</td>
            <td>{{$order->delivery_fee}}</td>
            <td>{{$order->last_status}}</td>
           
          </tr>
        </tbody>
        @endforeach
    </table>
  </div>
</div>
</div>
</div>
</x-app-layout>
