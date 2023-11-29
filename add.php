<?php
include('config/db_connect.php');
$title = $email = $ingredients = '';
$errors = array('email' => '', 'title' => '', 'ingredients' => '');

if (isset($_POST['submit'])) {
    //check email
    if (empty($_POST['email'])) {
        $errors['email'] = "An email is required </br>";
    } else {
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email must be a valid email address';
        }
    }

    //check title
    if (empty($_POST['title'])) {
        $errors['title'] = "A title is required </br>";
    } else {
        $title = $_POST['title'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
            $errors['title'] = "Title must be letters and spaces only";
        }
    }

    //check ingredient
    if (empty($_POST['ingredients'])) {
        $errors['ingredients'] = "Atleast one ingredient is required </br>";
    } else {
        $ingredients = $_POST['ingredients'];

        if (!preg_match('/^([a-zA-Z]+)(,\s*[a-zA-Z]*)*$/', $ingredients)) {
            $errors['ingredients'] = 'Ingredients must be a comma separated list';
        }
    }
    if (array_filter($errors)) {
        // echo 'There are errors in the form';
    } else {
        // echo 'form is valid';
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

        // create sql statement to insert data
        $sql = "INSERT INTO pizzas(title,email,ingredients) VALUES('$title','$email','$ingredients')";

        //save to db and check
        if (mysqli_query($conn, $sql)) {
            //success
        } else {
            //error
            echo 'query error: ' . mysqli_error($conn);
        }


        header('Location: index.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php') ?>

<section class="container grey-text">
    <h4 class="center"> Add a Pizza</h4>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="white">
        <label for="">Your Email:</label>
        <input type="text" name="email" value="<?php echo $email; ?>">
        <div class="red-text"><?php echo $errors['email']; ?></div>

        <label for="">Pizza Title:</label>
        <input type="text" name="title" value="<?php echo $title; ?>">
        <div class="red-text"><?php echo $errors['title']; ?></div>

        <label for="">Ingredients (comma separated):</label>
        <input type="text" name="ingredients" value="<?php echo $ingredients; ?>">
        <div class="red-text"><?php echo $errors['ingredients']; ?></div>

        <div class="center">
            <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
        </div>
    </form>
</section>


<?php include('templates/footer.php') ?>

</html>