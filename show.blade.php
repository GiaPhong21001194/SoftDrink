{{-- @extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')


    <p class="card-text">
        <form action="{{ route('cart.add', ['id' => $viewData['product']->getId()]) }}" method="post">
            <div class="row">
                @csrf
                <div class="col-auto">
                    <div class="input-group col-auto">
                        <div class="input-group-text">Quantity</div>
                        <input type="number" min="1" max="10" class="form-control quality-input" name="quantity" value="1" id="quantity">
                    </div>
                </div>
                
                <div class="col-auto">
                    <button class="btn btn-primary text-white" type="submit">Add to cart</button>
                </div>
            </div>
        </form>
    </p>
@endsection

@section('scripts')
    <script>
        function incrementQuantity() {
            var quantityInput = document.getElementById('quantity');
            if (quantityInput.value < 10) {
                quantityInput.value++;
            }
        }

        function decrementQuantity() {
            var quantityInput = document.getElementById('quantity');
            if (quantityInput.value > 1) {
                quantityInput.value--;
            }
        }
    </script>
@endsection

                

         --}}
         @extends('layouts.app')
         @section('title', $viewData['title'])
         @section('subtitle', $viewData['subtitle'])
         @section('content')
         
             <section class="d-flex justify-content-center align-items-center shadow">
                 <div class="col-md-4">
                     <img src="{{ asset('/storage/img/' . $viewData['product']->getImage()) }}" class="img-fluid rounded-start">
                 </div>
                 <div class="col-md-8">
                     <div class="card-body">
                         <h5 class="card-title">
                             {{ $viewData['product']->getName() }}
                             (${{ $viewData['product']->getPrice() }})
                             <p class="card-text">{{ $viewData['product']->getDescription() }}</p>
                             <p class="card-text"><small class="text-muted">Add to Cart</small></p>
                             <p class="card-text">
         
                             <form action="{{ route('cart.add', ['id' => $viewData['product']->getId()]) }}" method="post">
                                 <div class="row">
                                     @csrf
                                     
                            
                                     <div class="col-auto">
                                         <div class="input-group col-auto">
                                             <div class="input-group-text">Quantity
                                             </div>
                                             <input type="number" min="1" max="100" class="form-control quality-input" name="quantity" value="1" id="quantity">
                                         </div>
                                     </div>
                                     <div class="col-auto">
                                         <button class="btn btn-primary text-white" type="submit">Add to cart</button>
                                     </div>
                                 </div>
                             </form>
                             </p>
                     </div>
                 </div>
             </section>
         
         
         @endsection
         @section('scripts')
    <script>
        function incrementQuantity() {
            var quantityInput = document.getElementById('quantity');
            if (quantityInput.value < 100) {
                quantityInput.value++;
            }
        }

        function decrementQuantity() {
            var quantityInput = document.getElementById('quantity');
            if (quantityInput.value > 1) {
                quantityInput.value--;
            }
        }
    </script>
@endsection