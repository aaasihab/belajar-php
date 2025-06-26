<?php

// redirect -> berpindah halaman web setelah login
// misal setelah suskes login, kita akan redirect halaman webnya menuju halaman admin atau member
// atau misalkan redirect ke domain yang berbeda, misal login dengan google, setelah selesai akan melakukan redirect halaman web kita lagi

header('Location: /phpinfo.php');
exit();//pastikan tidak ada content yang dikirim