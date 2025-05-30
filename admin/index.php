<?php 
include('../middleware/adminMiddleware.php'); 
include('includes/header.php');  

function renderCard($title, $value, $icon, $change, $changeText, $changeType = 'success') {
    $changeIcon = $changeType === 'success' ? 'text-success' : 'text-danger';
    echo "
    <div class='col-xl-3 col-md-6 mb-4'>
        <div class='card shadow-sm'>
            <div class='card-header p-3'>
                <div class='d-flex justify-content-between'>
                    <div>
                        <p class='text-sm mb-0 text-capitalize'>{$title}</p>
                        <h4 class='mb-0'>{$value}</h4>
                    </div>
                    
                     <div class='icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg'>
                        <i class='material-symbols-rounded'>{$icon}</i>
                    </div>
                </div>
            </div>
            <hr class='dark horizontal my-0'>
            <div class='card-footer p-2 ps-3'>
                <p class='mb-0 text-sm'><span class='{$changeIcon} font-weight-bolder'>{$change} </span>{$changeText}</p>
            </div>
        </div>
    </div>";
}
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="row mt-4">
                <?php 
                    renderCard("Today's Money", "Rs.5,300", "sell", "+55%", "than last week", 'success');
                    renderCard("Today's Users", "2300", "person", "+3%", "than last month", 'success');
                    renderCard("Ads Views", "3,462", "visibility", "-2%", "than yesterday", 'danger');
                    renderCard("Sales", "Rs.103,430", "shopping_cart", "+5%", "than yesterday", 'success');
                ?>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); 
