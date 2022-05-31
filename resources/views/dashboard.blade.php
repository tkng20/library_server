@extends('layouts.app2')
@section('content')
<style>
</style>
        <!-- Begin Page Content -->
        <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 font-weight-bold text-primary">Bảng điều khiển</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Tạo báo cáo</a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Lượt mượn hôm nay
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$borrowed_by_day}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fab fa-dailymotion fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Lượt mượn trong tháng
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$borrowed_by_month}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fab fa-medium fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Lượt mượn trong năm
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$borrowed_by_year}}</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fab fa-y-combinator fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4 pendding_request">
            <a href="{{route('borrow2')}}" style="text-decoration: none;">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Yêu cầu đang đợi
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$pending_request}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-spinner fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </a>
    </div><!-- Content Row -->

    <!-- Content Row -->

    <div class="row">
        <!-- Area Chart -->
        <div class="col-12">
            <div class="card shadow mb-4" style="overflow: hidden;">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Lượt mượn sách trong tuần</h6>
                </div>
                <!-- Card Body -->
                <div>
                    <div>
                        <div id="curve_chart" style="width: 1030px; height: 320px;  margin-left: -50px;"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-12 mb-4">
            <div class="card shadow" style="overflow: hidden;">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tỷ lệ sách trong từng loại</h6>
                </div>
                <!-- Card Body -->
                <div style="overflow:hidden">
                    <div id="donutchart" style="width: 1000px; height: 400px;">
                    </div>
                </div>
            </div>
        </div>
        <!-- Content Row -->

        <!-- Content Column -->
        <div class="col-xl-12 col-lg-12 col-12">
            <!-- Project Card Example -->
            <div class="card shadow mb-4" style="overflow: hidden;">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Lượt mượn trong năm</h6>
                </div>
                <div>
                    <div class="">
                        <div id="columnchart_values" style=" margin-left: -90px;"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Top Books -->
        <div class="col-12">
            <!-- Project Card Example -->
            <div class="card shadow mb-4" style="overflow: hidden;">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Top 10 cuốn sách được mượn nhiều nhất
                    </h6>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 1%">ID</th>
                                <th scope="col" style="width: 15%">Tên sách</th>
                                <th scope="col" style="width: 15%">Số lần được mượn</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($topbooks as $book)
                            <tr>
                                <th scope="row">{{ $book->id }}</th>
                                <td>{{ $book->tenSach }}</td>
                                <td>{{ $book->solan }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
            
        </div>
        <!-- Top Books -->

         <!-- Top Books -->
         <div class="col-12">
            <!-- Project Card Example -->
            <div class="card shadow mb-4" style="overflow: hidden;">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Top 10 độc giả mượn nhiều sách nhất
                    </h6>
                </div>

                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 1%">ID</th>
                                <th scope="col" style="width: 15%">Tên độc giả</th>
                                <th scope="col" style="width: 15%">Số lần mượn sách</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($topusers as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->solan }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
            
        </div>
        <!-- Top Books -->
    </div> <!-- row -->
</div><!-- /.container-fluid -->

@endsection

@push('scripts')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
{{-- pie chart --}}
<script type="text/javascript">
  var books =  <?php echo json_encode($books); ?>;
  var categories =  <?php echo json_encode($categories); ?>;

 

const groups = books.reduce((agg, curr)=>{
 if(agg[curr.categories_id]){
   agg[curr.categories_id] += 1
   }
 else{
   agg[curr.categories_id] = 1
 }
 return agg
},{})

console.log(categories);


const entries = Object.entries(groups);
entries.unshift(['Categories', 'Number Of Books']);

entries.forEach(function changle(element){
  var temp = '';
  element[0]

  categories.forEach(function (el){
    if(el.id == element[0]) {
      element[0] = el.tenTheLoai;
    }
  });

  });

  console.log(entries);



     google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(entries);

        var options = {
          pieHole: 0.4,
          colors: ['#9e0142','#5e4fa2', '#fdae61', '#abdda4', '#3288bd', '#d53e4f', '#fee08b', '#f46d43']
        };

        console.log(entries);

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
  </script>
  <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      var count_t2 =  <?php echo json_encode($count_t2); ?>;
      var count_t3 =  <?php echo json_encode($count_t3); ?>;
      var count_t4 =  <?php echo json_encode($count_t4); ?>;
      var count_t5 =  <?php echo json_encode($count_t5); ?>;
      var count_t6 =  <?php echo json_encode($count_t6); ?>;
      var count_t7 =  <?php echo json_encode($count_t7); ?>;
      var count_t8 =  <?php echo json_encode($count_t8); ?>;

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Ngày trong tuần', 'Lượt mượn sách'],
          ['Monday',  count_t2],
          ['Tuesday',  count_t3],
          ['Wednesday',  count_t4],
          ['Thursday',  count_t5],
          ['Friday',  count_t6],
          ['Saturday',  count_t7],
          ['Sunday',  count_t8]
        ]);

        var options = {
          title: '',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
    
     <script type="text/javascript">
    var count_thang1 =  <?php echo json_encode($count_thang1); ?>;
    var count_thang2 =  <?php echo json_encode($count_thang2); ?>;
    var count_thang3 =  <?php echo json_encode($count_thang3); ?>;
    var count_thang4 =  <?php echo json_encode($count_thang4); ?>;
    var count_thang5 =  <?php echo json_encode($count_thang5); ?>;
    var count_thang6 =  <?php echo json_encode($count_thang6); ?>;
    var count_thang7 =  <?php echo json_encode($count_thang7); ?>;
    var count_thang8 =  <?php echo json_encode($count_thang8); ?>;
    var count_thang9 =  <?php echo json_encode($count_thang9); ?>;
    var count_thang10 =  <?php echo json_encode($count_thang10); ?>;
    var count_thang11 =  <?php echo json_encode($count_thang11); ?>;
    var count_thang12 =  <?php echo json_encode($count_thang12); ?>;

    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Số lượt", { role: "style" } ],
        ["Tháng Một", count_thang1, 'color: #76A7FA'],
        ["Tháng Hai", count_thang2, 'color: #76A7FA'],
        ["Tháng Ba", count_thang3, 'color: #76A7FA'],
        ["Tháng Tư", count_thang4, "color: #76A7FA"],
        ["Tháng Năm", count_thang5, 'color: #76A7FA'],
        ["Tháng Sáu", count_thang6, "color: #76A7FA"],
        ["Tháng Bảy", count_thang7, "color: #76A7FA"],
        ["Tháng Tám", count_thang8, "color: #76A7FA"],
        ["Tháng Chín", count_thang9, "color: #76A7FA"],
        ["Tháng Mười", count_thang10, "color: #76A7FA"],
        ["Tháng Mười Một", count_thang11, "color: #76A7FA"],
        ["Tháng Mười Hai", count_thang12, "color: #76A7FA"]
      ]);

      var view = new google.visualization.DataView(data);


      var options = {
        title: '',
        width: 1150,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
@endpush


