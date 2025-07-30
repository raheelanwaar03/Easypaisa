<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #4CAF50;
            /* Green background */
            color: #fff;
            /* White text */
        }

        .profile-container {
            background-color: #fff;
            /* White background for the profile container */
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
        }

        .password-change-container {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 profile-container">
                <h1>User Profile</h1>
                <img src="{{ asset('admin/images/avatar/1.png') }}" alt="User Avatar"
                    class="img-fluid mb-3 rounded-circle">
                <h2 style="color: black">{{ auth()->user()->name }}</h2>
                <p style="color: black">Email: {{ auth()->user()->email }}</p>
                <p style="color: black">Balance: {{ auth()->user()->balance }}</p>
                <p style="color: black">About Me: You have been referred by {{ auth()->user()->referral }} at
                    {{ auth()->user()->created_at }}.</p>
            </div>
            <div class="col-md-6 password-change-container">
                <h2>Change Password</h2>
                <form action="{{ route('password.update') }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="currentPassword">Current Password</label>
                        <input type="password" name="current_password" class="form-control" id="currentPassword"
                            placeholder="Enter current password">
                        <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                    </div>
                    <div class="form-group">
                        <label for="newPassword">New Password</label>
                        <input type="password" name="password" class="form-control" id="newPassword"
                            placeholder="Enter new password">
                        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Confirm New Password</label>
                        <input type="password" name="password_confirmation" class="form-control" id="confirmPassword"
                            placeholder="Confirm new password">
                        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                    </div>
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>


{{-- <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
    @csrf
    @method('put')

    <div>
        <x-input-label for="current_password" :value="__('Current Password')" />
        <x-text-input id="current_password" name="current_password" type="password"
            class="mt-1 block w-full" autocomplete="current-password" />
        <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="password" :value="__('New Password')" />
        <x-text-input id="password" name="password" type="password" class="mt-1 block w-full"
            autocomplete="new-password" />
        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
        <x-text-input id="password_confirmation" name="password_confirmation" type="password"
            class="mt-1 block w-full" autocomplete="new-password" />
        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>{{ __('Save') }}</x-primary-button>

        @if (session('status') === 'password-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600">{{ __('Saved.') }}</p>
        @endif
    </div>
</form> --}}

{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
