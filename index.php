<?php
require_once("../config/auth.php");
?>
<!DOCTYPE html> 
<html lang="id"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Biodata Saya</title> 
    <link rel="stylesheet" href="../assets/css/style.css">
    <a href="../crud-media/index.php">CRUD Media</a>
</head> 
<body> 
 
    <header id="top"> 
        <h1>BIODATA SAYA</h1> 
        <p>Web Programming 1</p> 
    </header> 
 
    <nav id="main-navigation" class="top-nav">
 <a href="index.php">Biodata</a>
 <a href="Layout.php">Layout Experiment</a>
 <a href="data_mahasiswa.php">Data mahasiswa</a>
 <a href="form_mahasiswa.php"> Tambah Mahasiswa</a>
 <a href="#pendidikan">Pendidikan</a>
 <a href="#hobi">Hobi</a>

</nav>

 
    <main> 
        <section id="biodata" class="card"> 
            <h2>Data Pribadi</h2> 
 
           <figure>
 <img src="../assets/images/fotoprofile.jpeg" alt="Foto Profil">
  <figcaption></figcaption>
</figure> 
 
            <table> 
                <caption>Informasi Biodata</caption> 
                <tbody> 
                    <tr> 
                        <th scope="row">Nama</th> 
                        <td>Radhitya Fazri</td> 
                    </tr> 
                    <tr> 
                        <th scope="row">NIM</th> 
                        <td>4112755201250029</td> 
                    </tr>
                     <tr> 
                        <th scope="row">Program Studi</th> 
                        <td>Informatika</td> 
                    </tr> 
                </tbody> 
            </table> 
        </section> 
 
        <section id="tentang" class="card"> 
            <h2>Tentang Saya</h2> 
            <p>Halo, nama saya Radhitya Fazri. Saya merupakan mahasiswa semester 3 Program Studi Informatika. Saya tertarik mempelajari teknologi, pemrograman, pengembangan aplikasi, Ui/ux dan Web Development.</p> 
 
            <details> 
                <summary>Informasi tambahan</summary> 
                <p>Saat ini, saya sedang berfokus untuk mempelajari mata kuliah yang ada di semester 3 dengan sebaik mungkin. Saya juga masih mengikuti alur pembelajaran dari awal agar dapat memahami materi dengan baik. Selain itu, saya ingin terus mengembangkan minat dan kemampuan saya di bidang teknologi serta mengetahui gambaran dan prospek pekerjaan setelah lulus dari kampus.</p> 
            </details> 
        </section> 
 
        <section id="pendidikan" class="card"> 
            <h2>Pendidikan</h2> 
            <ol> 
                <li>SD Negeri kondang jaya 3</li> 
                <li>SMP Negeri 2 majalaya</li>
                <li>SMK Negeri 1 karawang</li>
                <li>S1 Informatika Horizon University Indonesia</li> 
            </ol> 
        </section> 
 
        <section id="hobi" class="card"> 
            <h2>Hobi</h2> 
            <ul> 
                <li>Badminton</li> 
                <li>Coding</li> 
                <li>nonton film</li>
                <li>Bermain Bola</li>
                <li>Bermain Game Online</li> 
            </ul> 
        </section> 
 
        <section id="skill" class="card"> 
            <h2>Skill</h2> 
            <dl> 
                <dt>HTML</dt> 
                <dd>Membuat struktur dan semantic content.</dd> 
                <dt>Pyhton</dt> 
                <dd>Basic programming dan data processing.</dd> 
                <dt>Css</dt> 
                <dd>Membuat struktur desain color website.</dd> 
            </dl> 
        </section> 
    </main> 

    <table class="data-table">
 <caption>Daftar Mahasiswa</caption>
 <thead>
 <tr>
 <th scope="col">No</th>
 <th scope="col">NIM</th>
 <th scope="col">Nama</th>
 <th scope="col">Program Studi</th>
 <th scope="col">Email</th>
 </tr>
 </thead>
 <tbody>
 <tr>
 <td>1</td>
 <td>230001</td>
 <td>Andi</td>
 <td>Informatika</td>
 <td>andi@email.com</td>
 </tr>
 </tbody>
</table>

 
    <footer> 
        <p>Copyright &copy; 2026 - Dimas fajar isnaen</p> 
        <nav aria-label="Navigasi footer"> 
            <a href="#top">Kembali ke atas</a> 
        </nav> 
    </footer> 
 
</body> 
</html> 