<div class="container">

    <div class="row">
        <div class="col-6">
            <h1>Versicherungsvertrag</h1>
        </div>
        <div class="col-6 text-end">
            <a class="btn btn-primary" href="/insuranceContractCreate">Neu <i class="fas fa-plus"></i></a>
        </div>
    </div>

    <div class="row mt-2">

        <?php
        if (isset($insurances) && !empty($insurances)) {
            foreach ($insurances as $insurance) {
                include('templates/list/insuranceContract-single.php');
            }
        }
        ?>

    </div>
</div>