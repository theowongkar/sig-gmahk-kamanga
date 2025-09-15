<x-guest-layout>

    {{-- Judul Halaman --}}
    <x-slot name="title">Ibadah</x-slot>

    {{-- Bagian Ibadah --}}
    <section class="container min-h-screen flex items-center justify-center mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-6">
            {{-- Logo --}}
            <div class="flex justify-center mb-5">
                <img src="{{ asset('img/application-logo.svg') }}" alt="Logo" class="w-16 h-16">
            </div>

            {{-- Form --}}
            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                {{-- Email --}}
                <div>
                    <label for="email" class="block mb-1 text-sm font-medium text-gray-700">Email</label>
                    <div class="relative">
                        <input id="email" name="email" type="email" required autofocus
                            class="w-full pl-10 pr-4 py-2 text-sm bg-gray-100 border border-gray-300 rounded-md 
                                   focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">

                        {{-- Icon --}}
                        <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none text-gray-500">
                            <!-- SVG icon email -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-envelope-at-fill" viewBox="0 0 16 16">
                                <path
                                    d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2zm-2 9.8V4.698l5.803 3.546zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.5 4.5 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586zM16 9.671V4.697l-5.803 3.546.338.208A4.5 4.5 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671" />
                                <path
                                    d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791" />
                            </svg>
                        </div>
                    </div>
                    @error('email')
                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div x-data="{ show: false }">
                    <label for="password" class="block mb-1 text-sm font-medium text-gray-700">Password</label>
                    <div class="relative">
                        <input :type="show ? 'text' : 'password'" id="password" name="password" required
                            class="w-full pl-10 pr-4 py-2 text-sm bg-gray-100 border border-gray-300 rounded-md 
                                   focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">

                        {{-- Icon Kunci --}}
                        <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none text-gray-500">
                            <!-- SVG icon key -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-key-fill" viewBox="0 0 16 16">
                                <path
                                    d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2M2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                            </svg>
                        </div>

                        {{-- Icon Mata --}}
                        <div class="absolute inset-y-0 right-3 flex items-center cursor-pointer text-gray-600"
                            @click="show = !show">
                            <template x-if="!show">
                                <!-- Eye slash -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
                                    <path
                                        d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7 7 0 0 0-2.79.588l.77.771A6 6 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755q-.247.248-.517.486z" />
                                    <path
                                        d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829" />
                                    <path
                                        d="M3.35 5.47q-.27.24-.518.487A13 13 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7 7 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12z" />
                                </svg>
                            </template>
                            <template x-if="show">
                                <!-- Eye open -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                    <path
                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                </svg>
                            </template>
                        </div>
                    </div>
                </div>

                {{-- Remember --}}
                <div class="flex justify-between items-center text-sm text-gray-700">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="mr-1">
                        Ingat saya
                    </label>
                    <a href="#" class="text-blue-400 hover:underline">Lupa password?</a>
                </div>

                {{-- Submit --}}
                <button type="submit"
                    class="w-full py-2 bg-blue-600 text-white font-semibold rounded-lg shadow cursor-pointer
                           hover:bg-blue-700">
                    Masuk
                </button>
            </form>
        </div>
    </section>

</x-guest-layout>
