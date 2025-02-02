<x-layout>
    <section class="container">
        <h1>{{ $blog->title }}</h1>
        <p>Published by: {{ $blog->user->username }}</p>
        <div>
            {!! $blog->body !!}
        </div>
        {{-- @can('edit-blog') --}}
        @auth
            <div>
                <a href="/blog/{{ $blog->id }}/edit">Edit</a>
            </div>
        @endauth 
        {{-- @endcan --}}
    </section>
</x-layout>
