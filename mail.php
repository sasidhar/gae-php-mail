<?php

    include_once('includes/functions.php');

    $user = getUser();

    if(is_null($user)) {
        header("Location: /");
    }

    //Include header
    include_once('includes/header.php');

?>

    <div class="container">
        Mail Form Here
    </div>

<?php

    //Include footer
    include_once('includes/footer.php');
?>
