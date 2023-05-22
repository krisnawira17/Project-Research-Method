<x-master>
    <div class="py-[2vw] px-[5.6vw] mx-auto">
        <div class="flex flex-row mx-auto bg-formColor max-w-[53vw] drop-shadow-md">
            <form class="flex flex-col p-8 justify-center">
                <h1 class="font-semibold text-[24px]">List your product</h1>
                <label>Product name</label>
                <input type="text" name="productName" class="border border-mainTextColor rounded-lg w-[751px] px-2">
    
                <label>Product material</label>
                <input type="text" name="productMaterial" class="border border-mainTextColor rounded-lg px-2">
                
                <label>Set quantity</label>
                <input type="number" name="setQuantity" class="border border-mainTextColor rounded-lg px-2">
    
                <label>Set price</label>
                <input type="number" name="setPrice" class="border border-mainTextColor rounded-lg px-2">
    
                <label>Description</label>
                <textarea class="rounded-sm border border-mainTextColor resize-none h-[30vh] px-2"></textarea>

                <button type="button" class="bg-buttonColor rounded-full mt-4 ml-auto">List your item</button>
            </form>
        </div> 
    </div>
       

</x-master>