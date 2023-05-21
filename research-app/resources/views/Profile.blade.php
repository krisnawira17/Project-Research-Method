<x-master>
    <div class="py-[2vw] px-[5.6vw] mx-auto flex flex-col">
        <div class="border bg-white rounded-lg drop-shadow-md p-16">
            <h1 class="font-semibold text-[24px]">Profile</h1>
            <img src="{{$user->profile_picture ? $user->profile_picture : asset('images/placeholder.png')}}" class="w-[25vh] object-fit">
            <div class="mt-[24px]">
                <label for="Name" class="font-medium text-[18px]">Name</label>
                
                
            </div>
        </div>
    </div>
</x-master>