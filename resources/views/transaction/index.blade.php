@extends('layouts.main_adminkit')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-secondary fs-3 fw-bold">List Transaksi</div>

                <div class="card-body">
                    <div class="mb-3 d-flex justify-content-between">
                        <div class="">
                            @include('transaction.create_modal')
                            {{-- <a href="{{ route('vehicle.create') }}" class="btn btn-primary">Tambah Item</a> --}}
                        </div>
                        <div class="">
                            {{-- {!! Form::open(['route' => 'item.index', 'method' => 'GET']) !!}
                            <div class="input-group">
                                {!! Form::text('search', request('search'), [
                                    'class' => 'form-control',
                                    'placeholder' => 'Cari...',
                                    'autofocus' => true,
                                    'onfocus' => 'this.select()',
                                ]) !!}
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </div>
                            </div>
                            {!! Form::close() !!} --}}
                        </div>
                    </div>
                    <div class="table-container">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Pegawai</th>
                                        <th scope="col">Kendaraan</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Verivikator 1</th>
                                        <th scope="col">Verivikator 2</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $counter = 1;
                                    @endphp
                                    @foreach ($transactions as $transaction)
                                        <tr>
                                            <th scope="row">{{ $counter++ }}</th>
                                            <td>{{ $transaction->customer_name }}</td>
                                            <td>{{ $transaction->vehicle->name }}
                                                <span class="fw-bold">--{{ $transaction->vehicle->nopol }}</span>
                                            </td>
                                            <td><span
                                                    class="badge {{ $transaction->status_transaction == 'proses' ? 'bg-warning' : ($transaction->status_transaction == 'disetujui' ? 'bg-success' : 'bg-danger') }}">{{ $transaction->status_transaction }}</span>
                                            </td>
                                            <td><span class="me-1">{{ $transaction->userLow->name }}</span><span
                                                    class="badge {{ $transaction->status_userLow == 'proses' ? 'bg-warning' : ($transaction->status_userLow == 'disetujui' ? 'bg-success' : 'bg-danger') }}">{{ $transaction->status_userLow }}</span>
                                            </td>
                                            <td><span class="me-1">{{ $transaction->userHigh->name }}</span><span
                                                    class="badge {{ $transaction->status_userHigh == 'proses' ? 'bg-warning' : ($transaction->status_userHigh == 'disetujui' ? 'bg-success' : 'bg-danger') }}">{{ $transaction->status_userHigh }}</span>
                                            </td>
                                            {{-- <td>
                                                <a href="{{ route('vehicle.show', $vehicle->id) }}"
                                                    class="btn btn-primary">Detail</a>
                                            </td> --}}

                                            <td>
                                                @if ($transaction->status_transaction !== 'disetujui')
                                                    <button class="btn btn-danger btn-sm rounded"
                                                        onclick="deleteTransaction({{ $transaction->id }})"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-trash-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                                                        </svg></button>
                                                @endif
                                                @if ($transaction->vehicle->status == 'nonready' && $transaction->status_transaction == 'disetujui')
                                                    @include('transaction.return_modal')
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- <div>
                        {{ $items->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    {{-- script delete transaction --}}
    <script>
        function deleteTransaction(transactionId) {
            Swal.fire({
                title: 'Anda yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika pengguna menekan "Ya, hapus", arahkan ke rute delete
                    window.location = '/transaction/delete/' + transactionId;
                }
            });
        }
    </script>
@endsection
