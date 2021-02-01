<?php
    include('config/db_connect.php');

    if(isset($_POST['delete'])){
        $id_delete = mysqli_real_escape_string($conn,$_POST['id_to_delete']);

        $sql="DELETE FROM pizzas WHERE id = $id_delete";

        if(mysqli_query($conn, $sql)){
            // success
            header('Location: index.php');
        }
        else{
            echo "query error : " . mysqli_error($conn);
        }
    
    }

    // check get req para
    if(isset($_GET['id'])){
        $id = mysqli_real_escape_string($conn,$_GET['id']);
        // echo "$id";
        // make sql
        $sql = "SELECT * FROM pizzas WHERE id = $id";

        // get query result
        $result = mysqli_query($conn, $sql);

        // fetch result in array format
        $pizzas = mysqli_fetch_assoc($result);

        // free result from connection
        mysqli_free_result($result);

        //close connection
        mysqli_close($conn);

        // print_r($pizzas);
    }

?>

<!DOCTYPE html>
<html lang="en">
    <?php include('template/header.php');?>
    
    <div class="container my-5 p-5 border rounded bg-white text-center">
        <?php if($pizzas){ ?>
        <h2 class="text-uppercase"><?php echo htmlspecialchars($pizzas['title']); ?></h2>
        <p>Created By :<?php echo " ".htmlspecialchars($pizzas['email']); ?></p>
        <p><?php echo date($pizzas['created_at']); ?></p>
        <h5>Ingredients : </h5>
        <p><?php echo htmlspecialchars($pizzas['ingredients']); ?></p>
        <form action="details.php" class="" method="POST">
            <input type="hidden" name="id_to_delete" value="<?php echo $pizzas['id'] ?>" >
            <input type="submit" value="Delete" name="delete" class="btn text-white btn-warning">
        </form>
        <?php } else{ ?>
            <div>
                <h2>No Such Pizza Exists!!!</h2>
            </div>
        <?php }?>
    </div>

    <?php include('template/footer.php');?>

</html>