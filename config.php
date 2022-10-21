<?php session_start(); ?>
<?php
define("DATABASE", "bhywxnyz_cloudgiare");//tên database
define("USERNAME", "bhywxnyz_cloudgiare");//tên tài khoản quản lí database
define("PASSWORD", "bhywxnyz_cloudgiare");//mật khẩu tài khoản

define("LOCALHOST", "localhost");//không sửa dòng này
$ketnoi = mysqli_connect(LOCALHOST,USERNAME,PASSWORD,DATABASE);
$ketnoi->query("set names 'utf8'");
date_default_timezone_set('Asia/Ho_Chi_Minh');

// var

$_SESSION['session_request'] = time();
$user = $ketnoi->query("SELECT * FROM users")->fetch_array();

// mod

//Khai báo giá trị ban đầu, nếu không có thì khi chưa submit câu lệnh insert sẽ báo lỗi
$username = "";
$password = "";
$email = "";
$level = "1";
$code = "HACK";
//Lấy giá trị POST từ form vừa submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["username"])) { $username = $_POST['username']; }
    if(isset($_POST["password"])) { $password = $_POST['password']; }
    if(isset($_POST["email"])) { $email = $_POST['email']; }

    //Code xử lý, insert dữ liệu vào table
    $sql = "INSERT INTO ctv (username, password, email, level, code)
    VALUES ('$username', '$password', '$email', '$level', '$code')";

    if ($ketnoi->query($sql) === TRUE) {
        echo "Thêm dữ liệu thành công";
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }
}
// end


function xoadau($strTitle) {
$strTitle=strtolower($strTitle);
$strTitle=trim($strTitle);
$strTitle=str_replace(' ','-',$strTitle);
$strTitle=preg_replace("/(ò|ó|ọ|ỏ|õ|ơ|ờ|ớ|ợ|ở|ỡ|ô|ồ|ố|ộ|ổ|ỗ)/",'o',$strTitle);
$strTitle=preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|Ô|Ố|Ổ|Ộ|Ồ|Ỗ)/",'o',$strTitle);
$strTitle=preg_replace("/(à|á|ạ|ả|ã|ă|ằ|ắ|ặ|ẳ|ẵ|â|ầ|ấ|ậ|ẩ|ẫ)/",'a',$strTitle);
$strTitle=preg_replace("/(À|Á|Ạ|Ả|Ã|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|Â|Ấ|Ầ|Ậ|Ẩ|Ẫ)/",'a',$strTitle);
$strTitle=preg_replace("/(ề|ế|ệ|ể|ê|ễ|é|è|ẻ|ẽ|ẹ)/",'e',$strTitle);
$strTitle=preg_replace("/(Ể|Ế|Ệ|Ể|Ê|Ễ|É|È|Ẻ|Ẽ|Ẹ)/",'e',$strTitle);
$strTitle=preg_replace("/(ừ|ứ|ự|ử|ư|ữ|ù|ú|ụ|ủ|ũ)/",'u',$strTitle);
$strTitle=preg_replace("/(Ừ|Ứ|Ự|Ử|Ư|Ữ|Ù|Ú|Ụ|Ủ|Ũ)/",'u',$strTitle);
$strTitle=preg_replace("/(ì|í|ị|ỉ|ĩ)/",'i',$strTitle);
$strTitle=preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/",'i',$strTitle);
$strTitle=preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/",'y',$strTitle);
$strTitle=preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/",'y',$strTitle);
$strTitle=str_replace('đ','d',$strTitle);
$strTitle=str_replace('Đ','d',$strTitle);
$strTitle=preg_replace("/[^-a-zA-Z0-9]/",'',$strTitle);
return $strTitle;
}
?>