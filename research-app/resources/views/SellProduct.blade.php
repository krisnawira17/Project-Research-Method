<x-master>
    <div class="py-[2vw] px-[5.6vw] mx-auto text-mainTextColor">
        <h1 class="justify-center text-center pb-16 font-bold text-[21px] text-mainTextColor">By listing your recycled artwork in the marketplace, you're giving it a chance to make a difference and inspire others to embrace sustainability.</h1>
        <div class="flex flex-row mx-auto bg-formColor max-w-[53vw] drop-shadow-md" >
            <form class="flex flex-col p-8 justify-center" action="{{ route('listProduct') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h1 class="font-semibold text-[24px]">List your product</h1>
                <label>Product name</label>
                <input type="text" name="productName" class="border border-mainTextColor rounded-lg w-[50vw] px-2" placeholder="Insert the name of your product">
    
                <label>Product material</label>
                <input type="text" name="productMaterial" class="border border-mainTextColor rounded-lg px-2" placeholder="Name one of the main material (ex:paper,plastic,rubber)">
                
                <label>Set quantity</label>
                <input id ="setQuantityInput" type="number" name="setQuantity" class="border border-mainTextColor rounded-lg px-2" placeholder="Insert the amount of the product you have">
    
                <label>Set price</label>
                <input id ="setPriceInput" type="number" name="setPrice" class="border border-mainTextColor rounded-lg px-2" inputmode="numeric" min="0" placeholder="Set your price (prices are in IDR)">
    
                <label>Description</label>
                <textarea name= "productDescription" class="rounded-sm border border-mainTextColor resize-none h-[30vh] px-2"></textarea>

                <label for="ProfilePicture" class="font-medium text-[18px]">Product picture</label>
                <input type="file" id="productPicture" name="productPicture">

                <button type="submit" class="bg-buttonColor rounded-lg mt-4 ml-auto font-bold p-2  text-center text-[18px drop-shadow-md hover:drop-shadow-none">List your item</button>
            </form>
        </div> 
    </div>
</x-master>

<script>
    const setPriceInput = document.getElementById('setPriceInput');
    const setQuantityInput = document.getElementById('setQuantityInput');

    setPriceInput.addEventListener('input',function(){
        if(this.value < 0){
            this.value = 0;
        }
    })

    setQuantityInput.addEventListener('input',function(){
        if(this.value < 0){
            this.value = 0;
        }
    })


    
</script>