<div class="container">

    <div class="row">
        <div class="col-12">
            <h1>Versicherungsnehmer</h1>
        </div>
    </div>

    <div class="row mt-2">

        <?php
        if (isset($insurances) && !empty($insurances)) {
            foreach ($insurances as $insurance) {
                include('templates/list/insurance-single.php');
            }
        }
        ?>

    </div>
</div>