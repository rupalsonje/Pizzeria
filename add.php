<?php
    // if(isset($_GET['submit'])){
    //     echo $_GET['email'];
    //     echo $_GET['title'];
    //     echo $_GET['ingredient'];
    // }

    include("config/db_connect.php");

    $email="";
    $title="";
    $ingredient="";
    $error = array('email'=> '','title'=>'','ingredient'=>'');


if(isset($_POST['submit'])){
    //     echo htmlspecialchars($_POST['email']);
    //     echo htmlspecialchars($_POST['title']);
    //     echo htmlspecialchars($_POST['ingredient']);
    if(empty($_POST['email'])){
        $error['email'] = 'Email is required';
    }
    else{
        // echo htmlspecialchars($_POST['email']);
        $email=$_POST['email'];
        if(!preg_match('/^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/',$email )){
            // echo 'email must be a valid email address';
            $error['email'] = 'email must be a valid email address';
        }
    }
    if(empty($_POST['title'])){
        $error['title'] = 'Title is required';
    }
    else{
        // echo htmlspecialchars($_POST['title']);
        $title = $_POST['title'];
        if(!preg_match('/^[a-zA-Z\s]+$/' , $title)){
            $error['title'] = 'title must be letter and spaces only';
        }
    }
    if(empty($_POST['ingredient'])){
        $error['ingredient'] = 'Ingredient is required';
    }
    else{
        // echo htmlspecialchars($_POST['ingredient']);
        $ingredient = $_POST['ingredient'];
        if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/' , $ingredient)){
            $error['ingredient'] = 'ingredient must be comma seperated list';
        }
    }

    if(array_filter($error)){
        // echo 'errors in form';
    }
    else{
        // echo 'no errors';
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $ingredient = mysqli_real_escape_string($conn,$_POST['ingredient']);
        $title = mysqli_real_escape_string($conn,$_POST['title']);
    
        $sql = "INSERT INTO pizzas(title,email,ingredients) VALUES ('$title','$email','$ingredient')";
    
        if(mysqli_query($conn,$sql)){
            //  success
        header('Location:index.php');
        }
        else{
            echo "query error"; 
        }
    }
    
}//end of form
    
?>
<!DOCTYPE html>
<html lang="en">
    <?php include('template/header.php');?>
    <section class="container text-dark py-4 my-5" id="form">
        <h4 class="text-center my-2" style="font-size:1cm">Add a Pizza</h4>
        <form class="form-group row py-4 mx-5 my-1 font-weight-bold" action="add.php" method="POST">
            <label for="" class="col-sm-3 m-2 col-form-label">Your Email:</label>
            <div class="col-sm-8 m-2">
                <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($email);?>" id="inputEmail">
                <div class="text-danger font-weight-normal">
                    <?php echo $error['email'];?>
                </div>            
            </div>
            <label for="" class="col-sm-3 m-2">Pizza Title:</label>
            <div class="col-sm-8 m-2">
                <input type="text" class="form-control" name="title" value="<?php echo htmlspecialchars($title);?>" id="title">
                <div class="text-danger font-weight-normal">
                    <?php echo $error['title'];?>
                </div>
            </div>
            <label for="" class="col-sm-3 m-2">Ingredients:</label>
            <div class="col-sm-8 m-2">
                <input type="text" class="form-control" name="ingredient" value="<?php echo htmlspecialchars($ingredient);?>" id="ingredient">
                <div class="text-danger font-weight-normal">
                    <?php echo $error['ingredient'];?>
                </div>
            </div>
            <div class="" style="padding: 1rem 1.4rem">
                <input class="btn btn-primary" style="padding:7px 35px" type="submit" value="submit" name="submit">
            </div>
        </form>
    </section>

    <?php include('template/footer.php');?>

</html>