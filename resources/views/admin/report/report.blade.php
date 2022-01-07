<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Báo Cáo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container" style="padding: 10px 0">
                    <h4>Lựa chọn kiểu thống kê doanh thu</h4>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input id="r-year" type="radio" class="form-check-input" name="optradio">Theo từng tháng trong năm
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input id="r-month" type="radio" class="form-check-input" name="optradio" checked>Theo từng ngày trong tháng
                        </label>
                    </div>

                    <form method="POST" action="{{ route('report-revenue') }}" style="width: 300px">
                        @csrf
                        <br>
                        <h5>Nhập thông tin</h5>
                        <div class="form-group">
                            <label id="label-year" for="year">Nhập năm (sau năm 2020):</label>
                            <input class="form-control" min="2020" type="number" id="year" name="year" required>
                        </div>
                        <div class="form-group">
                            <label id="label-month" for="month">Nhập tháng (từ 1 đến 12):</label>
                            <input class="form-control" min="1" max="12" type="number" id="month" name="month">
                        </div>
                        <button class="btn btn-info" type="submit">Gửi</button>
                    </form>
                    <br>
                    <a class="btn btn-info" href='{{ route('list-orders') }}' role="button">Xem danh sách tất cả đơn hàng</a>

                    <script>
                        $(document).ready(function(){
                            $("#r-year").click(function(){
                                $("#year").show();
                                $("#month").hide();
                                $("#label-month").hide();
                            });
                            $("#r-month").click(function(){
                                $("#year").show();
                                $("#month").show();
                                $("#label-month").show();
                            });
                        });
                    </script>
                </div>

                <div class="container">
                    @isset($data_revenue, $month, $year)
                        <div id="graph11"></div>
                        <div style="text-align: center;">
                            <p>Biểu đồ doanh thu tháng {{ $month }} năm {{ $year }} (đơn vị tính: đồng)</p>
                        </div>
                        <script>
                            var neg_data = [
                                <?php
                                if(isset($data_revenue, $month, $year)) {
                                    for($i = 0,$size = count($data_revenue); $i < $size; $i++) {
                                        echo "{'day': '".$year."-".$month."-".($i + 1)."', 'a': ".$data_revenue[$i]."},";
                                    };
                                };
                                ?>
                            ];
                            Morris.Line({
                                element: 'graph11',
                                data: neg_data,
                                xkey: 'day',
                                ykeys: ['a'],
                                labels: ['Doanh thu'],
                                units: 'đ'
                            });
                        </script>
                    @endisset

                    @isset($data_revenue, $year)
                        @if(!isset($month))
                            <div id="graph6"></div>
                            <div style="text-align: center;">
                                <p>Biểu đồ doanh thu theo tháng năm {{ $year }} (đơn vị tính: đồng)</p>
                            </div>
                            <script>
                                var revenue_data = [
                                    <?php
                                    if(isset($data_revenue, $year)) {
                                        for($i = 0,$size = count($data_revenue); $i < $size; $i++) {
                                            echo "{x: '".($i + 1)."', y: ".$data_revenue[$i]."},";
                                        };
                                    };
                                    ?>
                                ];
                                Morris.Bar({
                                    element: 'graph6',
                                    data: revenue_data,
                                    xkey: 'x',
                                    ykeys: ['y'],
                                    labels: ['Doanh thu'],
                                    units: 'đ',
                                    barColors: function (row, series, type) {
                                        if (type === 'bar') {
                                            var red = Math.ceil(255 * row.y / this.ymax);
                                            return 'rgb(' + red + ',0,0)';
                                        } else {
                                            return '#000';
                                        }
                                    }
                                });
                            </script>
                        @endif
                    @endisset
                    <hr>
                    @isset($data_revenue, $year)
                        <div>
                            @if(isset($month))
                                <h4 style="text-align: center">Doanh thu theo ngày trong tháng {{ $month }} năm {{ $year }}</h4>
                            @else
                                <h4 style="text-align: center">Doanh thu theo tháng trong năm {{ $year }}</h4>
                            @endif
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    @if(isset($month))
                                        <th>Ngày</th>
                                    @else
                                        <th>Tháng</th>
                                    @endif
                                    <th>Doanh thu</th>
                                </tr>
                                </thead>
                                <tbody>
                                @for($i = 0,$size = count($data_revenue); $i < $size; $i++)
                                    <tr>
                                        <td>{{ ($i+1) }}</td>
                                        <td>{{ number_format($data_revenue[$i], 0) }}đ</td>
                                    </tr>
                                @endfor
                                </tbody>
                            </table>
                        </div>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
