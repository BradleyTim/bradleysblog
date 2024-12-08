<x-layout>
    <section class="container">
        <h1>Create Blog</h1>
        <form action="/blog" method="POST">
            @csrf
            <div class="formgroup">
                <label for="title">A Title</label>
                <input type="text" name="title" id="title" placeholder="Here is a sample title">
            </div>
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
            <div class="formgroup">
                <label for="slug">Your Slug</label>
                <input type="text" name="slug" id="slug" placeholder="A slug goes here">
            </div>
            @error('slug')
                <p class="error">{{ $message }}</p>
            @enderror
            <div class="formgroup">
                <label for="body">Blog Body</label> 
                <textarea name="body" id="body" cols="30" rows="10" placeholder="What is on your mind? "></textarea>
            </div>
            @error('body')
                <p class="error">{{ $message }}</p>
            @enderror
            <div>
                <button type="submit">Save Blog</button>
            </div>
        </form>
    </section>
</x-layout>
