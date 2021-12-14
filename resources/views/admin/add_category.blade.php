<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Thêm Danh Mục') }}
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
                    <form method="POST" action="{{ route('add-category')}} " enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="category_name">Tên danh mục</label>
                            <input type="text" name="category_name" id="category_name" class="form-control">
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
                                    onclick="location.href='{{ route('list-categories') }}'">
                                Huỷ
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
