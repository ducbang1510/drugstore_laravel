<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Báo Cáo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form method="POST" action="{{ route('report-order') }}">
                    @csrf
                    <label for="year">Year:</label><br>
                    <input type="text" id="year" name="year" value=""><br>
                    <label for="month">Month:</label><br>
                    <input type="text" id="month" name="month" value=""><br><br>
                    <button class="btn btn-primary" type="submit">Gửi</button>
                </form>

                @isset($orders)
                <div style="text-align: center">
                    <h4>Danh Sách Tất Cả Đơn Hàng</h4>
                </div>
                <div style="padding: 10px">
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
                    <div style="padding: 10px">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Ngày</th>
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
                    <div style="text-align: center">
                        <p>Doanh thu theo ngày trong tháng {{ $month }} năm {{ $year }}</p>
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

{{--                <section class="wrapper">--}}
{{--                    <div class="chart_agile">--}}
{{--                        Hinh 1--}}
{{--                        <div class="col-md-6 floatcharts_w3layouts_left">--}}
{{--                            <div class="floatcharts_w3layouts_top">--}}
{{--                                <div class="floatcharts_w3layouts_bottom">--}}
{{--                                    <div id="graph6"></div>--}}
{{--                                    <script>--}}
{{--                                        // Use Morris.Bar--}}
{{--                                        Morris.Bar({--}}
{{--                                            element: 'graph6',--}}
{{--                                            data: [--}}
{{--                                                {x: '2011 Q1', y: 0},--}}
{{--                                                {x: '2011 Q2', y: 1},--}}
{{--                                                {x: '2011 Q3', y: 2},--}}
{{--                                                {x: '2011 Q4', y: 3},--}}
{{--                                                {x: '2012 Q1', y: 4},--}}
{{--                                                {x: '2012 Q2', y: 5},--}}
{{--                                                {x: '2012 Q3', y: 6},--}}
{{--                                                {x: '2012 Q4', y: 7},--}}
{{--                                                {x: '2013 Q1', y: 8}--}}
{{--                                            ],--}}
{{--                                            xkey: 'x',--}}
{{--                                            ykeys: ['y'],--}}
{{--                                            labels: ['Y'],--}}
{{--                                            barColors: function (row, series, type) {--}}
{{--                                                if (type === 'bar') {--}}
{{--                                                    var red = Math.ceil(255 * row.y / this.ymax);--}}
{{--                                                    return 'rgb(' + red + ',0,0)';--}}
{{--                                                } else {--}}
{{--                                                    return '#000';--}}
{{--                                                }--}}
{{--                                            }--}}
{{--                                        });--}}
{{--                                    </script>--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
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
