<?php
// echo 'masuk flash';
    if (isset($_SESSION['success'])) {

        ?>
        <div class="alert alert-success" role="alert">
            <strong>Success:</strong>
            <?php
                echo($_SESSION['success']);
            ?>
        </div>
        <?php
        unset($_SESSION['success']);
    }
    if (isset($_SESSION['error'])) {
        ?>
        <div class="alert alert-danger" role="alert">
            <strong>Errors:</strong>
            <ul>
                <?php
                $errors = $_SESSION['error'];
                foreach ($errors as $error){
                    echo '<li>' . $error . '</li>';
                }
                ?>
            </ul>
        </div>
        <?php
        unset($_SESSION['error']);
    }
?>