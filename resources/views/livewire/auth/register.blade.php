<div style="opacity: 0.9;">

    <body class="hold-transition register-page">
        <div class="register-box">
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <a href="#" class="h1"><img src="{{ '/dist/img/loginanimated.gif' }}" alt="AdminLTE Logo"
                            class="brand-image img-circle elevation-3" width="50" height="50"><b>Ticket</b>
                        System</a>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Register a new membership</p>

                    <form wire:submit.prevent="registerStore" novalidate>
                        <div class="input-group mb-3">
                            <input type="text" wire:model="name" class="form-control" placeholder="Full name"
                                required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" wire:model="username" class="form-control" placeholder="Username"
                                required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="email" wire:model="email" class="form-control" placeholder="Email" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-2">
                            <select wire:model="acctype" id="acctype" class="form-control custom-select" required>
                                <option value="" selected>Select Role</option>
                                <option value="User">User Level</option>
                                <option value="Admin">Admin Level</option>
                            </select>
                        </div>

                        <div class="input-group mb-2">
                            <select wire:model="division_id" id="division_id" class="form-control custom-select"
                                required>
                                <option value="" selected>Select Division</option>
                                @foreach ($divisions as $division)
                                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" wire:model="password" class="form-control"
                                placeholder="Enter Password" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" wire:model="password_confirmation" required
                                autocomplete="new-password" class="form-control" placeholder="Retype Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="agreeTerms" wire:model="terms" required>
                                    <label for="agreeTerms">
                                        I agree to the <a href="https://www.youtube.com/watch?v=A9vmwIo0lfA">terms &
                                            noots</a>
                                    </label>
                                </div>
                            </div>

                            <div class="col-4">
                                <button wire:loading.attr='disabled' type="submit"
                                    class="btn btn-success btn-block">Register</button>
                            </div>
                        </div>
                    </form>
                    <a href="/" class="text-center" wire:navigate>I already have a membership</a>
                </div>
            </div>
        </div>

        <script>
            window.addEventListener('registered', event => {
                let data = event.detail;
                console.log(data);

                if (data.type === 'error' && data.error) {
                    let errorMessage = data.error.replace(/\(and \d+ more errors\)/g, '');
                    Swal.fire({
                        icon: 'error',
                        title: errorMessage,
                        // imageUrl: data.imageUrl,
                        // imageAlt: data.imageAlt,
                        // imageWidth: 170,
                        // imageHeight: 300,
                        showConfirmButton: true,
                        showClass: {
                            popup: `animate__animated animate__tada`
                        },
                        hideClass: {
                            popup: `animate__animated animate__backOutRight animate__faster`
                        }
                    });
                } else {
                    Swal.fire({
                        icon: data.type,
                        title: data.title,
                        text: data.text,
                        confirmButtonText: 'Ok',
                    });
                }

            });
        </script>

    </body>
    <div>
    </div>
</div>
