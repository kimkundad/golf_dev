@extends('admin3.layouts.template')

@section('admin3.content')

<?php
function DateThai($strDate)
{
$strYear = date("Y",strtotime($strDate))+543;
$strMonth= date("n",strtotime($strDate));
$strDay= date("j",strtotime($strDate));
$strHour= date("H",strtotime($strDate));
$strMinute= date("i",strtotime($strDate));
$strSeconds= date("s",strtotime($strDate));
$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
$strMonthThai=$strMonthCut[$strMonth];
return "$strDay $strMonthThai $strYear";
}
 ?>

<div class="row">
  <div class="col-12 grid-margin">
    <div class="card card-statistics">
      <div class="card-body p-0">
        <div class="row">
          <div class="col-md-6 col-lg-3">
            <div class="d-flex justify-content-between border-right card-statistics-item">
              <div>
                <h1>{{number_format($count_tech_in)}}</h1>
                <p class="text-muted mb-0">ช่างในระบบทั้งหมด</p>
              </div>
              <i class="icon-user-following text-primary icon-lg"></i>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="d-flex justify-content-between border-right card-statistics-item">
              <div>
                <h1>{{number_format($count_tech)}}</h1>
                <p class="text-muted mb-0"><a href="{{url('admin/new_tech')}}">ยอดสมัครช่างใหม่</a></p>
              </div>
              <i class="icon-people text-primary icon-lg"></i>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="d-flex justify-content-between border-right card-statistics-item">
              <div>
                <h1>{{number_format($count_contact)}}</h1>
                <p class="text-muted mb-0">ข้อความ ต้องการช่าง</p>
              </div>
              <i class="icon-envelope-letter text-primary icon-lg"></i>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="d-flex justify-content-between card-statistics-item">
              <div>
                <h1>{{number_format($count_contact_us)}}</h1>
                <p class="text-muted mb-0">ข้อความ Contact</p>
              </div>
              <i class="icon-envelope-open text-primary icon-lg"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="row">

  <div class="col-md-3 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">สถานะช่างในระบบ</h4>
        <div class="w-75 mx-auto">
          <canvas id="earning-report" width="100" height="100"></canvas>
        </div>
        <div class="py-4 d-flex justify-content-center align-items-end">
          <h1 class="text-center text-md-left mb-0">{{number_format($count_tech_all)}} </h1>
          <p class="text-muted mb-0 ml-2">ช่าง</p>
        </div>
        <div id="earning-report-legend" class="earning-report-legend"></div>
      </div>
    </div>
  </div>

  <div class="col-md-9 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">สมัครช่างใหม่ล่าสุด <span style="font-size:14px;"><a href="{{url('admin/new_tech')}}">(ดูทั้งหมด)</a></span></h4>
                  <table class="table">
                    <tbody>
                      @if($get_tech)
                         @foreach($get_tech as $u)

                      <tr>
                        <td class="py-1">
                          <a href="#" style="text-decoration: none;"><img src="{{url('assets/tech_img/'.$u->tech_image)}}" style="height:40px; margin-right:5px;" alt="profile" class="img-sm rounded-circle"> {{$u->tech_fname}} {{$u->tech_lname}}</a>
                        </td>
                        <td>
                          <i class="icon-call-end"></i> {{$u->tech_phone}}
                        </td>

                        <td>
                          <i class="icon-clock"></i> <?php echo DateThai($u->created_at); ?>
                        </td>
                        <td>
                          <label class="badge {{$u->option}}">{{$u->province_name}}</label>
                        </td>
                      </tr>

                      @endforeach
                   @endif


                    </tbody>
                  </table>

                </div>
              </div>
            </div>





          </div>


@stop



@section('scripts')

<script>
$(function() {
  if ($("#earning-report").length) {
    var earningReportData = {
      datasets: [{
        data: [{{number_format($per_tech_in, 0)}}, {{number_format($per_tech_new, 0)}}, {{number_format($per_tech_out, 0)}}],
        backgroundColor: [
          '#439aff',
          '#fdbab1',
          '#f3f6f9'
        ],
        borderWidth: 0
      }],

      // These labels appear in the legend and in the tooltips when hovering different arcs
      labels: [
        'ช่างในระบบ',
        'รอการตรวจสอบ',
        'ไม่ผ่าน'
      ]
    };
    var earningReportOptions = {
      responsive: true,
      maintainAspectRatio: true,
      animation: {
        animateScale: true,
        animateRotate: true
      },
      legend: {
        display: false
      },
      legendCallback: function(chart) {
        var text = [];
        text.push('<ul class="legend'+ chart.id +'">');
        for (var i = 0; i < chart.data.datasets[0].data.length; i++) {
          text.push('<li><span class="legend-label" style="background-color:' + chart.data.datasets[0].backgroundColor[i] + '"></span>');
          if (chart.data.labels[i]) {
            text.push(chart.data.labels[i]);
          }
          text.push('<span class="legend-percentage ml-auto">'+ chart.data.datasets[0].data[i] + '%</span>');
          text.push('</li>');
        }
        text.push('</ul>');
        return text.join("");
      },
      cutoutPercentage: 70
    };
    var earningReportCanvas = $("#earning-report").get(0).getContext("2d");
    var earningReportChart = new Chart(earningReportCanvas, {
      type: 'doughnut',
      data: earningReportData,
      options: earningReportOptions
    });
    document.getElementById('earning-report-legend').innerHTML = earningReportChart.generateLegend();
  }
});
</script>

@stop('scripts')
