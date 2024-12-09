<x-layout>
    <section class="container">
        <h1>Create Blog</h1>
        <form action="/blog/{{ $blog->id }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="formgroup">
                <label for="title">A Title</label>
                <input type="text" name="title" id="title" placeholder="Here is a sample title" value="{{ $blog->title }}">
            </div>
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
            <div class="formgroup">
                <label for="slug">Your Slug</label>
                <input type="text" name="slug" id="slug" placeholder="A slug goes here" value="{{ $blog->slug }}">
            </div>
            @error('slug')
                <p class="error">{{ $message }}</p>
            @enderror
            <div class="formgroup">
                <label for="body">Blog Body</label> 
                <textarea name="body" id="body" cols="30" rows="10" placeholder="What is on your mind? ">{{ $blog->body }}</textarea>
            </div>
            @error('body')
                <p class="error">{{ $message }}</p>
            @enderror
            <div>
                <button class="delete-button" form="delete-form">Delete</button>
                <button type="submit">Update Blog</button>
            </div>
        </form>
        <form method="POST" action="/blog/{{ $blog->id }}" class="hidden" id="delete-form">
            @csrf
            @method('DELETE')
            
        </form>
    </section>
</x-layout>
