@extends('layouts.main_adminkit')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-secondary fs-3 fw-bold">List Kendaraan</div>

                <div class="card-body">
                    <div class="mb-3 d-flex justify-content-between">
                        <div class="">
                            @include('employee.create_modal')
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
                                        <th scope="col">Nama</th>
                                        <th scope="col">NIP</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Jabatan</th>
                                        {{-- <th scope="col">Aksi</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $counter = 1;
                                    @endphp
                                    @foreach ($employees as $employee)
                                        <tr>
                                            <th scope="row">{{ $counter++ }}</th>
                                            <td>{{ $employee->name }}</td>
                                            <td>{{ $employee->nip }}</td>
                                            <td>{{ $employee->email }}</td>
                                            <td>{{ $employee->position }}</td>
                                            {{-- <td>
                                                @include('employee.edit_modal')
                                            </td> --}}
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
    {{-- <script>
        function deletePost(postId) {
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
                    window.location = '/item/delete/' + postId;
                }
            });
        }
    </script> --}}
@endsection
