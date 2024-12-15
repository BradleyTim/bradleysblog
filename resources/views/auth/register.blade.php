<x-layout>
    <section class="container">
        <h1>Register</h1>
        <form action="/register" method="POST">
            @csrf
            <div class="formgroup">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" :value="old('username')" placeholder="johndoe">
            </div>
            @error('username')
                <p class="error">{{ $message }}</p>
            @enderror
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
            <div class="formgroup">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="password">
            </div>
            @error('password')
                <p class="error">{{ $message }}</p>
            @enderror
            <div>
                <button type="submit">Register</button>
            </div>
        </form>
    </section>
</x-layout>
