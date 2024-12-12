@extends('layouts.app')

@section('content')
    @include("components.snd-header")
    <div class="py-12">
        <div class="flex w-[70%] mx-auto gap-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg flex">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg flex">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg flex">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
@endsection
