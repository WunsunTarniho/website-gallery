@include('main.head')

@include('component.sidebar')

<style>
    body{
        background-color: #a0def3;
    }
    
    section {
        height: 107vh;
    }

    .divider:after,
    .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
    }

    .h-custom {
        height: calc(100% - 73px);
    }

    .form-control {
        font-size: 1rem;
    }

    @media (max-width: 450px) {
        .h-custom {
            height: 100%;
        }
    }
</style>
<section>
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                    class="img-fluid" alt="Sample image">
            </div>
            <div class="bg-white shadow col-md-8 col-lg-6 col-xl-4 offset-xl-1 border px-4 py-4">
                <form action="/user" method="POST">
                    @csrf
                    <h3 class="mb-4 text-center">
                        Register
                    </h3>

                    <div class="form-outline mb-3">
                        <label class="form-label mx-1" for="username">Username</label>
                        <input type="text" id="username" name="username"
                            class="form-control form-control-lg @error('username') is-invalid @enderror"
                            placeholder="Username" 
                            value="{{ old('username') }}"/>
                        @error('username')
                            <div class="text-danger mx-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-outline mb-3">
                        <label class="form-label mx-1" for="email">Email address</label>
                        <input type="email" id="email" name="email"
                            class="form-control form-control-lg @error('email') is-invalid @enderror"
                            placeholder="Enter a valid email address"
                            value="{{ old('email') }}" />
                        @error('email')
                            <div class="text-danger mx-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-outline mb-3">
                        <label class="form-label mx-1" for="password">Password</label>
                        <input type="password" id="password" name="password"
                            class="form-control form-control-lg @error('password') is-invalid @enderror"
                            placeholder="Enter password" />
                        @error('password')
                            <div class="text-danger mx-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Checkbox -->
                        <div class="form-check mb-0">
                            <input class="form-check-input me-2 border-primary" type="checkbox" value=""
                                id="remember" required/>
                            <label class="form-check-label" for="remember">
                                Remember me
                            </label>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-3 pt-2">
                        <button type="submit" class="btn btn-primary"
                            style="padding-left: 2rem; padding-right: 2rem;">Register</button>
                    </div>

                    <p class="small fw-bold mt-2 pt-1 mb-0">Have an account? <a href="/login"
                            class="link-primary">Login</a></p>
                </form>
            </div>
        </div>
    </div>
</section>
@include('main.footer')
