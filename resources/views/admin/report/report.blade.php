<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Báo Cáo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @isset($orders)
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Order date</th>
                            <th>Total price</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $item)
                                <tr>
                                    <td>{{ $item -> order_id }}</td>
                                    <td>{{ $item -> order_date }}</td>
                                    <td>{{ $item -> total_price }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endisset
                <form method="POST" action="{{ route('report-order') }}">
                    @csrf
                    <label for="year">Year:</label><br>
                    <input type="text" id="year" name="year" value=""><br>
                    <label for="month">Month:</label><br>
                    <input type="text" id="month" name="month" value=""><br><br>
                    <button class="btn btn-primary" type="submit">Gửi</button>
                </form>
                <section class="wrapper">
                    <div class="chart_agile">
                        <div class="col-md-6 floatcharts_w3layouts_left">
                            <div class="floatcharts_w3layouts_top">
                                <div class="floatcharts_w3layouts_bottom">
                                    <div id="graph6"></div>
                                    <script>
                                        // Use Morris.Bar
                                        Morris.Bar({
                                            element: 'graph6',
                                            data: [
                                                {x: '2011 Q1', y: 0},
                                                {x: '2011 Q2', y: 1},
                                                {x: '2011 Q3', y: 2},
                                                {x: '2011 Q4', y: 3},
                                                {x: '2012 Q1', y: 4},
                                                {x: '2012 Q2', y: 5},
                                                {x: '2012 Q3', y: 6},
                                                {x: '2012 Q4', y: 7},
                                                {x: '2013 Q1', y: 8}
                                            ],
                                            xkey: 'x',
                                            ykeys: ['y'],
                                            labels: ['Y'],
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

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 floatcharts_w3layouts_left">
                            <div class="floatcharts_w3layouts_top">
                                <div class="floatcharts_w3layouts_bottom">
                                    <div id="graph5"></div>
                                    <script>
                                        // Use Morris.Bar
                                        Morris.Bar({
                                            element: 'graph5',
                                            data: [
                                                {x: '2011 Q1', y: 3, z: 2, a: 3},
                                                {x: '2011 Q2', y: 2, z: null, a: 1},
                                                {x: '2011 Q3', y: 0, z: 2, a: 4},
                                                {x: '2011 Q4', y: 2, z: 4, a: 3}
                                            ],
                                            xkey: 'x',
                                            ykeys: ['y', 'z', 'a'],
                                            labels: ['Y', 'Z', 'A'],
                                            stacked: true
                                        });
                                    </script>

                                </div>

                            </div>
                        </div>
                        <div class="col-md-6 floatcharts_w3layouts_left">
                            <div class="floatcharts_w3layouts_top">
                                <div class="floatcharts_w3layouts_bottom">
                                    <div id="graph7"></div>
                                    <script>
                                        // This crosses a DST boundary in the UK.
                                        Morris.Area({
                                            element: 'graph7',
                                            data: [
                                                {x: '2013-03-30 22:00:00', y: 3, z: 3},
                                                {x: '2013-03-31 00:00:00', y: 2, z: 0},
                                                {x: '2013-03-31 02:00:00', y: 0, z: 2},
                                                {x: '2013-03-31 04:00:00', y: 4, z: 4}
                                            ],
                                            xkey: 'x',
                                            ykeys: ['y', 'z'],
                                            labels: ['Y', 'Z']
                                        });
                                    </script>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 chart_agile_right">
                            <div class="chart_agile_top">
                                <div class="chart_agile_bottom">
                                    <div id="graph11"></div>
                                    <script>
                                        var neg_data = [
                                            {"period": "2011-08-12", "a": 100},
                                            {"period": "2011-03-03", "a": 75},
                                            {"period": "2010-08-08", "a": 50},
                                            {"period": "2010-05-10", "a": 25},
                                            {"period": "2010-03-14", "a": 0},
                                            {"period": "2010-01-10", "a": -25},
                                            {"period": "2009-12-10", "a": -50},
                                            {"period": "2009-10-07", "a": -75},
                                            {"period": "2009-09-25", "a": -100}
                                        ];
                                        Morris.Line({
                                            element: 'graph11',
                                            data: neg_data,
                                            xkey: 'period',
                                            ykeys: ['a'],
                                            labels: ['Series A'],
                                            units: '%'
                                        });
                                    </script>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 floatcharts_w3layouts_left">
                            <div class="floatcharts_w3layouts_top">
                                <div class="floatcharts_w3layouts_bottom">
                                    <div id="graph8"></div>
                                    <script>
                                        /* data stolen from http://howmanyleft.co.uk/vehicle/jaguar_'e'_type */
                                        var day_data = [
                                            {"period": "2012-10-01", "licensed": 3407, "sorned": 660},
                                            {"period": "2012-09-30", "licensed": 3351, "sorned": 629},
                                            {"period": "2012-09-29", "licensed": 3269, "sorned": 618},
                                            {"period": "2012-09-20", "licensed": 3246, "sorned": 661},
                                            {"period": "2012-09-19", "licensed": 3257, "sorned": 667},
                                            {"period": "2012-09-18", "licensed": 3248, "sorned": 627},
                                            {"period": "2012-09-17", "licensed": 3171, "sorned": 660},
                                            {"period": "2012-09-16", "licensed": 3171, "sorned": 676},
                                            {"period": "2012-09-15", "licensed": 3201, "sorned": 656},
                                            {"period": "2012-09-10", "licensed": 3215, "sorned": 622}
                                        ];
                                        Morris.Bar({
                                            element: 'graph8',
                                            data: day_data,
                                            xkey: 'period',
                                            ykeys: ['licensed', 'sorned'],
                                            labels: ['Licensed', 'SORN'],
                                            xLabelAngle: 60
                                        });
                                    </script>

                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
