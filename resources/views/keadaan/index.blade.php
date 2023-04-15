@extends('layouts.admin')

@section('content')
<div class="card mb-4">
  <div class="card-body">
    <div class="">
      <input type="date" name="tanggal" value="{{ date('Y-m-d') }}" class="form-control">
    </div>
  </div>
</div>
<div class="card">
  <div class="card-body">
    <h4 class="card-title">Data Keadaan</h4>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>
              Tanggal dan Waktu
            </th>
            <th>
              Temperatur
            </th>
            <th>
              Kelembaban
            </th>
            <th>
              Keterangan
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              Herman Beck
            </td>
            <td>
              $ 77.99
            </td>
            <td>
              <div class="progress">
                <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </td>
            <td>
              May 15, 2015
            </td>
          </tr>
          <tr>
            <td>
              Messsy Adam
            </td>
            <td>
              $245.30
            </td>
            <td>
              <div class="progress">
                <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </td>
            <td>
              July 1, 2015
            </td>
          </tr>
          <tr>
            <td>
              John Richards
            </td>
            <td>
              $138.00
            </td>
            <td>
              <div class="progress">
                <div class="progress-bar bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </td>
            <td>
              Apr 12, 2015
            </td>
          </tr>
          <tr>
            <td>
              Peter Meggik
            </td>
            <td>
              $ 77.99
            </td>
            <td>
              <div class="progress">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </td>
            <td>
              May 15, 2015
            </td>
          </tr>
          <tr>
            <td>
              Edward
            </td>
            <td>
              $ 160.25
            </td>
            <td>
              <div class="progress">
                <div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </td>
            <td>
              May 03, 2015
            </td>
          </tr>
          <tr>
            <td>
              John Doe
            </td>
            <td>
              $ 123.21
            </td>
            <td>
              <div class="progress">
                <div class="progress-bar bg-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </td>
            <td>
              April 05, 2015
            </td>
          </tr>
          <tr>
            <td>
              Henry Tom
            </td>
            <td>
              $ 150.00
            </td>
            <td>
              <div class="progress">
                <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </td>
            <td>
              June 16, 2015
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection