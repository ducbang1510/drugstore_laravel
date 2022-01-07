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
                    @isset($orders)
                    <h4 style="text-align: center">Danh Sách Tất Cả Đơn Hàng</h4>
                    <div>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th>Ngày đặt hàng</th>
                                <th>Tổng tiền</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $item)
                                    <tr>
                                        <td>{{ $item -> order_id }}</td>
                                        <td>{{ $item -> order_date }}</td>
                                        <td>{{ number_format($item -> total_price, 0) }}đ</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endisset

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


{{----}}
{{--                        Hinh 5--}}
{{--                        <div class="col-md-6 floatcharts_w3layouts_left">--}}
{{--                            <div class="floatcharts_w3layouts_top">--}}
{{--                                <div class="floatcharts_w3layouts_bottom">--}}
{{--                                    <div id="graph8"></div>--}}
{{--                                    <script>--}}
{{--                                        /* data stolen from http://howmanyleft.co.uk/vehicle/jaguar_'e'_type */--}}
{{--                                        var day_data = [--}}
{{--                                            {"period": "2012-10-01", "licensed": 3407, "sorned": 660},--}}
{{--                                            {"period": "2012-09-30", "licensed": 3351, "sorned": 629},--}}
{{--                                            {"period": "2012-09-29", "licensed": 3269, "sorned": 618},--}}
{{--                                            {"period": "2012-09-20", "licensed": 3246, "sorned": 661},--}}
{{--                                            {"period": "2012-09-19", "licensed": 3257, "sorned": 667},--}}
{{--                                            {"period": "2012-09-18", "licensed": 3248, "sorned": 627},--}}
{{--                                            {"period": "2012-09-17", "licensed": 3171, "sorned": 660},--}}
{{--                                            {"period": "2012-09-16", "licensed": 3171, "sorned": 676},--}}
{{--                                            {"period": "2012-09-15", "licensed": 3201, "sorned": 656},--}}
{{--                                            {"period": "2012-09-10", "licensed": 3215, "sorned": 622}--}}
{{--                                        ];--}}
{{--                                        Morris.Bar({--}}
{{--                                            element: 'graph8',--}}
{{--                                            data: day_data,--}}
{{--                                            xkey: 'period',--}}
{{--                                            ykeys: ['licensed', 'sorned'],--}}
{{--                                            labels: ['Licensed', 'SORN'],--}}
{{--                                            xLabelAngle: 60--}}
{{--                                        });--}}
{{--                                    </script>--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="clearfix"></div>--}}
{{--                    </div>--}}
{{--                </section>--}}
            </div>
        </div>
    </div>
</x-app-layout>
