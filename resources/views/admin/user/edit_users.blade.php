<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sửa Thông Tin User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @isset($role)
                    @if($role === 'Admin')
                        <div style="padding: 10px">
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form method="POST" action="{{ route('edit-user', ['user_id'=>$user->id]) }} " enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Tên</label>
                                    <input type="text" name="name" id="name"
                                           class="form-control"
                                           value="<?php if(isset($user->name)) echo $user->name; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email"
                                           class="form-control"
                                           value="<?php if(isset($user->email)) echo $user->email; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="roles">Vai trò</label>
                                    <select class="form-control" name="roles" id="roles">
                                        <option
                                            <?php if (isset($user->roles)) {
                                                if ($user->roles === "Admin")
                                                    echo "selected";
                                            } ?>
                                            value="Admin">Admin
                                        </option>
                                        <option
                                            <?php if (isset($user->roles)) {
                                                if ($user->roles === "Web master")
                                                    echo "selected";
                                            } ?>
                                            value="Web master">Web master
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group btn-group">
                                    <button style="cursor: pointer" type="submit" class="btn btn-primary">
                                        Lưu
                                    </button>
                                </div>
                                <div class="form-group btn-group">
                                    <button style="cursor: pointer"
                                            type="button"
                                            class="btn btn-primary"
                                            onclick="location.href='{{ route('list-users') }}'">
                                        Huỷ
                                    </button>
                                </div>
                            </form>
                        </div>
                    @else
                        <div class="card bg-warning text-white">
                            <div class="card-body">
                                <?php if (isset($message)) {
                                    echo $message;
                                } ?>
                            </div>
                        </div>
                    @endif
                @endisset
            </div>
        </div>
    </div>
</x-app-layout>
