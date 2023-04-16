@extends('layouts.admin')

@section('content')
@php
$tanggal = request()->get('tanggal') ?? date('Y-m-d')
@endphp
<div class="card mb-4">
  <div class="card-body">
    <form id="form" method="GET">
      <input type="date" id="tanggal" name="tanggal" value="{{ $tanggal }}" class="form-control">
    </form>
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
              Waktu
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
            <th>
              Opsi
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach($items as $item)
          <tr>
            <td>
              Jam {{ $item->jam }}
            </td>
            <td>
              {{ (int) $item->temperatur }} `C
            </td>
            <td>
              <div class="progress" style="height: 12px">
                <div class="progress-bar bg-primary" role="progressbar" style="width: {{ (int) $item->kelembaban }}%" aria-valuenow="{{ (int) $item->kelembaban }}" aria-valuemin="0" aria-valuemax="100">
                  <span style="font-size: 10px">
                    {{ (int) $item->kelembaban }}%
                  </span>
                </div>
              </div>
            </td>
            <td>
              -
            </td>
            <td>
              <a href="{{ route('keadaan.detail', $tanggal . "-" . $item->jam) }}" class="btn btn-xs btn-info">Detail</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
  document.querySelector('#tanggal').addEventListener('change', function() {
    document.querySelector('#form').submit();
  });
</script>
@endsection