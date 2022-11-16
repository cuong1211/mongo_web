@extends('layout.frontend.index')
@section('content')
    <div class="checkout-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-accordion-wrap">
                        <div class="accordion" id="accordionExample">
                            <div class="card single-accordion">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Billing Address
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="billing-address-form">
                                            <form action="{{ route('order.store') }}" method="POST" id="form_add_order">
                                                @csrf
                                                <p><input type="text" placeholder="Name" name="name"></p>
                                                <p><input type="email" placeholder="Email"name="email"></p>
                                                <p><input type="text" placeholder="Address"name="address"></p>
                                                <p><input type="number" placeholder="Phone"name="phone"></p>
                                                <p><input type="date" placeholder="dd-mm-yyyy" name="date"></p>
                                                <p>
                                                    <textarea id="bill" cols="30" rows="10" placeholder="Note"name="note"></textarea>
                                                </p>
                                                <input type="text" placeholder="product" name="product_id"
                                                    value="{{ $product->id }}" hidden>
                                                <input type="text" placeholder="quantity" name="quantity" value="1"
                                                    hidden>
                                                <input type="text" placeholder="total" name="total"
                                                    value="{{ $product->price }}" hidden>
                                                <input type="text" placeholder="product" name="status"
                                                    value="{{App\Enums\StatusType::Pending}}" hidden>
                                                <button type="submit">
                                                    <span class="boxed-btn">Place Order
                                                    </span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="card single-accordion">
                        <div class="card-header" id="headingTwo">
                          <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              Shipping Address
                            </button>
                          </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                          <div class="card-body">
                            <div class="shipping-address-form">
                                <p>Your shipping address form is here.</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card single-accordion">
                        <div class="card-header" id="headingThree">
                          <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                              Card Details
                            </button>
                          </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                          <div class="card-body">
                            <div class="card-details">
                                <p>Your card details goes here.</p>
                            </div>
                          </div>
                        </div>
                      </div> --}}
                        </div>

                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="order-details-wrap">
                        <table class="order-details">
                            <thead>
                                <tr>
                                    <th>Your order Details</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody class="order-details-body">
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }} VNĐ</td>
                                </tr>
                            </tbody>
                            <tbody class="checkout-details">
                                <tr>
                                    <td>Shipping</td>
                                    <td>15.000 VNĐ</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td>{{ $product->price + 15000 }} VNĐ</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('jsfrontend')
    <script>
        $('#form_add_order').on('submit', function(e) {
            e.preventDefault();
            let data = $(this).serialize(),
                type = 'POST',
                url = "{{ route('order.store') }}"
            $.ajax({
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: type,
                data: data,
                success: function(data) {
                    if (data.type == 'success') {
                        alert(data.title);
                    }
                },
                error: function(data) {
                    console.log('error');
                }
            });
        });
    </script>
@endpush
