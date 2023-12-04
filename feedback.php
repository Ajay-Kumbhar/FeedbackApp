<?php include 'inc/header.php'?>

<?php
    $query = "SELECT * FROM feedback";
    $result = mysqli_query($conn, $query);
    $feedback = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<h3 class="pt-3 text-center">Past Feedback</h3>
    <?php if(empty($feedback)):?>
        <p class="text-center pt-3">There is no feedback</p>
    <?php endif;?>
<div class="col-lg-5 my-5 mx-auto px-md-0 px-3">
    <?php foreach($feedback as $item):?>
        <div class="card mb-4">
            <div class="card-body text-center">
                <?php echo $item['body']?>
                <div class="text-secondary mt-2">
                    <?php echo 'By '.$item['name'].' on '.$item['date']?>
                </div>
            </div>
        </div>
    <?php endforeach;?>
</div>

<?php include 'inc/footer.php'?>