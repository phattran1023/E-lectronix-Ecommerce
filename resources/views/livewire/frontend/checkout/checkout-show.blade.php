<div>
    <div class="py-3 py-md-4 checkout">
        <div class="container">
            <h4>Checkout</h4>
            <hr>


            @if ($this->totalProductAmount != '0')
                {{-- Logic write in Livewire/Frontend/Checkout/checkout-show --}}
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="shadow bg-white p-3">
                            <h4 class="text-primary">
                                Item Total Amount :
                                <span class="float-end">{{ number_format($this->totalProductAmount) }}đ</span>
                            </h4>
                            <hr>
                            <small>* Items will be delivered in 3 - 5 days.</small>
                            <br />
                            <small>* Tax and other charges are included ?</small>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="shadow bg-white p-3">
                            <h4 class="text-primary">
                                Basic Information
                            </h4>
                            <hr>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Full Name</label>
                                    <input type="text" wire:model.defer="fullname" id="fullname"
                                        class="form-control" placeholder="Enter Full Name" />
                                    @error('fullname')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Phone Number</label>
                                    <input type="number" wire:model.defer="phone" id="phone" class="form-control"
                                        placeholder="Enter Phone Number" autofocus />
                                    @error('phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Email Address</label>
                                    <input type="email" wire:model.defer="email" id="email" class="form-control"
                                        placeholder="Enter Email Address" />
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Pin-code (Zip-code)</label>
                                    <input type="number" wire:model.defer="pincode" id="pincode" class="form-control"
                                        placeholder="Enter Pin-code" />
                                    @error('pincode')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Full Address</label>
                                    <textarea wire:model.defer="address" id="address" class="form-control" rows="2"></textarea>
                                    @error('address')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3" wire:ignore>
                                    <label>Select Payment Method: </label>
                                    <div class="d-md-flex align-items-start">
                                        <div class="nav col-md-3 flex-column nav-pills me-3" id="v-pills-tab"
                                            role="tablist" aria-orientation="vertical">
                                            <button wire:loading.attr="disabled" class="nav-link active fw-bold"
                                                id="cashOnDeliveryTab-tab" data-bs-toggle="pill"
                                                data-bs-target="#cashOnDeliveryTab" type="button" role="tab"
                                                aria-controls="cashOnDeliveryTab" aria-selected="true">Cash on
                                                Delivery</button>
                                            <button wire:loading.attr="disabled" class="nav-link fw-bold"
                                                id="onlinePayment-tab" data-bs-toggle="pill"
                                                data-bs-target="#onlinePayment" type="button" role="tab"
                                                aria-controls="onlinePayment" aria-selected="false">Online
                                                Payment</button>
                                        </div>
                                        <div class="tab-content col-md-9" id="v-pills-tabContent">
                                            <div class="tab-pane active show fade" id="cashOnDeliveryTab"
                                                role="tabpanel" aria-labelledby="cashOnDeliveryTab-tab" tabindex="0">
                                                <h6>Cash on Delivery Mode</h6>
                                                <hr />
                                                <button type="button" wire:loading.attr="disabled"
                                                    wire:click="codOrder" class="btn btn-primary">
                                                    <span wire:loading.remove wire:target="codOrder">
                                                        Place Order (Cash on Delivery)
                                                    </span>
                                                    <span wire:loading wire:target="codOrder">
                                                        Placing Order...
                                                    </span>
                                                </button>

                                            </div>
                                            <div class="tab-pane fade" id="onlinePayment" role="tabpanel"
                                                aria-labelledby="onlinePayment-tab" tabindex="0">
                                                <h6>Online Payment Mode</h6>
                                                <hr />
                                                {{-- <button wire:loading.attr="disabled" type="button"
                                                    class="btn btn-warning">Pay Now (Online
                                                    Payment)</button> --}}
                                                <div>
                                                    <div id="paypal-button-container"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>

                </div>
            @else
                <div class="card card-body shadow text-center p-md-5">
                    <h5>No item in Cart to checkout</h5>
                    <a href="{{ url('collections') }}" class="btn btn-warning">Back to Store</a>
                </div>
            @endif
        </div>
    </div>
</div>


@push('scripts')
    <!-- Replace "test" with your own sandbox Business account app client ID -->
    <script
        src="https://www.paypal.com/sdk/js?client-id=AYcQStguVLJexIkvzWz-d-q0Pm9UDIBYEdDQ46wbf-RMy8gXun4mjk9ayqI23Rb4lBeFDnHRMmBEupeF&currency=USD"
        onload="console.log('PayPal SDK loaded!')"></script>



    <script>
        paypal.Buttons({

            // onClick is called when the button is clicked
            onClick() {


                // Show a validation error if the checkbox is not checked
                if (!document.getElementById('fullname').value ||
                    !document.getElementById('phone').value ||
                    !document.getElementById('email').value ||
                    !document.getElementById('pincode').value ||
                    !document.getElementById('address').value
                ) {
                    Livewire.emit('validationForAll');
                    return false;
                } else {
                    @this.set('fullname', document.getElementById('fullname').value);
                    @this.set('phone', document.getElementById('phone').value);
                    @this.set('email', document.getElementById('email').value);
                    @this.set('pincode', document.getElementById('pincode').value);
                    @this.set('address', document.getElementById('address').value);
                }
            },
            createOrder: function(data, actions) {
                var exchangerate = 23688;
                var amountVND = "{{ $this->totalProductAmount }}";
                var amountUSD = amountVND / exchangerate;
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: amountUSD.toFixed(2), // Replace with the amount you want to charge{{ $this->totalProductAmount }}
                        }
                    }]
                });
            },

            //             createOrder: function(data, actions) {
            //     // Make an AJAX request to get the latest exchange rates
            //     return $.ajax({
            //         url: 'https://openexchangerates.org/api/latest.json?app_id=cf99efa81799440e86de645a51f19c7e',
            //         dataType: 'jsonp',
            //         success: function(json) {
            //             // Access the conversion rate for VND (Vietnamese Dong) from the response
            //             var vndRate = json.rates.VND;
            //             console.log(vndRate);
            //             // Calculate the amount to be charged in VND based on the desired amount in USD (0.01 in this case)
            //             var amountUSD = "{{ $this->totalProductAmount }}";
            //             var amountVND = amountUSD / vndRate;

            //             // Replace the hardcoded amount value with the calculated amount in VND
            //             return actions.order.create({
            //                 purchase_units: [{
            //                     amount: {
            //                         value: amountVND.toFixed(2) // Ensure to round to 2 decimal places
            //                     }
            //                 }]
            //             });
            //         }
            //     });
            // },

            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {
                    // This function will be executed after a successful transaction
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    const transaction = orderData.purchase_units[0].payments.captures[0];
                    if (transaction.status == "COMPLETED") {
                        Livewire.emit('transactionEmit', transaction.id);

                    }
                    //   alert('Transaction completed by ' + details.payer.name.given_name);
                    // Add any additional logic or redirect to a success page here
                });
            }
        }).render('#paypal-button-container');
    </script>
@endpush
