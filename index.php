<?php
include('config/db_connect.php');

//write sql queries
    $sql = 'SELECT title,ingredients,id FROM pizzas ORDER BY created_at';
    
//make query and get result
    $result = mysqli_query($conn,$sql);

//fetch the resulting rows as an array
    $pizza = mysqli_fetch_all($result,MYSQLI_ASSOC);

// free result from connection
    mysqli_free_result($result);

//close connection
    mysqli_close($conn);

    // explode(',',$pizza[0]['ingredients']);
    // print_r(,$pizza);
?>
<!DOCTYPE html>
<html lang="en">
    <?php include('template/header.php');?>

    <h1 class="text-center m-4">Pizzas!!!</h1>
    <div class="container mt-4">
        <div class="row">
            <?php foreach($pizza as $pizzas){ ?>
                <div class="col-sm-6 col-md-4">
                    <div class="card px-2 py-2">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT7HN9WJb08yGGFUtexE_N28O1tlwBHyWzHEQ&usqp=CAU" class="pizza" alt="logo" srcset="">
                        <div class="card-body">
                            <h6 class="mb-2 text-uppercase text-center"><?php echo htmlspecialchars($pizzas['title']); ?></h6>
                            <!-- <p><//?php echo htmlspecialchars($pizzas['ingredients']); ?></p> -->
                            <ul class="p-0 text-center">
                                <?php foreach(explode(',',$pizzas['ingredients']) as $ing){ ?>
                                <li class="list-unstyled"><?php echo htmlspecialchars($ing); ?></li>
                                <?php }?>
                            </ul>
                        </div>
                        <a href="details.php?id=<?php echo $pizzas['id']; ?>" class="card-link mr-5 pb-2 text-right">more info</a>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>
    <?php include('template/footer.php');?>

</html>