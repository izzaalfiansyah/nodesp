@extends('layouts.admin')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="row">
      <div class="col-12 col-xl-8 mb-4 mb-xl-0">
        <h3 class="font-weight-bold">Selamat Datang Superadmin</h3>
        <h6 class="font-weight-normal mb-0">Semoga hari-hari anda berjalan dengan menyenangkan!</h6>
      </div>
    </div>
  </div>
</div>
<div class="card mb-4">
  <div class="card-body">
    <div class="row">
      <div class="col-md-12 col-xl-5 d-flex flex-column justify-content-center align-items-center">
        <div class="ml-xl-4 mt-3 text-center">
          <p class="card-title">Cuaca Hari Ini</p>
          <h1 class="text-primary">{{ date('Y') }}</h1>
          <h3 class="font-weight-500 mb-xl-4 text-primary">{{ date('d M') }}</h3>
        </div>
      </div>
      <div class="col-md-12 col-xl-7">
        <div class="card tale-bg mt-4 mb-4">
          <div class="card-people mt-auto">
            <img src="{{ asset('assets') }}/images/dashboard/people.svg" alt="people">
            <div class="weather-info">
              <div class="d-flex">
                <div>
                  <h2 class="mb-0 font-weight-normal">
                    <i class="icon-sun mr-2"></i>
                    <span id="temperatur">0</span>
                    <sup>C</sup>
                    -
                    <span id="kelembaban">0</span>
                    <sup>%</sup>
                  </h2>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="stretch-card mb-4">
  <div class="card position-relative">
    <div class="card-body">
      <h4 class="card-title mb-5">Grafik Per-Jam</h4>
      <canvas id="keadaan-chart">
      </canvas>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
  axios.get('{{ url("/api/keadaan/latest") }}').then((res) => {
    const item = res.data.data;
    document.querySelector('span#temperatur').innerHTML = item.temperatur;
    document.querySelector('span#kelembaban').innerHTML = item.kelembaban;
  })

  axios.get('{{ url("/api/keadaan?tanggal=" . date("Y-m-d")) }}').then((res) => {
    const jams = [],
      kelembabans = [],
      temperaturs = [],
      items = res.data.data,
      dates = new Date();

    const jamSekarang = dates.getHours();

    for (let index = 0; index < 24; index++) {
      const jam = index < 9 ? '0' + index : index;
      jams.push(jam);

      if (index <= jamSekarang) {
        const item = items.filter((item) => {
          return item.jam == jam;
        })[0];

        kelembabans.push(item?.kelembaban || 0);
        temperaturs.push(item?.temperatur || 0);
      }
    }

    if ($("#keadaan-chart").length) {
      var areaData = {
        labels: jams,
        datasets: [{
          data: temperaturs,
          borderColor: [
            '#F09397'
          ],
          borderWidth: 3,
          fill: false,
          label: "Temperatur"
        }, {
          data: kelembabans,
          borderColor: [
            '#4747A1'
          ],
          borderWidth: 3,
          fill: false,
          label: "Kelembaban"
        }]
      };
      var areaOptions = {
        responsive: true,
        maintainAspectRatio: true,
        plugins: {
          filler: {
            propagate: false
          }
        },
        scales: {
          xAxes: [{
            display: true,
            ticks: {
              display: true,
              padding: 10,
              fontColor: "#6C7383"
            },
            gridLines: {
              display: false,
              drawBorder: false,
              color: 'transparent',
              zeroLineColor: '#eeeeee'
            }
          }],
          yAxes: [{
            display: true,
            ticks: {
              min: 0,
              padding: 18,
              fontColor: "#6C7383"
            },
            gridLines: {
              display: true,
              color: "#f2f2f2",
              drawBorder: false
            }
          }]
        },
        legend: {
          display: true
        },
        tooltips: {
          enabled: true
        },
        elements: {
          line: {
            tension: .35
          },
          point: {
            radius: 3
          }
        }
      }
      var revenueChartCanvas = $("#keadaan-chart").get(0).getContext("2d");
      var revenueChart = new Chart(revenueChartCanvas, {
        type: 'line',
        data: areaData,
        options: areaOptions
      });
    }
  })
</script>
@endsection