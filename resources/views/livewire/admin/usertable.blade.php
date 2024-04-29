<div>

    <body class="dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed sidebar-collapse">
        <div class="wrapper">
            <nav class="main-header navbar navbar-expand navbar-dark">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>
            </nav>
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <a href="{{ route('livewire.admin.dashboard') }}" class="brand-link" wire:navigate>
                    <img src="{{ '/dist/img/loginanimated.gif' }}" alt="AdminLTE Logo"
                        class="brand-image img-circle elevation-3">
                    <span class="brand-text font-weight-light">Ticket Service</span>
                </a>
                <div class="sidebar">
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="{{ '/dist/img/user9.jpg' }}" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            @auth
                                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                            @else
                            @endauth
                        </div>
                    </div>
                    <div class="form-inline">
                        <div class="input-group" data-widget="sidebar-search">
                            <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                                aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-sidebar">
                                    <i class="fas fa-search fa-fw"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <li class="nav-header">Admin Page</li>
                            <li class="nav-item">
                                <a href="{{ route('livewire.admin.dashboard') }}" class="nav-link" wire:navigate>
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link active">
                                    <i class="fas fa-users"></i>
                                    <p> Manage Users </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('livewire.admin.divtable') }}" class="nav-link" wire:navigate>
                                    <i class="fas fa-object-group"></i>
                                    <p> Manage Division </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" id="logout-button" class="nav-link" wire:click="logout">
                                    <i class="nav-icon fas fa-sign-out-alt"></i>
                                    <p> Sign out </p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <!--DataTable and Update/Delete-->
            <div class="content-wrapper">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">User lists</h1>
                            </div>
                            <div class="col-sm-6">
                                <div class="breadcrumb float-sm-right">
                                    <button type="button" wire:loading.attr="disabled"
                                        class="btn btn-block btn-primary btn-lg" data-toggle="modal"
                                        data-target="#modal-primary"><i class="fa fa-plus-circle mr-1"></i>Create
                                        User</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-4 input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-search fa-fw"></i></span>
                        </div>
                        <input wire:ignore.self type="text" class="form-control" placeholder="Search User here!"
                            wire:model.live="searchUser">
                    </div>
                    @if (count($selectedUsers) > 0)
                        <div class="d-flex justify-content-end mb-3">
                            <div class="btn-group">
                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    Change Status
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#"
                                        wire:click.prevent="updateStatus('approved')">Approved</a>
                                    <a class="dropdown-item" href="#"
                                        wire:click.prevent="updateStatus('disapproved')">Disapproved</a>
                                </div>
                            </div>
                        </div>
                    @endif
                    <table id="table1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Select</th>
                                <th>Role</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Division</th>
                                <th>Status</th>
                                <th>Created at</th>
                                <th>Last update</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($userpage as $user)
                                <tr>
                                    <td class="d-flex justify-content-center">
                                        <input type="checkbox" wire:model.live="selectedUsers"
                                            value="{{ $user->id }}" id="checkbox_id">
                                    </td>
                                    <td class="text-center sorting_1"><span
                                            class="right badge p-2 badge-success">{{ $user->acctype }}</span></td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if ($user->division)
                                            {{ $user->division->name }}
                                        @else
                                            <span class="text-warning">Division no longer exists.</span>
                                        @endif
                                    </td>
                                    <td>{{ $user->status }}</td>
                                    <td>{{ $user->created_at->format('F d, Y') }}</td>
                                    <td>{{ $user->updated_at->format('F d, Y') }}</td>
                                    <td class="d-flex justify-content-center align-items-center">
                                        <div class="btn-group">
                                            <a class="btn btn-app" wire:click="loadUser({{ $user->id }})"
                                                data-toggle="modal">
                                                <i class="fas fa-edit"></i> Update
                                            </a>
                                            <a class="btn btn-app"
                                                wire:click.prevent="userdelete({{ $user->id }})">
                                                <i class="fas fa-trash"></i> Delete
                                            </a>
                                        </div>
                                    </td>

                                </tr>
                                <div wire:ignore.self class="modal fade" data-backdrop="static" data-keyboard="false"
                                    id="updateUserLabel{{ $user->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content bg-primary">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Update User</h4>
                                                <button type="button" wire:click = "clearText" class="close"
                                                    data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="input-group mb-3">
                                                    <input type="text" wire:model="name" class="form-control"
                                                        placeholder="Full name" required>
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fas fa-user"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="text" wire:model="username" class="form-control"
                                                        placeholder="Username" required>
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fas fa-user"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="email" wire:model="email" class="form-control"
                                                        placeholder="Email" required>
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fas fa-envelope"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="input-group mb-2">
                                                    <select wire:model="acctype" id="acctype{{ $user->id }}"
                                                        class="form-control custom-select" required>
                                                        <option selected>{{ $user->acctype }}</option>
                                                        <option value="user">User Level</option>
                                                        <option value="admin">Admin Level</option>
                                                    </select>
                                                </div>
                                                <div class="input-group mb-2">
                                                    <select wire:model="division_id"
                                                        id="division_id{{ $user->id }}"
                                                        class="form-control custom-select" required>
                                                        @if ($user->division)
                                                            <option value="{{ $user->division->id }}" selected>
                                                                {{ $user->division->name }}</option>
                                                        @else
                                                            <option value="" selected disabled>Select Division
                                                            </option>
                                                        @endif
                                                        @foreach ($divisions as $division)
                                                            <option value="{{ $division->id }}">{{ $division->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="password" wire:model="password" class="form-control"
                                                        placeholder="Enter New Password">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fas fa-lock"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="password" wire:model="password_confirmation"
                                                        class="form-control" placeholder="Retype New Password">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fas fa-lock"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" wire:click = "clearText"
                                                        id="updateUserClose{{ $user->id }}"
                                                        class="btn btn-outline-light"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="button"
                                                        wire:click = "registerUpdate({{ $user->id }})"
                                                        class="btn btn-outline-light">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                    <div>{{ $userpage->links() }}</div>
                </div>
                <aside class="control-sidebar control-sidebar-dark"></aside>
            </div><!--DataTable End-->
            <!--Create User--->
            <div class="modal fade" wire:ignore.self data-backdrop="static" data-keyboard="false"
                id="modal-primary">
                <div class="modal-dialog">
                    <div class="modal-content bg-primary">
                        <div class="modal-header">
                            <h4 class="modal-title">Create User</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
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
                                <input type="text" wire:model="username" class="form-control"
                                    placeholder="Username" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="email" wire:model="email" class="form-control" placeholder="Email"
                                    required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-2">
                                <select wire:model="acctype" id="acctype" class="form-control custom-select"
                                    required>
                                    <option value="" selected>Select Role</option>
                                    <option value="user">User Level</option>
                                    <option value="admin">Admin Level</option>
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
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-outline-light" id="createUserClose"
                                    data-dismiss="modal">Close</button>
                                <button type="button" wire:click = "registerStore"
                                    class="btn btn-outline-light">Create</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--Create User End--->
        </div>

        <script>
            window.addEventListener('swal:loading', event => {
                let data = event.detail;
                console.log(data);

                Swal.fire({
                    title: 'Loading',
                    html: `<span style="color: white;">${data.text}</span>`,
                    timer: event.detail.timer,
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    showCancelButton: false,
                    didOpen: () => {
                        Swal.showLoading()
                    },
                    willClose: () => {
                        $('#updateUserLabel' + event.detail.onComplete).modal('show');
                    }
                });
            });
        </script>

        <script>
            window.addEventListener('registered', event => {
                let data = event.detail;
                console.log(data);

                if (data.type === 'error' && data.error) {
                    let errorMessage = data.error.replace(/\(and \d+ more errors\)/g, '');
                    Swal.fire({
                        icon: 'error',
                        title: errorMessage,
                        showConfirmButton: false,
                        timer: 3000,
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
                        html: `<span style="color: white;">${data.text}</span>`,
                        confirmButtonText: 'Ok',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#createUserClose').click();
                        }
                    });
                }
            });
        </script>

        <script>
            window.addEventListener('updated', event => {
                let data = event.detail;
                console.log(data);

                if (data.type === 'error' && data.error) {
                    let errorMessage = data.error.replace(/\(and \d+ more errors\)/g, '');
                    Swal.fire({
                        icon: 'error',
                        title: errorMessage,
                        showConfirmButton: false,
                        timer: 3000,
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
                        html: `<span style="color: white;">${data.text}</span>`,
                        confirmButtonText: 'Ok',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $(`#updateUserClose${data.userId}`).click();
                        }
                    });
                }
            });
        </script>

        <script>
            window.addEventListener('deleteuserconfirm', event => {
                let data = event.detail;
                console.log(data);
                Swal.fire({
                    title: data.title,
                    html: `<span style="color: white;">${data.text}</span>`,
                    icon: data.icon,
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('deleteConfirmed')
                    }
                });
            });

            window.addEventListener('userDeleted', event => {
                let data = event.detail;
                console.log(data);
                Swal.fire({
                    title: data.title,
                    html: `<span style="color: white;">${data.text}</span>`,
                    icon: data.icon
                });
            });
        </script>

    </body>
</div>
