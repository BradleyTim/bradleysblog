<x-layout>
    <x-slot:heading>Blogs</x-slot:heading>
    <section class="container">
        <h1>{{$blog['title']}}</h1>
        <div>
            {{$blog['body']}}
        </div>
    </section>
</x-layout>
