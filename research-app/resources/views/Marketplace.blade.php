<x-master>
    <div class="flex flex-col py-[2vw] px-[5.6vw]">
        <div class="relative mx-auto">
            <img src="{{ asset('images/MarketPic.png')}}" alt="marketPic" class="mx-auto w-[90vw]">
            <p class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center font-bold text-[32px] text-formColor">Discover the beauty<br>in sustainability</p>
        </div>
        <div class="flex flex-wrap text-mainTextColor">
            @foreach ($products as $product)
                <a class="w-1/5 p-4 bg-formColor mt-4 rounded-lg mr-4 flex flex-col shadow-md transform transition-transform duration-300 hover:translate-y-[-5px] hover:shadow-lg cursor-pointer" href="{{ route('productDetail', ['id' => $product->id]) }}">
                    <img src="{{ Storage::url($product->product_picture)}}" class="w-[14vw] h-[14vw] object-contain mx-auto">
                    <div class="flex flex-row gap-12 mt-4 mb-4 justify-between items-center">
                        <h2 class=" font-semibold text-[18px] truncate">{{$product->name}}</h2>
                        <p class="font-semibold text-[18px]">Rp{{number_format($product->price,0,',','.')}}</p>
                    </div>
                    <div class="flex justify-between mt-auto">
                        <p class="text-subTextColor">{{$product->user->name}}</p>
                        <p class="text-subTextColor">{{$product->material}}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
   
</x-master>