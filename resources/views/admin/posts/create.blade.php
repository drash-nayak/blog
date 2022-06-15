<x-layout>
    <x-setting heading="Publish new Post">
        <form action="/admin/posts" enctype="multipart/form-data" method="post">
            @csrf

            <x-form.input name="title"/>

            <x-form.input name="slug"/>

            <x-form.input name="thumbnail" type="file"/>

            <x-form.textarea name="excerpt"/>

            <x-form.textarea name="body"/>

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
                            value="{{$category->id}}" {{ old('category_id') === $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                    @endforeach
                </select>
                <x-form.error name="category_id"></x-form.error>
            </x-form.field>

            <x-form.field>
                <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Submit
                </button>
            </x-form.field>
        </form>
    </x-setting>
</x-layout>
