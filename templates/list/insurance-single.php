<?php if (isset($insurance) && !empty($insurance) && $insurance instanceof InsuranceModel): ?>

    <div class="col-lg-4 col-12 col-md-6 mt-4">
        <div class="card">
            <div class="card-header">
                <?= $insurance->name ?> <?= $insurance->firstName ?>
            </div>
            <div class="card-body">
                <p>Geburtsdatum: <?= $insurance->birth ?></p>
                <p>Fürerschein: <?= $insurance->license ?></p>
                <p>Ort: <?= $insurance->location ?></p>
                <p>PLZ: <?= $insurance->plz ?></p>
                <p>Straße: <?= $insurance->street ?> <?= $insurance->streetNumber ?></p>
                <?php if ($insurance->insuranceCompanyID && !empty(InsuranceCompany::getById($insurance->insuranceCompanyID))): ?>
                    <p>
                        Versicherungsgeselschaft: <?= InsuranceCompany::getById($insurance->insuranceCompanyID)->name ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php endif; ?>