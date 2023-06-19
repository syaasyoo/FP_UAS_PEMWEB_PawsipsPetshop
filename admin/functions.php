<?php
//koneksi ke database ============================================================================
$conn = mysqli_connect("sql112.infinityfree.com","if0_34427293","DeNOIEZplq2Yya","if0_34427293_db_pet2");
//umum ===========================================================================================
function query ($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows [] = $row;
    }
    return $rows;
}

//pet =========================================================================================
function tambahpet ($data) {
    global $conn;
    $kategori = htmlspecialchars($data["kategori"]);
    $nama = htmlspecialchars(($data["nama"]));
    $umur = htmlspecialchars($data["umur"]);
    $vaksin = htmlspecialchars($data["vaksin"]);
    $deskripsi = htmlspecialchars(($data["deskripsi"]));
    $img = $_FILES['img']['name'];
    $tmp_name=$_FILES['img']['tmp_name'];
    $folder="..\..\img\pets" .$img;
    move_uploaded_file($tmp_name,$folder);
       
    
    $query = "INSERT INTO pet VALUES ('','$kategori','$nama', $umur, $vaksin,'$deskripsi','$img')";
    echo $query;
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}
function hapuspet ($id){
    global $conn;
    $query = "DELETE FROM pet WHERE id = $id";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}
function ubahpet($data){
    global $conn;
    $id = htmlspecialchars($data["id"]);
    $kategori = htmlspecialchars($data["kategori"]);
    $nama = htmlspecialchars(($data["nama"]));
    $umur = htmlspecialchars($data["umur"]);
    $vaksin = htmlspecialchars($data["vaksin"]);
    $deskripsi = htmlspecialchars(($data["deskripsi"]));


    $query = "UPDATE pet SET
                kategori_ID = '$kategori',
                nama = '$nama',
                umur = $umur,
                vaksin = $vaksin,
                deskripsi ='$deskripsi' WHERE id = $id";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}
function caripet($keyword) {
    $query = "SELECT p.id id, k.nama kategori, p.nama nama, umur, vaksin, deskripsi, img FROM pet p
                    JOIN kategori k ON (p.kategori_ID=k.id) 
                    WHERE p.id LIKE '%$keyword%' OR p.nama LIKE '%".($keyword)."%'";
    return query($query);
}
function tambahumur($data){
    global $conn;
    $id = htmlspecialchars($data["id"]);
    $umur = htmlspecialchars($data["umur"]);

    $query = "UPDATE pet SET
                umur = umur + $umur WHERE id = $id";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

//kategori =========================================================================================
function tambahkategori ($data) {
    global $conn;
    $nama = htmlspecialchars(($data["nama"]));
    
    $query = "INSERT INTO kategori VALUES ('','$nama')";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}
function hapuskategori ($id){
    global $conn;
    $query = "DELETE FROM kategori WHERE id = $id";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}
function ubahkategori($data){
    global $conn;
    $id = htmlspecialchars($data["id"]);
    $nama = htmlspecialchars(($data["nama"]));

    $query = "UPDATE kategori SET
                nama = '$nama' WHERE id = $id";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}
function carikategori($keyword) {
    $query = "SELECT * FROM kategori WHERE id LIKE '%$keyword%' OR nama LIKE '%".($keyword)."%'";
    return query($query);
}

//customer =========================================================================================
function tambahcustomer ($data) {
    global $conn;
    $nama = htmlspecialchars(($data["nama"]));
    $notelp = htmlspecialchars((($data["notelp"])));
    $alamat = htmlspecialchars(($data["alamat"]));
    
    $query = "INSERT INTO customer VALUES ('','$nama','$notelp','$alamat')";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}
function hapuscustomer ($id){
    global $conn;
    $query = "DELETE FROM customer WHERE id = $id";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}
function ubahcustomer($data){
    global $conn;
    $id = htmlspecialchars($data["id"]);
    $nama = htmlspecialchars(($data["nama"]));
    $notelp = htmlspecialchars((($data["notelp"])));
    $alamat = htmlspecialchars(($data["alamat"]));

    $query = "UPDATE customer SET
                nama = '$nama',
                notelp = '$notelp',
                alamat = '$alamat' WHERE id = $id";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}
function caricustomer($keyword) {
    $query = "SELECT * FROM customer WHERE id LIKE '%$keyword%' OR nama LIKE '%".($keyword)."%'";
    return query($query);
}



//reservasi =========================================================================================
function tambahreservasi ($data) {
    global $conn;
    $reservasi = htmlspecialchars($data["reservasi"]);
    $nama = htmlspecialchars(($data["nama"]));
    $notelp = htmlspecialchars($data["notelp"]);
    $waktu = htmlspecialchars($_POST['waktu']);
    $alamat = htmlspecialchars(($data["alamat"]));
    $pesan = htmlspecialchars(($data["pesan"]));
    $status = htmlspecialchars(($data["status"]));

       
    
    $query = "INSERT INTO reservasi VALUES ('','$reservasi','$nama', $notelp, '$waktu','$alamat','$pesan','$status')";
   
    echo $query;
    mysqli_query($conn,$query);

    $result = mysqli_query($conn,"SELECT notelp FROM reservasi WHERE notelp ='$notelp'");
    if (mysqli_fetch_assoc($result)) {
} else{
           $query2 = "INSERT INTO customer VALUES ('','$nama', $notelp,'$alamat')";
      mysqli_query($conn,$query2);
}

    return mysqli_affected_rows($conn);
}
function hapusreservasi ($id){
    global $conn;
    $query = "DELETE FROM reservasi WHERE id = $id";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}
function ubahreservasi($data){
    global $conn;
    $id = htmlspecialchars($data["id"]);
    $reservasi = htmlspecialchars($data["reservasi"]);
    $nama = htmlspecialchars(($data["nama"]));
    $notelp = htmlspecialchars($data["notelp"]);
    $waktu = htmlspecialchars($data["waktu"]);
    $alamat = htmlspecialchars(($data["alamat"]));
    $pesan = htmlspecialchars(($data["pesan"]));
    $status = htmlspecialchars(($data["status"]));


    $query = "UPDATE reservasi SET
                reservasi= '$reservasi',
                nama = '$nama',
                notelp = $notelp ,
                waktu = '$waktu',
                alamat = '$alamat',
                pesan ='$pesan',
                status ='$status' WHERE id = $id";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}
function carireservasi($keyword) {
    $query = "SELECT * FROM reservasi WHERE id LIKE '%$keyword%' OR nama LIKE '%".($keyword)."%'";
    return query($query);
}

//adopsi =========================================================================================
function tambahadopsi ($data) {
    global $conn;
    $pet = htmlspecialchars($data["pet"]);
    $nama = htmlspecialchars($data["nama"]);
    $notelp = htmlspecialchars($data["notelp"]);
    $waktu = htmlspecialchars($data["waktu"]);
    $pesan = htmlspecialchars($data["pesan"]);
    
    $query = "INSERT INTO adopsi VALUES ('','$pet','$nama','$notelp', '$waktu','$pesan')";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}
function hapusadopsi ($id){
    global $conn;
    $query = "DELETE FROM adopsi WHERE id = $id";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}
function ubahadopsi($data){
    global $conn;
    $id = htmlspecialchars($data["id"]);
    $pet = htmlspecialchars($data["pet"]);
    $nama = htmlspecialchars($data["nama"]);
    $notelp = htmlspecialchars($data["notelp"]);
    $waktu = htmlspecialchars($data["waktu"]);
    $pesan = htmlspecialchars($data["pesan"]);

    $query = "UPDATE adopsi SET
                pet = '$pet',
                nama = '$nama',
                notelp = $notelp,
                waktu = '$waktu',
                pesan ='$pesan' WHERE id = $id";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}
function cariadopsi($keyword) {
    $query = "SELECT p.id id, k.nama kategori, p.nama nama, jumlah, harga, deskripsi FROM adopsi p
                    JOIN kategori k ON (p.kategori_ID=k.id) 
                    WHERE p.id LIKE '%$keyword%' OR p.nama LIKE '%".encrypt($keyword)."%'";
    return query($query);
}
function tambahjumlah($data){
    global $conn;
    $id = htmlspecialchars($data["id"]);
    $jumlah = htmlspecialchars($data["jumlah"]);

    $query = "UPDATE adopsi SET
                jumlah = jumlah + $jumlah WHERE id = $id";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}
?>

