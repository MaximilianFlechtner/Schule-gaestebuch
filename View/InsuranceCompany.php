<div class="container">

    <div class="row">
        <div class="col-6">
            <h1>Versicherungsgeselschaft</h1>
        </div>
        <div class="col-6 text-end">
            <a class="btn btn-primary" href="/insuranceCompanyCreate">Neu <i class="fas fa-plus"></i></a>
        </div>
    </div>

    <div class="row mt-2">

        <?php
        if (isset($insurances) && !empty($insurances)) {
            foreach ($insurances as $insurance) {
                include('templates/list/insuranceCompany-single.php');
            }
        }
        ?>

    </div>
</div>