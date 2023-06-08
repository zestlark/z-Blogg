@extends('admin.layout.main')


@section('page')
    <div class="message-container">
        <div class="chat-header anim">Users<span>
                <a onclick="openform('flex')"
                    style="background: #3b53b2;padding: 10px;margin-right: 20px;border-radius: 15px;color: rgb(214, 214, 214);">Add
                    new</a>
                <svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M14.212 7.762c0 2.644-2.163 4.763-4.863 4.763-2.698 0-4.863-2.119-4.863-4.763C4.486 5.12 6.651 3 9.35 3c2.7 0 4.863 2.119 4.863 4.762zM2 17.917c0-2.447 3.386-3.06 7.35-3.06 3.985 0 7.349.634 7.349 3.083 0 2.448-3.386 3.06-7.35 3.06C5.364 21 2 20.367 2 17.917zM16.173 7.85a6.368 6.368 0 01-1.137 3.646c-.075.107-.008.252.123.275.182.03.369.048.56.052 1.898.048 3.601-1.148 4.072-2.95.697-2.675-1.35-5.077-3.957-5.077a4.16 4.16 0 00-.818.082c-.036.008-.075.025-.095.055-.025.04-.007.09.019.124a6.414 6.414 0 011.233 3.793zm3.144 5.853c1.276.245 2.115.742 2.462 1.467a2.107 2.107 0 010 1.878c-.531 1.123-2.245 1.485-2.912 1.578a.207.207 0 01-.234-.232c.34-3.113-2.367-4.588-3.067-4.927-.03-.017-.036-.04-.034-.055.002-.01.015-.025.038-.028 1.515-.028 3.145.176 3.747.32z" />
                </svg>
                {{ count($users) }} people
            </span>
        </div>

        @if (session('showMessage'))
            <div class="alert alert-success" id="message">
                {{ session('message') }}
            </div>
            <script>
                setTimeout(function() {
                    document.getElementById('message').style.display = 'none';
                }, 5000);
            </script>
            <style>
                .alert {
                    position: relative;
                    padding: 0.75rem 1.25rem;
                    margin-bottom: 1rem;
                    border: 1px solid transparent;
                    border-radius: 0.25rem;
                }

                .alert-success {
                    color: #155724;
                    background-color: #d4edda;
                    border-color: #c3e6cb;
                }
            </style>
        @endif

        @for ($i = 0; $i < count($users); $i++)
            <div class="message anim" style="--delay: .1s;">
                <div class="author-img__wrapper video-author video-p">

                    <img class="author-img" src="https://img.icons8.com/?size=512&id=MjD9wmGLwhA2&format=png" />
                </div>
                <div class="msg-wrapper">
                    <div class="msg__name video-p-name">
                        <a href="blog?author={{ $users[$i]->name }}">
                            {{ $users[$i]->name }}
                        </a>
                    </div>
                    <div class=" video-p-sub">
                        @if ($users[$i]->role == 'admin')
                            <span style="background: rgba(121, 121, 121, 0.399);padding: 2px 4px ;margin-right: 5px;">
                                {{ $users[$i]->role }} </span>
                            @if (Auth::User()->name == $users[$i]->name)
                                <span style="background: rgba(121, 121, 121, 0.399);padding: 2px 4px ;margin-right: 5px;">
                                    Me </span> |
                            @endif
                        @endif

                        <span>{{ $users[$i]->email }}</span> |
                        <span>{{ $users[$i]->created_at->diffForHumans() }}</span>

                    </div>
                </div>
            </div>
        @endfor

        <style>
            /* Custom CSS styles for the form */
            .my-form {
                max-width: 400px;
                margin: 0 auto;
                min-width: 300px;
            }

            .my-form-group {
                margin-bottom: 20px;
            }

            .my-label {
                display: block;
                margin-bottom: 5px;
                font-weight: bold;
            }

            .my-input {
                width: 100%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
                font-size: 16px;
                margin-bottom: 10px;
            }

            .my-button {
                display: block;
                width: 100%;
                padding: 10px;
                background-color: #4caf50;
                color: #fff;
                border: none;
                border-radius: 4px;
                font-size: 16px;
                cursor: pointer;
            }

            .my-button:hover {
                background-color: #45a049;
            }
        </style>

        <!-- Your HTML form here -->
        <div class="form-box anim" id="addform"
            style="--delay: .1s;background: #1f1d2b;width: 100vw;height: 100vh;position: fixed;top: 0; right: 0;display: none;justify-content: center;align-items: center;z-index: 2;">
            <form class="my-form" method="POST" action="{{ route('adminUserDelete') }}">
                @csrf
                <div class="mb-5">
                    <label for="name" class="form-label my-label">Name</label>
                    <input id="name" type="text" class="form-control my-input @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-5">
                    <label class="form-label my-label" for="email">Email address</label>
                    <input id="email" type="email" class="form-control my-input @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-5">
                    <label class="form-label my-label" for="password">Password</label>
                    <input id="password" type="password"
                        class="form-control my-input @error('password') is-invalid @enderror" name="password" required
                        autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-5">
                    <label class="form-label my-label" for="role">Role</label>
                    <select id="role" class="form-control my-input @error('role') is-invalid @enderror" name="role"
                        required>
                        <option value="">Choose Role</option>
                        <option value="admin">Admin</option>
                        <option value="">user</option>
                    </select>

                    @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div>
                    <button class="btn btn-primary w-full my-button" type="submit">
                        Create new user
                    </button>
                </div>
                <span class="close"
                    style="background: #3b53b2;padding: 4px 10px; margin-top: 20px;text-align: center;display: inline-block"onclick="openform('none')">Close</span>
            </form>
        </div>

        <script>
            function openform(state) {
                document.getElementById("addform").style.display = state;
            }
        </script>

    </div>
@endsection
