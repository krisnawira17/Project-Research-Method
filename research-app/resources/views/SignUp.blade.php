<x-master>
    <form class="py-[2vw] px-[5.6vw] justify-center max-w-lg mx-auto bg-formColor rounded-lg drop-shadow-md mt-[9vh] mb-[30vh]">
        <h2 class="font-bold  text-center pb-[2vh] text-[18px]">Sign Up</h2>
        
        <div class="flex flex-col gap-[1vh] ">
            <label for="name" class="font-medium text-[18px]">Name</label>
            <input type="text" id="name" class="border border-mainTextColor rounded-xl h-[2.5vh] p-1 ">

            <label for="email" class="font-medium text-[18px]">Email</label>
            <input type="email" id="email" class="border border-mainTextColor rounded-xl h-[2.5vh] p-1">

            <label for="password" class="font-medium text-[18px]">password</label>
            <input type="password" id="password" class="border border-mainTextColor rounded-xl h-[2.5vh] p-1">

            <label for="name" class="font-medium text-[18px]">Confirm Password</label>
            <input type="text" id="name" class="border border-mainTextColor rounded-xl h-[2.5vh] p-1">
        </div>

        <div class="text-center mt-[12vh]">
            <button class="btn boreder bg-buttonColor p-5 rounded-md">
                <img src="{{asset('images/Arrow.svg')}}">
            </button>

            <div class="flex flex-row text-center gap-1 mt-6">
                <p>Already have an account ? </p>
                <a class="text-buttonColor font-bold cursor-pointer" href="{{route('SignIn')}}">Sign in</a>
            </div>
        </div>
    </form>
</x-master>