<x-layout>
    <x-slot:heading>Blogs</x-slot:heading>
    <section class="container">
        <h1>Blogs</h1>
        <div>
            @foreach($blogs as $blog)
            <article>
                <a href="/blog/{{ $blog['id'] }}">
                    {{ $blog['title'] }}
                </a>
            </article>
            @endforeach
        </div>
    </section>
</x-layout>
