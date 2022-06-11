<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mt-10 mx-auto bg-gray-100 p-6 rounded-xl border border-gray-200">
            <h1 class="text-center fold-bold text-xl">Log In</h1>
            <form method="post" class="mt-10" action="/login">
                @csrf
                <div class="mb-6">
                    <label class="block mb-2 font-bold text-xs text-gray-700"
                           for="email"
                    >Email</label>
                    <input type="email"
                           class="border border-gray-400 rounded p-2 w-full"
                           name="email"
                           id="email"
                           value="{{ old('email')  }}"
                           required
                    >
                    @error('email')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block mb-2 font-bold text-xs text-gray-700"
                           for="password"
                    >Password</label>
                    <input type="password"
                           class="border border-gray-400 rounded p-2 w-full"
                           name="password"
                           id="password"
                           required
                    >
                    @error('password')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="mb-6">
                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Log In
                    </button>
                </div>
            </form>
        </main>
    </section>
</x-layout>
