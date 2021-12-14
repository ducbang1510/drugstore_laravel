<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Thêm Sản Phẩm') }}
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
                    <form method="POST" action="{{ route('add-product')}} " enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="product_name">Tên sản phẩm</label>
                            <input type="text" name="product_name" id="product_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="unit">Đơn vị</label>
                            <select class="form-control" name="unit" id="unit">
                                <option value="Hộp">Hộp</option>
                                <option value="Vỉ">Vỉ</option>
                                <option value="Gói">Gói</option>
                                <option value="Chai">Chai</option>
                                <option value="Lọ">Lọ</option>
                                <option value="Viên">Viên</option>
                                <option value="Ống">Ống</option>
                                <option value="Chiếc">Chiếc</option>
                                <option value="Bộ">Bộ</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price">Đơn giá</label>
                            <input type="text" name="price" id="price" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Số lượng</label>
                            <input type="text" name="quantity" id="quantity" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="dosage_forms">Dạng bào chế</label>
                            <input type="text" name="dosage_forms" id="dosage_forms" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="categories">Loại sản phẩm</label>
                            <select class="form-control" name="categories" id="categories">
                                @foreach($categories as $c)
                                    <option value="{{ $c->category_id }}">{{ $c->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="countries">Xuất xứ</label>
                            <select class="form-control" name="countries" id="countries">
                                @foreach($countries as $c)
                                    <option value="{{ $c->country_id }}">{{ $c->country_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="manufacturers">Nhà sản xuất</label>
                            <select class="form-control" name="manufacturers" id="manufacturers">
                                @foreach($manufacturers as $m)
                                    <option value="{{ $m->manufacturer_id }}">{{ $m->company_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="product_ingredient">Thành phần</label>
                            <textarea class="form-control" rows="2" id="product_ingredient" name="product_ingredient"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="effect">Tác dụng</label>
                            <textarea class="form-control" rows="2" id="effect" name="effect"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="dosage">Liều dùng</label>
                            <textarea class="form-control" rows="2" id="dosage" name="dosage"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="warning">Cảnh báo</label>
                            <textarea class="form-control" rows="2" id="warning" name="warning"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="fileUpload">Hình sản phẩm</label>
                            <input type="file" name="fileUpload" id="fileUpload" class="form-control-file border">
                        </div>
                        <div class="form-group">
                            <button style="cursor: pointer" type="submit" class="btn btn-primary">
                                Lưu
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
