@extends('admin._layouts.master')


@section('body')
<div class="rounded-tl-3xl p-2  shadow text-xl text-textcolor w-full">Change Password</div>

    <div class="container mt-5">
        @include ('admin.message.index')

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <form action="
                    {{ route('admin.updatepassword') }}"
                        method="POST" class="mx-10 flex flex-col w-[40%] border p-5">
                        @csrf
                        {{-- <div class="card-header font-semibold text-lg pb-5">{{ __('Change Password') }}</div> --}}
                        <div class="card-body">
                            {{-- @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif --}}

                            <div class="mb-3 flex flex-col">
                                <label for="oldPasswordInput" class="form-label pb-2">Old Password</label>
                                <input name="old_password" type="password"
                                    class="border px-2 py-2 text-sm @error('old_password') is-invalid @enderror"
                                    id="oldPasswordInput" placeholder="Old Password">
                                @error('old_password')
                                    <div class="invalid-feedback text-red-400 text-sm" style="display: block;">
                                        * {{ $message }}

                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 flex flex-col">
                                <label for="newPasswordInput" class="form-label  pb-2">New Password</label>
                                <input name="new_password" type="password"
                                    class="border px-2 py-2 text-sm @error('new_password') is-invalid @enderror"
                                    id="newPasswordInput" placeholder="New Password">
                                @error('new_password')
                                    <div class="invalid-feedback text-red-400 text-sm" style="display: block;">
                                        * {{ $message }}

                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 flex flex-col">
                                <label for="confirmNewPasswordInput" class="form-label pb-2">Confirm New Password</label>
                                <input name="new_password_confirmation" type="password" class="border px-2 py-2 text-sm"
                                    id="confirmNewPasswordInput" placeholder="Confirm New Password">
                            </div>

                        </div>

                        <div>
                            <button
                                class="border-[#7065d4] bg-[#7065d4] hover:bg-none rounded-md text-white px-4 py-2">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
