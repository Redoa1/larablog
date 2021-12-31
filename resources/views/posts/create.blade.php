<x-layout>
    <section class="py-8 mx-auto">
        <div class="flex justify-center min-h-screen bg-gray-100">
            <div class="container sm:mt-40 mt-24 my-auto max-w-md border-2 border-gray-200 p-3 bg-white">
                <div class="m-6">
                    <form class="mb-4" method="POST" action="/admin/post" enctype="multipart/form-data">
                        @csrf
                        <x-form.input name='title' />
                        <x-form.input name='slug' />
                        <x-form.input name='image' type='file' />
                        <x-form.textarea name='excerpt' />
                        <x-form.textarea name='body' />
                        <x-form.field>
                            <x-form.label name='category' />
                            <select name="category_id" id="category" class="w-full">
                                @foreach (\App\Models\Category::all() as $category)
                                    <option value="{{ $category->id }}" {{ old('çategory_id') == $category->id?'selected':'' }}>{{ ucwords($category->name) }}</option>
                                @endforeach
                            </select>
                            <x-form.error name='{{ $name }}' />
                        </x-form.field>
                        <x-form.field>
                            <button type="submit"
                                class="w-full px-3 py-4 text-white bg-indigo-500 rounded-md hover:bg-indigo-600 focus:outline-none duration-100 ease-in-out">POST</button>
                        </x-form.field>  
                    </form>
                    <!-- seperator -->
                </div>
            </div>
        </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(function() {
        $('#title').keyup(function() {
            var value = $(this).val().toLowerCase();
            $('#slug').val(value.split(' ').join('-'));
        }).keyup();
    });
</script>

    </section>
</x-layout>
