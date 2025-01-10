<x-layout>
    <section class="container">
        <h1>Blogs</h1>
        <p>Strong opinions and shared thoughts on law, business, and tech. Since 1999.</p>
        <div>
            @foreach($blogs as $blog)
            <article>
                <p>{{ 'Bradley' }} | {{ $blog->created_at->toFormattedDateString() }}</p>
                <a href="/blog/{{ $blog->id }}">
                    {{ $blog->title }}
                </a>
            </article>
            @endforeach
        </div>
        <div>
            {{ $blogs->links() }}
        </div>
    </section>
</x-layout>
