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
<div class="row">
  <div class="col-md-7 grid-margin stretch-card">
    <div class="card tale-bg">
      <div class="card-people mt-auto">
        <img src="{{ asset('assets') }}/images/dashboard/people.svg" alt="people">
        <div class="weather-info">
          <div class="d-flex">
            <div>
              <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>31<sup>C</sup> - 80<sup>%</sup></h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="stretch-card">
  <div class="card position-relative">
    <div class="card-body">
      <div class="row">
        <div class="col-md-12 col-xl-4 d-flex flex-column justify-content-center align-items-center">
          <div class="ml-xl-4 mt-3 text-center">
            <p class="card-title">Cuaca Hari Ini</p>
            <h1 class="text-primary">{{ date('Y') }}</h1>
            <h3 class="font-weight-500 mb-xl-4 text-primary">{{ date('d M') }}</h3>
          </div>
        </div>
        <div class="col-md-12 col-xl-8">
          <div class="row">
            <div class="col-md-12">
              <div class="table-responsive mb-3 mb-md-0 mt-3">
                <table class="table table-borderless report-table">
                  <tr>
                    <td class="text-muted">Illinois</td>
                    <td class="w-100 px-0">
                      <div class="progress progress-md mx-4">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td>
                      <h5 class="font-weight-bold mb-0">713</h5>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-muted">Washington</td>
                    <td class="w-100 px-0">
                      <div class="progress progress-md mx-4">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td>
                      <h5 class="font-weight-bold mb-0">583</h5>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-muted">Mississippi</td>
                    <td class="w-100 px-0">
                      <div class="progress progress-md mx-4">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td>
                      <h5 class="font-weight-bold mb-0">924</h5>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-muted">California</td>
                    <td class="w-100 px-0">
                      <div class="progress progress-md mx-4">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td>
                      <h5 class="font-weight-bold mb-0">664</h5>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-muted">Maryland</td>
                    <td class="w-100 px-0">
                      <div class="progress progress-md mx-4">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td>
                      <h5 class="font-weight-bold mb-0">560</h5>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-muted">Alaska</td>
                    <td class="w-100 px-0">
                      <div class="progress progress-md mx-4">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </td>
                    <td>
                      <h5 class="font-weight-bold mb-0">793</h5>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection