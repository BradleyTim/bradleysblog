<x-layout>
    <section class="container">
        <h1>{{ $blog->title }}</h1>
        <p>Published by: {{ $blog->user->username }}</p>
        <div>
            {!! $blog->body !!}
        </div>
    </section>
</x-layout>
