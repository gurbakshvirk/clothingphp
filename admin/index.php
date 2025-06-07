<?php 
// Include middleware to protect the page - only admin can access
include('../middleware/adminMiddleware.php'); 

// Include the admin header file (navigation bar, meta, styles)
include('includes/header.php');  

/**
 * Function to render a dashboard statistic card
 *
 * @param string $title - Title of the card (e.g., "Today's Money")
 * @param string $value - Value to show (e.g., "Rs.5,300")
 * @param string $icon - Material icon name (e.g., "sell")
 * @param string $change - Percentage or value change (e.g., "+55%")
 * @param string $changeText - Description of change (e.g., "than last week")
 * @param string $changeType - Type of change: 'success' (green) or 'danger' (red)
 */
function renderCard($title, $value, $icon, $change, $changeText, $changeType = 'success') {
    // Set icon color class based on change type
    $changeIcon = $changeType === 'success' ? 'text-success' : 'text-danger';

    // Output the HTML for a card
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
                <p class='mb-0 text-sm'>
                    <span class='{$changeIcon} font-weight-bolder'>{$change}</span> {$changeText}
                </p>
            </div>
        </div>
    </div>";
}
?>

<!-- Dashboard Content Container -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <!-- Row to hold the cards -->
            <div class="row mt-4">
                <?php 
                    // Render various summary cards with relevant data
                    renderCard("Today's Money", "Rs.5,300", "sell", "+55%", "than last week", 'success');
                    renderCard("Today's Users", "2300", "person", "+3%", "than last month", 'success');
                    renderCard("Ads Views", "3,462", "visibility", "-2%", "than yesterday", 'danger');
                    renderCard("Sales", "Rs.103,430", "shopping_cart", "+5%", "than yesterday", 'success');
                ?>
            </div>
        </div>
    </div>
</div>

<?php 
// Include the admin footer (closing HTML, scripts, etc.)
include('includes/footer.php'); 
?>
