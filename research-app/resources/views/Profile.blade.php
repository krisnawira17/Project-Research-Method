<x-master>
    @php
        $extension = pathinfo($user->profile_picture_path, PATHINFO_EXTENSION);
        $mimeType = 'image/' . $extension;
    @endphp
    <div class="py-[2vw] px-[5.6vw] mx-auto flex flex-col text-mainTextColor">
        <div class="border bg-white rounded-lg drop-shadow-md p-16 w-[50vw] mx-auto"> 
            <div class="mt-[24px] flex flex-col max-w-3xl mx-auto">
                <h1 class="font-semibold text-[24px]">Profile</h1>
                <form action="{{ route('profile.update') }}" method="POST" class="flex flex-col" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-row justify-between">
                        <img src="{{ asset('storage/'.$user->profile_picture) }}" class="w-64 h-64 object-fill">
                        <div id="buttonContainer">
                            <button id="editProfileButton" class="border border-buttonColor bg-buttonColor max-h-[4vh] p-2 rounded-md font-medium text-[18px]" type="button">Edit Profile</button>
                            <button id="saveProfileButton" class="hidden border border-buttonColor bg-buttonColor max-h-[4vh] p-2 rounded-md font-medium text-[18px]" type="submit">Save</button>
                            <button id="cancelButton" class="hidden text-subTextColor max-h-[4vh] p-2 rounded-md font-medium text-[18px]" type="button">Cancel</button>
                        </div>
                    </div>

                    <label for="Name" class="font-medium text-[18px]">Name</label>
                    <input type="text" id="name" for="name" class="border border-mainTextColor rounded-md p-1" value="{{old('name') ?? $user->name}}" disabled>

                    <label for="Email" class="font-medium text-[18px]">Email</label>
                    <input type="text" id="email" for="email" class="border border-mainTextColor rounded-md p-1" value="{{old('email') ?? $user->email}}" disabled>

                    <label for="ProfilePicture" class="font-medium text-[18px]">Profile Picture</label>
                    <input type="file" id="profilePicture" name="profilePicture" disabled>

                    <label for="Address1" class="font-medium text-[18px]">Address line 1</label>
                    <input type="text" id="address1" for="address1" class="border border-mainTextColor rounded-md p-1" name="address1" value="{{ $user->address->address_line_1 ?? '' }}" disabled>

                    <label for="Address2" class="font-medium text-[18px]">Address line 2</label>
                    <input type="text" id="address2" for="address2" class="border border-mainTextColor rounded-md p-1" name="address2" value="{{ $user->address->address_line_2 ?? '' }}" disabled>

                    <label for="City" class="font-medium text-[18px]">City</label>
                    <input type="text" id="city" for="city" class="border border-mainTextColor rounded-md p-1" name="city" value="{{ $user->address->city ?? '' }}" disabled>

                    <label for="Province" class="font-medium text-[18px]">Province</label>
                    <input type="text" id="province" for="province" class="border border-mainTextColor rounded-md p-1" name="province" value="{{ $user->address->province ?? '' }}" disabled>
                </form>
                
                <form id="logout-form" action="{{ route('profile.signout') }}" method="POST" class="ml-auto mt-16">
                    @csrf
                    <button type="submit" class="font-semibold text-mainTextColor hover:text-gray-600 text-[18px]">
                        Sign Out
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        const editProfileButton = document.getElementById('editProfileButton');
        const saveProfileButton = document.getElementById('saveProfileButton');
        const cancelButton = document.getElementById('cancelButton');
        const form = document.querySelector('form');

        editProfileButton.addEventListener('click', () => {
            editProfile();
        });

        saveProfileButton.addEventListener('click', () => {
            saveProfile();
        });

        cancelButton.addEventListener('click', () => {
            cancelEdit();
        });

        function editProfile() {
            const inputs = form.getElementsByTagName('input');
            for (let i = 0; i < inputs.length; i++) {
                inputs[i].removeAttribute('disabled');
            }

            saveProfileButton.classList.remove('hidden');
            cancelButton.classList.remove('hidden');
            editProfileButton.classList.add('hidden');
        }

        function saveProfile() {
            form.submit();
        }

        function cancelEdit() {
            const inputs = form.getElementsByTagName('input');
            for (let i = 0; i < inputs.length; i++) {
                inputs[i].setAttribute('disabled', 'disabled');
            }

            saveProfileButton.classList.add('hidden');
            cancelButton.classList.add('hidden');
            editProfileButton.classList.remove('hidden');
        }
    </script>
</x-master>
