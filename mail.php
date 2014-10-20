<?php
use \google\appengine\api\mail\Message;

    include_once('includes/functions.php');

    $user = getUser();

    if(is_null($user)) {
        header("Location: /");
    }

    //If form is submitted
    if(isset($_POST['submit'])) {

        $subject = trim($_POST['subject']);
        $subject = strlen($subject) > 75 ? substr($subject, 0, 75) : $subject;
        $_POST['subject'] = $subject;

        $mailBody = trim($_POST['message']);
        $mailBody = strlen($mailBody) > 1000 ? substr($mailBody, 0, 1000) : $mailBody;
        $_POST['message'] = $mailBody;

        if($mailBody == "") {
            $error = "Message cannot be empty.";
        } else {

            $email = $user->getEmail();
            $subject = $subject == "" ? "No Subject" : $subject;

            try {

                $message = new Message();
                $message->setSender("sasidhar@sasidhar.com");
                $message->addTo($email);
                $message->setSubject($subject);
                $message->setTextBody($mailBody);
                $message->send();

                header("Location: /mail_sent");

            } catch (InvalidArgumentException $e) {

                $error = "Unable to send mail. $e";
            }
        }
    }

    //Include header
    include_once('includes/header.php');

?>

    <div class="container col-lg-4 col-lg-push-4 col-md-6 col-md-push-3 col-sm-8 col-sm-push-2">
        <h3>Send Mail</h3>

        <?php if(isset($error)) { ?>
            <div class="alert alert-danger">
                <?php echo $error; ?>
            </div>
        <?php } ?>

        <form role="form" method="post">
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" readonly disabled value="<?php echo $user->getEmail(); ?>" >
            </div>
            <div class="form-group">
                <label for="subject">Subject <small>(max : 75 chars, optional)</small></label>
                <input type="text" maxlength="75" class="form-control" id="subject" placeholder="Subject" name="subject" value="<?php echo isset($_POST['subject']) ? $_POST['subject'] : ""; ?>" >
            </div>
            <div class="form-group">
                <label for="message">Message <small>(max : 1000 chars)</small></label>
                <textarea maxlength="1000" class="form-control" rows="5" id="message" name="message"><?php echo isset($_POST['message']) ? $_POST['message'] : ""; ?></textarea>
            </div>
            <input type="submit" name="submit" class="btn btn-default" value="Submit" />
        </form>
    </div>

<?php

    //Include footer
    include_once('includes/footer.php');
?>
