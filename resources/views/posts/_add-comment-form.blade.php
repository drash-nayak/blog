@auth
    <form method="post" action="/posts/{{$post->slug}}/comments">
        <x-panel>
            @csrf
            <header class="flex item-center">
                <img src="https://i.pravatar.cc/60?u={{ auth()->id()}}" width="40" height="60"
                     class="rounded-full" alt="">
                <h2 class="ml-4">Want to participate?</h2>
            </header>

            <div class="mt-6">
                                    <textarea
                                        class="w-full text-sm focus:outline-none focus:ring"
                                        name="body"
                                        id="body"
                                        cols="30"
                                        placeholder="something to write."
                                        rows="10"
                                        required
                                    ></textarea>
                @error('body')
                <span class="text-xs text-red-500">{{$message}}</span>
                @enderror
            </div>

            <div class="flex border-t border-gray-200 pt-6 mt-2 justify-end">
                <button
                    class="text-white bg-blue-500 hover:bg-blue-600 focus:bg-blue-600 rounded py-2 px-10"
                    type="submit">Post
                </button>
            </div>
        </x-panel>
    </form>

@else
    <p>
        <a href="/register">Register</a> or

        <a href="/login">Log in to leave a comment</a>
    </p>
@endauth
