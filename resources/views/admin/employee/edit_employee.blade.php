<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sửa Thông Tin Nhân Viên') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
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
                    <form method="POST" action="{{ route('edit-employee', ['employee_id'=>$employee->employee_id]) }} " enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="company_name">Tên nhà sản xuất</label>
                            <input type="text" name="name" id="name"
                                   class="form-control"
                                   value="<?php if(isset($employee->name)) echo $employee->name; ?>">
                        </div>
                        <div class="form-group">
                            <label>Giới tính</label>
                            <div class="form-check-inline">
                                <label class="form-check-label" for="gender1">
                                    <input type="radio" class="form-check-input" id="gender1" name="gender"
                                           <?php if(isset($employee->gender)) {
                                               if($employee->gender == "Nam")
                                                   echo "checked";
                                           } ?>
                                           value="Nam">Nam
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label" for="gender2">
                                    <input type="radio" class="form-check-input" id="gender2" name="gender"
                                           <?php if(isset($employee->gender)) {
                                               if($employee->gender == "Nữ")
                                                   echo "checked";
                                           } ?>
                                           value="Nữ">Nữ
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="date_of_birth">Ngày sinh</label>
                            <input type="date" name="date_of_birth" id="date_of_birth"
                                   class="form-control"
                                   value="<?php if(isset($employee->date_of_birth)) echo $employee->date_of_birth; ?>">
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại</label>
                            <input type="text" name="phone" id="phone"
                                   class="form-control"
                                   value="<?php if(isset($employee->phone)) echo $employee->phone; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email"
                                   class="form-control"
                                   value="<?php if(isset($employee->email)) echo $employee->email; ?>">
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <input type="text" name="address" id="address"
                                   class="form-control"
                                   value="<?php if(isset($employee->address)) echo $employee->address; ?>">
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
                                    onclick="location.href='{{ route('list-employees') }}'">
                                Huỷ
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
