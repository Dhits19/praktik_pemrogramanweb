<?php
require_once __DIR__ . "/../config/auth.php";
require_once __DIR__ . "/../config/koneksi.php";

$id = (int)($_GET["id"] ?? 0);
if ($id <= 0) {
    die("ID tidak valid.");
}

$stmt = $conn->prepare("SELECT id, nim, nama, program_studi, email, foto, audio, dokumen FROM mahasiswa WHERE id = ? LIMIT 1");
$stmt->bind_param("i", $id);
$stmt->execute();
$mahasiswa = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$mahasiswa) {
    die("Data mahasiswa tidak ditemukan.");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit CRUD Media</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<header>
    <h1>Edit Data Media</h1>
    <p>File baru bersifat optional saat edit</p>
</header>
<main>
    <section>
        <form 
            class="crud-form" 
            data-media-form 
            data-require-foto="false" 
            action="../proses/crud-media/update.php" 
            method="POST" 
            enctype="multipart/form-data" 
            novalidate
        >
            <input type="hidden" name="id" value="<?= (int)$mahasiswa["id"]; ?>">

            <label for="nim">NIM</label>
            <input id="nim" name="nim" type="text" value="<?= htmlspecialchars($mahasiswa["nim"]); ?>">
            <small class="form-error" id="errorNim"></small>

            <label for="nama">Nama</label>
            <input id="nama" name="nama" type="text" value="<?= htmlspecialchars($mahasiswa["nama"]); ?>">
            <small class="form-error" id="errorNama"></small>

            <label for="program_studi">Program Studi</label>
            <input id="program_studi" name="program_studi" type="text" value="<?= htmlspecialchars($mahasiswa["program_studi"]); ?>">
            <small class="form-error" id="errorProdi"></small>

            <label for="email">Email</label>
            <input id="email" name="email" type="email" value="<?= htmlspecialchars($mahasiswa["email"]); ?>">
            <small class="form-error" id="errorEmail"></small>

            <div class="current-media">
                <strong>Foto saat ini:</strong><br>
                <?php if (!empty($mahasiswa["foto"])): ?>
                    <img class="media-preview-image" src="../uploads/images/<?= htmlspecialchars($mahasiswa["foto"]); ?>" alt="Foto saat ini">
                <?php else: ?>
                    -
                <?php endif; ?>
            </div>
            <label for="foto">Ganti Foto (optional)</label>
            <input id="foto" name="foto" type="file" accept="image/jpeg,image/png,image/webp">
            <small class="form-error" id="errorFoto"></small>
            <img id="previewFoto" class="media-preview-image" alt="Preview foto baru" hidden>

            <div class="current-media">
                <strong>Audio saat ini:</strong><br>
                <?php if (!empty($mahasiswa["audio"])): ?>
                    <audio controls preload="none">
                        <source src="../uploads/audio/<?= htmlspecialchars($mahasiswa["audio"]); ?>">
                    </audio>
                <?php else: ?>
                    -
                <?php endif; ?>
            </div>
            <label for="audio">Ganti Audio (optional)</label>
            <input id="audio" name="audio" type="file" accept="audio/mpeg,audio/wav">
            <audio id="previewAudio" class="media-preview-audio" controls hidden></audio>

            <div class="current-media">
                <strong>Dokumen saat ini:</strong>
                <?php if (!empty($mahasiswa["dokumen"])): ?>
                    <a href="../uploads/documents/<?= htmlspecialchars($mahasiswa["dokumen"]); ?>" target="_blank" rel="noopener">Buka PDF</a>
                <?php else: ?>
                    -
                <?php endif; ?>
            </div>
            <label for="dokumen">Ganti Dokumen PDF (optional)</label>
            <input id="dokumen" name="dokumen" type="file" accept="application/pdf">
            <p id="previewDokumen">Belum ada dokumen baru dipilih.</p>

            <button type="submit">Update Data Media</button>
            <a href="index.php">Batal</a>
        </form>
    </section>
</main>
<script src="../assets/js/media.js"></script>
</body>
</html>