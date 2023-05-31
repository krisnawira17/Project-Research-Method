<x-master>
    <div class="py-[2vw] px-[5.6vw]">
        <div class="flex flex-row w-[50vw]  mx-auto bg-formColor p-4 rounded-lg drop-shadow-md">
            <img src="{{ Storage::url($product->product_picture)}}" alt="{{ $product->name}}" class="w-[20vw] h-[20vw] mr-3 object-contain">
            <div class="flex flex-col gap-3 w-[100%]">
                <p class="font-bold text-[16px] text-buttonColor">{{$product->material}}</p>
                <h1 class="font-bold text-[32px]">{{$product->name}}</h1>
                <h2 class="font-semibold text-[24px]">Rp{{number_format($product->price,0,',','.')}}</h2>

                <div class="flex flex-row">
                    <img src="{{$product->user->profile_picture ? Storage::url($product->user->profile_picture) : asset('images/placeholder.png') }}" class="w-[2vw] h-[2vw] rounded-full">
                    <p>{{$product->user->name}}</p>
                </div>
                <p>{{$product->description}}</p>
                <p>Stock: {{$product->quantity}}</p>
                <div class="mt-auto flex flex-row  ml-auto">
                    <form action="{{route('cart.add')}}" METHOD="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button class="border border-mainTextColor p-2 rounded-md hover:bg-buttonColor hover:border-buttonColor transform transition-colors duration-250 w-[10vw] font-semibold text-[16px] text-mainTextColor">Add to cart</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-master>