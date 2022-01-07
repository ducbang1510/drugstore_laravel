<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sửa Thông Tin Khách Hàng') }}
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
                    <form method="POST" action="{{ route('edit-customer', ['customer_id'=>$customer->customer_id]) }} " enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên khách hàng</label>
                            <input type="text" name="name" id="name"
                                   class="form-control"
                                   value="<?php if(isset($customer->name)) echo $customer->name; ?>">
                        </div>
                        <div class="form-group">
                            <label>Giới tính</label>
                            <div class="form-check-inline">
                                <label class="form-check-label" for="gender1">
                                    <input type="radio" class="form-check-input" id="gender1" name="gender"
                                           <?php if(isset($customer->gender)) {
                                               if($customer->gender == "Nam")
                                                   echo "checked";
                                           } ?>
                                           value="Nam">Nam
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label" for="gender2">
                                    <input type="radio" class="form-check-input" id="gender2" name="gender"
                                           <?php if(isset($customer->gender)) {
                                               if($customer->gender == "Nữ")
                                                   echo "checked";
                                           } ?>
                                           value="Nữ">Nữ
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại</label>
                            <input type="text" name="phone" id="phone"
                                   class="form-control"
                                   value="<?php if(isset($customer->phone)) echo $customer->phone; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email"
                                   class="form-control"
                                   value="<?php if(isset($customer->email)) echo $customer->email; ?>">
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <input type="text" name="address" id="address"
                                   class="form-control"
                                   value="<?php if(isset($customer->address)) echo $customer->address; ?>">
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
                                    onclick="location.href='{{ route('list-customers') }}'">
                                Huỷ
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
