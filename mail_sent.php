<?php

    include_once('includes/functions.php');

    $user = getUser();

    if(is_null($user)) {
        header("Location: /");
    }

    //Include header
    include_once('includes/header.php');

?>

    <div class="container col-lg-4 col-lg-push-4 col-md-6 col-md-push-3 col-sm-8 col-sm-push-2">
        <h3>Mail sent</h3>
        <p>Check your mail account.</p>
        <p><a href="/mail">Test Again</a></p>
    </div>

<?php

    //Include footer
    include_once('includes/footer.php');
?>
