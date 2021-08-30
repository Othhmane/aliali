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
            <th scope="col">Wilaya</th>
            <th scope="col">Wilaya</th>
            
          </tr>
        </thead>
        @foreach ($orders as $order)
        <tbody>
          <tr>
            
            <td>{{$order->number}}</td>
            <td>{{$order->first_name}}</td>
            <td>{{$order->last_name}}</td>
            <td>{{$order->total_formatted}}</td>
            <td>{{$order->payment_method_title}}</td>
            <td>{{$order->phone}}</td>
            <td>{{$order->city}}</td>
            <td><a href="{{ route('pdfTest', $order->id) }}" class="btn btn-xs btn-info pull-right">Imprimer</a></td>

            <td><a data-toggle="modal" id="smallButton" data-target="#smallModal"
            data-attr="{{ route('show', $order->id) }}" title="show">
             <i class="fas fa-eye text-success  fa-lg"></i>
             </a></td>
          </tr>
        </tbody>
        @endforeach
    </table>
  </div>
</div>
</div>
</div>
    <!-- small modal -->
    <div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="smallBody">
                    <div>
                        <!-- the result to be displayed apply here -->
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        // display a modal (small modal)
        $(document).on('click', '#smallButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#smallModal').modal("show");
                    $('#smallBody').html(result).show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });

        // display a modal (medium modal)
        $(document).on('click', '#mediumButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#mediumModal').modal("show");
                    $('#mediumBody').html(result).show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });

    </script>

</x-app-layout>
