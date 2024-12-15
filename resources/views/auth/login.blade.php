<x-layout>
    <section class="container">
        <h1>Log In</h1>
        <form action="/login" method="POST">
            @csrf
            
            <div class="formgroup">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" :value="old('email')" placeholder="johndoe@example.com">
            </div>
            @error('email')
                <p class="error">{{ $message }}</p>
            @enderror
            <div class="formgroup">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="password">
            </div>
            @error('password')
                <p class="error">{{ $message }}</p>
            @enderror
            <div>
                <button type="submit">Log In</button>
            </div>
        </form>
    </section>
</x-layout>
