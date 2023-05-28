<x-master>
    <div class="py-[2vw] px-[5.6vw] text-mainTextColor flex flex-row gap-8">
        <div class="bg-formColor flex flex-col p-12 rounded-lg shadow-md w-[60vw]">
             <h1 class="text-[24px] font-bold mb-6">Cart</h1>
             <div>
                @foreach ($cartItems as $cartItem)
                    <div class="flex flex-row mb-6">
                        <img src="{{Storage::url($cartItem->product->product_picture)}}" class="w-[12vw] rounded-md">
                        <div class="ml-4 flex flex-col">
                            <h1 class=" text-[24px] font-semibold">{{$cartItem->product->name}}</h1>
                            <div>
                                <p class="text-subTextColor font-medium">By {{$cartItem->product->user->name}}</p>
                            </div> 
                        </div>
                        <div class="ml-auto flex flex-col">
                            <p class="font-semibold text-[24px]">Rp{{ number_format($cartItem->product->price * $cartItem->quantity, 0, ',', '.') }}</p>
                            <div class="flex flex-row justify-center text-[21px] font-medium gap-4 ml-auto">
                                <button class="quantity-button" data-action="decrease" data-cart-id="{{ $cartItem->id }}">-</button>
                                <p>{{ $cartItem->quantity }}</p>
                                <button class="quantity-button" data-action="increase" data-cart-id="{{ $cartItem->id }}">+</button>
                            </div>
                        </div>
                    </div>
                @endforeach
             </div>
        </div>

        <div class="bg-formColor shadow-md w-[25vw] p-12">
            <h1 class="font-bold text-[24px]">Checkout</h1>
            <div class="flex flex-col mt-4">
                <p class="font-semibold text-[18px] text-mainTextColor">Address</p>
                <p>{{auth()->user()->address->address_line_1}}, {{auth()->user()->address->address_line_2}}, {{auth()->user()->address->city}}, {{auth()->user()->address->province}}</p>

                <div class="mt-4 flex flex-col">
                    <div class="flex flex-col mb-8">
                        <p class="font-semibold">Payment Method</p>
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio text-primaryColor h-4 w-4" name="paymentMethod" value="card">
                            <span class="ml-2 text-mainTextColor">Debit / Credit card</span>
                          </label>
                          <label class="inline-flex items-center">
                            <input type="radio" class="form-radio text-primaryColor h-4 w-4" name="paymentMethod" value="qris">
                            <span class="ml-2 text-mainTextColor">QRIS</span>
                          </label>
                          <label class="inline-flex items-center">
                            <input type="radio" class="form-radio text-primaryColor h-4 w-4" name="paymentMethod" value="payPal">
                            <span class="ml-2 text-mainTextColor">Paypal</span>
                          </label>
                    </div>
                    
                    <div class="flex flex-col mb-8">
                        <p class="font-semibold">Courier</p>
                        <label class="inline-flex items-center">
                          <input type="radio" class="form-radio text-primaryColor h-4 w-4" name="courierOption" value="jne">
                          <span class="ml-2 text-mainTextColor">JNE</span>
                        </label>
                        <label class="inline-flex items-center">
                          <input type="radio" class="form-radio text-primaryColor h-4 w-4" name="courierOption" value="FedEx">
                          <span class="ml-2 text-mainTextColor">FedEx</span>
                        </label>
                    </div>
                    @php
                    $totalPrice = 0;
                    @endphp
                    
                    @foreach ($cartItems as $cartItem)
                        @php
                        $totalPrice += $cartItem->product->price * $cartItem->quantity;
                        @endphp
                    @endforeach

                      <p class="font-semibold">Total Price</p>
                      <p id="total-price">Rp{{ number_format($totalPrice, 0, ',', '.') }}</p>
                      <button class="bg-buttonColor rounded-lg font-bold p-1">Check Out</button>
                </div>
            </div>
        </div>
    </div>
</x-master>

<script>
    const quantityButtons = document.querySelectorAll('.quantity-button');

    quantityButtons.forEach(button => {
        button.addEventListener('click', () => {
            const action = button.getAttribute('data-action');
            const cartId = button.getAttribute('data-cart-id');
            
            fetch(`/cart/update-quantity/${cartId}/${action}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const quantityElement = button.parentNode.querySelector('p');
                        quantityElement.textContent = data.quantity;
                        
                        const priceElement = button.parentNode.parentNode.querySelector('p.font-semibold');
                        priceElement.textContent = `Rp${data.totalPriceFormatted}`;
                    } else {
                        console.error('Error:', data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    });

    


</script>