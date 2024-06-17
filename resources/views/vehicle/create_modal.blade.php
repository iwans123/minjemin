<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Tambah Data Kendaraan
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('vehicle.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="col-form-label">Nama Kendaraan</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="nopol" class="col-form-label">Nomor Polisi</label>
                        <input type="text" class="form-control" id="nopol" name="nopol" required>
                    </div>
                    <div class="mb-3">
                        <label for="nopol" class="col-form-label">Tipe Kendaraan</label>
                        <select class="form-select" aria-label="Default select example" name="type" required>
                            <option selected>...</option>
                            <option value="orang">Angkutan Orang</option>
                            <option value="barang">Angkutan Barang</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="ownership" class="col-form-label">Kepemilikan</label>
                        <select id="ownership" class="form-select" aria-label="Default select example"
                            onchange="toggleRentalCompanyInput()" name="ownership" required>
                            <option selected>...</option>
                            <option value="sewa">Sewa</option>
                            <option value="nonsewa">Non Sewa</option>
                        </select>
                    </div>
                    {{-- <div class="mb-3">
                        <label for="nopol" class="col-form-label">Kepemilikan</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>...</option>
                            <option value="orang">Sewa</option>
                            <option value="barang">Non Sewa</option>
                        </select>
                    </div> --}}
                    {{-- <div class="mb-3">
                        <label for="nopol" class="col-form-label">Kepemilikan:</label>
                    </div>
                    <div class="mb-3">
                        <input class="form-check-input" type="radio" name="type" id="type1">
                        <label class="form-check-label" for="type1">
                            Sewa
                        </label>
                        <input class="form-check-input" type="radio" name="type" id="type2" checked>
                        <label class="form-check-label" for="type2">
                            Non Sewa
                        </label>
                    </div> --}}
                    {{-- <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            Some placeholder content for the collapse component. This panel is hidden by default but
                            revealed when the user activates the relevant trigger.
                        </div>
                    </div> --}}
                    <div class="mb-3">
                        <label for="rentalCompany" class="col-form-label">Perusahaan Rental:</label>
                        <input type="text" class="form-control" id="rentalCompany" name="rental_company">
                    </div>
                    <div class="mb-3">
                        <label for="deadline" class="col-form-label">Tanggal Pengembalian:</label>
                        <input type="date" class="form-control" id="deadline" name="deadline">
                    </div>
                    {{-- <div class="mb-3">
                        <label for="nopol" class="col-form-label">Tipe Kendaraan</label>
                    </div>
                    <div class="mb-3">
                        <input class="form-check-input" type="radio" name="type" id="type1" checked>
                        <label class="form-check-label" for="type1">
                            Angkutan Orang
                        </label>
                        <input class="form-check-input" type="radio" name="type" id="type2">
                        <label class="form-check-label" for="type2">
                            Angkutan Barang
                        </label>
                    </div> --}}
                    {{-- <div class="mb-3">
                        <label for="nopol" class="col-form-label">Nomor Polisi</label>
                        <input type="text" class="form-control" id="nopol">
                    </div> --}}
                    {{-- <button></button> --}}
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div> --}}
        </div>
    </div>
</div>
{{-- script kepemilikan --}}
<script>
    function toggleRentalCompanyInput() {
        const rentalType = document.getElementById("ownership");
        const rentalCompanyInput = document.getElementById("rentalCompany");
        const deadlineRentalInput = document.getElementById('deadline')

        if (rentalType.value === "sewa") {
            rentalCompanyInput.disabled = false;
            deadlineRentalInput.disabled = false;
        } else {
            rentalCompanyInput.disabled = true;
            rentalCompanyInput.value = ""; // Clear the input if disabled
            deadlineRentalInput.disabled = true;
            deadlineRentalInput.value = ""; // Clear the input if disabled
        }
    }
</script>
