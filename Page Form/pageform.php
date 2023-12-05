<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
$nimErr = $namaErr = $emailErr = $alamatErr = "";
$nim = $nama = $email = $alamat = "";
$nim_Default = $name_Default = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["nim"])) {
    $nimErr = "NIM Wajib Diisi";
    $nim_Default = 22090158;
  } else {
    $nim = test_input($_POST["nim"]);
    $nim_Default = 22090158;
  }
  if (empty($_POST["nama"])) {
    $namaErr = "Nama Wajib Diisi";
    $name_Default = "Chiesa Novritza Ramandha";
  } else {
    $nama = test_input($_POST["nama"]);
    $name_Default = "Chiesa Novritza Ramandha";
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email Wajib Diisi";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Format Email Tidak Sesuai";
    }
  }
    
  if (empty($_POST["alamat"])) {
    $alamat = "";
  } else {
    $alamat = test_input($_POST["alamat"]);
    if (!preg_match("/^[a-zA-Z0-9 ]*$/", $alamat)) {
      $alamatErr = "Hanya Boleh Memasukkan Huruf, Angka, dan Spasi";
    }    
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Form Handling dan Form Validation</h2>
<p><span class="error">* Kolom yang harus diisi</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
NIM: <input type="text" name="nim" value="<?php echo $nim_Default; ?>">
  <span class="error">* <?php echo $nimErr;?></span>
  <br><br>
Nama: <input type="text" name="nama" value="<?php echo $name_Default; ?>">
  <span class="error">* <?php echo $namaErr;?></span>
  <br><br>
Email: <input type="text" name="email" value="<?php echo $email; ?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
Alamat: <textarea name="alamat" rows="5" cols="40"><?php echo $alamat; ?></textarea>
  <span class="error">* <?php echo $alamatErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo "NIM: " . $nim_Default;
echo "<br>";
echo "Nama: " . $name_Default;
echo "<br>";
echo "Email: " . $email;
echo "<br>";
echo "Alamat: " . $alamat;
echo "<br>";
?>

</body>
</html>
