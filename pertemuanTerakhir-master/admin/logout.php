<?php 

session_start();

session_destroy();

echo "
    <script>
        alert('Terima kasih!');
        location.href='login.php';
    </script>
";