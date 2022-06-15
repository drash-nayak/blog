<x-layout>
    <x-setting :heading="'Edit Post: '.$post->title ">
        <form action="/admin/posts/{{$post->id}}" enctype="multipart/form-data" method="post">
            @csrf
            @method('PATCH')

            <x-form.input name="title" :value="old('title',$post->title)"/>

            <x-form.input name="slug" :value="old('slug',$post->slug)"/>

            <div class="flex mt-6">
                <div class="flex-1">
                    <x-form.input name="thumbnail" type="file" :value="old('thumbnail',$post->thumbnail)"/>
                </div>
                <img src="{{ asset("storage/$post->thumbnail") }}" alt="" class="rounded-xl ml-6" width="100">
            </div>

            <x-form.textarea name="excerpt">{{$post->excerpt}}</x-form.textarea>

            <x-form.textarea name="body">{{$post->body}}</x-form.textarea>

            <x-form.field>
                <x-form.label name="category_id"/>
                <select
                    required
                    class="border border-gray-400 p-2 w-full"
                    name="category_id"
                    id="category_id">
                    @php
                        $categories = \App\Models\Category::all();
                    @endphp
                    @foreach($categories as $category)
                        <option
                            value="{{$category->id}}" {{ old('category_id',$post->category_id) === $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                    @endforeach
                </select>
                <x-form.error name="category_id"></x-form.error>
            </x-form.field>

            <x-form.field>
                <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Update
                </button>
            </x-form.field>
        </form>
    </x-setting>
</x-layout>
