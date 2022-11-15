<?php
// include database connection file
include_once("../config.php");

//cek  
if (isset($_POST['submit'])) {
    // ambil data dari formulir
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $about = $_POST['about'];
    $email = $_POST['email'];
    $link_in = $_POST['link_in'];
    $link_git = $_POST['link_git'];
    $link_twit = $_POST['link_twit'];
    $link_fb = $_POST['link_fb'];
    $award = $_POST['award'];
    $interest = $_POST['interest'];
    $skill = $_POST['skill'];
    $link_foto = $_POST['link_foto'];

    // query
    $sql = "UPDATE about, interests, awards, skills, users SET
    users.nama  = '$fname $lname',
    about.fname = '$fname',
    about.lname = '$lname',
    about.alamat = '$alamat',
    users.kelas = '$kelas',
    about.about = '$about',
    users.email = '$email',
    about.email = '$email',
    about.link_in = '$link_in',
    about.link_git = '$link_git',
    about.link_twit = '$link_twit',
    about.link_fb = '$link_fb',
    awards.award = '$award',
    interests.interest = '$interest',
    skills.skill = '$skill',
    about.link_foto = '$link_foto'
    WHERE about.nim = 3337210020 AND interests.nim = about.nim  AND awards.nim = about.nim AND skills.nim = about.nim AND users.nim = about.nim
";
    $query = mysqli_query($conn, $sql);
    // mengecek apakah query berhasil diubah

}


$sql = "SELECT * FROM users WHERE nim=3337210020";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);

$nim = $row["nim"];
$kelas = $row["kelas"];

// update user data about
$sql = "SELECT * FROM about WHERE nim=3337210020";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);

$fname = $row["fname"];
$lname = $row["lname"];
$alamat = $row["alamat"];
$about = $row["about"];
$email = $row["email"];
$link_in = $row["link_in"];
$link_git = $row["link_git"];
$link_twit = $row["link_twit"];
$link_fb = $row["link_fb"];
$link_foto = $row["link_foto"];

//awards
$sql = "SELECT * FROM awards WHERE nim=3337210020";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);

$award = $row['award'];

//interest
$sql = "SELECT * FROM interests WHERE nim=3337210020";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);

$interest = $row["interest"];

//skills
$sql = "SELECT * FROM skills WHERE nim=3337210020";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);

$skill = $row["skill"];

?>
<html>

<head>
    <title>Edit User Data</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- SweetAlert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<style>
    body{
        background-image: url(https://placekitten.com/g/1280/720);
         background-size: cover;
         background-position: center;
         text-align: center;
         height: 100%;
         width: 100%;
         display: table;
         vertical-align: middle;    }
    h1{
        color :#ffffff
    }
    table{
        #MainTable {
    width: 100%;
    background-color: #D8F0DA;
    border: 1px;
    min-width: 100%;
    position: relative;
    opacity: 0.97;
    background: transparent;
}
        box-shadow: 15px 24px 18px 3px rgba(0,0,0,0.55);
    -webkit-box-shadow: 15px 24px 18px 3px rgba(0,0,0,0.55);
    -moz-box-shadow: 15px 24px 18px 3px rgba(0,0,0,0.55);

    }
    td{color :#ffffff
        width:"800px"}



</style>
<div>
<body>
    <br />
    <br />
    <center>
        <a class="btn btn-primary" href="../index.php">BERANDA </a>
    <center>
    <br /><br />
    <center><h1>Halaman Sunting </h1></center>

    <form method="post" action='edit3337210020.php' enctype="multipart/form-data">
        <table style="margin-left:auto;margin-right:auto" border="5" width="900px">
        <thead>
            <tr>
                <th style="text-align: justify">ABOUT</th>
                
            </tr>
        </thead>
            <tr>
                <td>NIM</td>
                <td><input type="text" name="nim" value=<?= $nim ?> disabled></td>
            </tr>
            <tr>
                <td>first name</td>
                <td><input type="text" class="form-control" id="fname" name="fname" value="<?= $fname ?>" required></td>
            </tr>
            <tr>
                <td>last name</td>
                <td><input type="text" class="form-control" id="lname" name="lname" value="<?= $lname ?>" required></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td><input type="text" class="form-control" id="kelas" name="kelas" value="<?= $kelas ?>" required></td>
            </tr>
            <tr>
                <td>alamat</td>
                <td><input type="text" class="form-control" id="alamat" name="alamat" value="<?= $alamat ?>" required></td>
            </tr>
            <tr>
                <br />
                <td>about</td>
                <td><textarea type="textarea" class="form-control" id="about" name="about" required><?= $about ?></textarea></td>
            </tr>
            <tr>
                <td>email</td>
                <td><input type="text" class="form-control" id="email" name="email" value="<?= $email ?>" required></td>
            </tr>
            <br />
            <tr>
                <td>link_in</td>
                <td><input type="text" class="form-control" id="link_in" name="link_in" value="<?= $link_in ?>" required></td>
            </tr>
            <tr>
                <td>link_git</td>
                <td><input type="text" class="form-control" id="link_git" name="link_git" value="<?= $link_git ?>" required></td>
            </tr>
            <tr>
                <td>link_twit</td>
                <td><input type="text" class="form-control" id="link_twit" name="link_twit" value="<?= $link_twit ?>" required></td>
            </tr>
            <tr>
                <td>link_fb</td>
                <td><input type="text" class="form-control" id="link_fb" name="link_fb" value="<?= $link_fb ?>" required></td>
            </tr>
            <tr>
                <td>link_foto</td>
                <td> <input type="text" class="form-control" id="link_foto" name="link_foto" value="<?= $link_foto ?>" required>
                </td>
            </tr>
            <!-- Awards -->
            <tr>
                <thead>
                    <tr>
                        <th align="center">award</th>
                    </tr>
                    </thead>
                    <td>1.</td>
                <td><input type="text" class="form-control" id="award" name="award" value="<?= $award ?>" required></td>
            </tr>
            <!-- Interest -->
            <tr>
            <thead>
                    <tr>
                        <th align="center">interest</th>
                    </tr>
                    </thead>
                    <td>1.</td>
                <td><input type="text" class="form-control" id="interest" name="interest" value="<?= $interest ?>" required></td>
            </tr>

            <!-- Skills -->
            <tr>
            <thead>
                    <tr>
                        <th align="center">SKILL</th>
                    </tr>
            </thead>
                <td>1.</td>
                <td><input type="text" class="form-control" id="skill" name="skill" value="<?= $skill ?>" required></td>
            </tr>
            </table>
            <br />
                    <button type="submit" name="submit" class="btn btn-success"><i class="fas fa-edit"></i> SUNTING</button>

    </form>
</body>
</html>


</body>

</html>