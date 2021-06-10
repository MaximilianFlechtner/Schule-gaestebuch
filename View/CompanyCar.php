<div class="row">
    <div class="col-6">
        <h1>Dienstwagen</h1>
    </div>
</div>
<div class="row mt-2">
    <?php
    if (isset($carList)) {
        foreach ($carList as $car) {
            include('templates/list/car-single.php');
        }
    }
    ?>
</div>

