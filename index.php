<?php

    include_once('includes/functions.php');

    $user = getUser();

    if(!is_null($user)) {
        header("Location: /mail");
    }

    //Include header
    include_once('includes/header.php');

?>

    <div class="container">
        <p><a href="<?php echo getLoginUrl(); ?>">Login</a> to your GMail account to test Google App Engine - PHP Mail API.</p>
    </div>

<?php

    //Include footer
    include_once('includes/footer.php');
?>
