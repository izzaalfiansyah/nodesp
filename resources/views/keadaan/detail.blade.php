@extends('layouts.admin')

@section('content')
@php
$jam = substr(request()->route()->parameter('waktu'), 11);
@endphp
<div class="mb-4">
  <button onclick="window.history.back()" type="button" class="btn btn-primary">Kembali Ke List Data Keadaan</button>
</div>
<div class="card">
  <div class="card-body">
    <h4 class="card-title">Detail Keadaan Pada Jam {{ $jam }}</h4>
    <div class="table-responsive mt-4">
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
          </tr>
        </thead>
        <tbody>
          @foreach($items as $item)
          <tr>
            <td>
              {{ $item->jam }}
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
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="row align-items-center mt-4">
      <div class="col-6">
        Menampilkan {{ $items->count() }} dari {{ $items->total() }} data
      </div>
      <div class="col-6">
        <div class="float-right">
          {{ $items->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection