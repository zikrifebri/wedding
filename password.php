<?php
// $hash = '$2y$10$/4Ncd7xkFnlgu63XVmp45.B3ag1Vj0ySFPdQNjb.MAI1r08IBZNjW';
// $password = 'admin';
// if (password_verify($password, $hash))
// {
// 	echo "password benar";
// } else {
// 	echo "password salah";
// }

// echo '<br><br>';
echo 'Membuat password hash <br>';
$password ='smkn4plg';
$hash = password_hash($password, PASSWORD_DEFAULT);
echo $hash;