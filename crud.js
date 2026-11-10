document.addEventListener("DOMContentLoaded", function () {

    // 1. VALIDASI FORM TAMBAH DAN EDIT
    const form = document.querySelector("[data-crud-form]");

    if (form) {
        form.addEventListener("submit", function (event) {
            const nim = document.getElementById("nim");
            const nama = document.getElementById("nama");
            const prodi = document.getElementById("program_studi");
            const email = document.getElementById("email");

            let valid = true;

            document.querySelectorAll(".form-error").forEach(function (el) {
                el.textContent = "";
            });

            document.querySelectorAll(".is-invalid").forEach(function (el) {
                el.classList.remove("is-invalid");
            });

            if (!nim || nim.value.trim() === "") {
                document.getElementById("errorNim").textContent = "NIM wajib diisi.";
                if (nim) nim.classList.add("is-invalid");
                valid = false;
            }

            if (!nama || nama.value.trim() === "") {
                document.getElementById("errorNama").textContent = "Nama wajib diisi.";
                if (nama) nama.classList.add("is-invalid");
                valid = false;
            }

            if (!prodi || prodi.value.trim() === "") {
                document.getElementById("errorProdi").textContent = "Program studi wajib diisi.";
                if (prodi) prodi.classList.add("is-invalid");
                valid = false;
            }

            if (!email || email.value.trim() === "" || !email.checkValidity()) {
                document.getElementById("errorEmail").textContent =
                    "Email wajib menggunakan format yang valid.";
                if (email) email.classList.add("is-invalid");
                valid = false;
            }

            if (!valid) {
                event.preventDefault();
                alert("Form belum valid. Periksa kembali data Anda.");
            }
        });
    }

    // 2. KONFIRMASI HAPUS
    const deleteForms = document.querySelectorAll(".delete-form");

    deleteForms.forEach(function (deleteForm) {
        deleteForm.addEventListener("submit", function (event) {
            const yakin = confirm("Yakin ingin menghapus data ini?");

            if (!yakin) {
                event.preventDefault();
            }
        });
    });

    // 3. PENCARIAN MAHASISWA
    const searchInput = document.getElementById("searchMahasiswa");
    const tableRows = document.querySelectorAll("#crudTable tbody tr");

    if (searchInput) {
        searchInput.addEventListener("input", function () {
            const keyword = searchInput.value.toLowerCase().trim();

            tableRows.forEach(function (row) {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(keyword) ? "" : "none";
            });
        });
    }

    // 4. NOTIFIKASI
    const params = new URLSearchParams(window.location.search);
    const status = params.get("status");

    if (status === "tambah") {
        alert("Data berhasil ditambahkan.");
    }

    if (status === "update") {
        alert("Data berhasil diperbarui.");
    }

    if (status === "hapus") {
        alert("Data berhasil dihapus.");
    }

});