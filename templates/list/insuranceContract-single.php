<?php if (isset($insurance) && !empty($insurance) && $insurance instanceof InsuranceContractModel): ?>

    <div class="col-lg-4 col-12 col-md-6 mt-4">
        <div class="card">
            <div class="card-header">
                <?= $insurance->Vertragsnummer ?>
            </div>
            <div class="card-body">
                <p>Abschlussdatum: <?= $insurance->Abschlussdatum ?></p>
                <p>Art: <?= $insurance->Art ?></p>
                <?php if ($insurance->Mitarbeiter_ID && !empty(Staff::getById($insurance->Mitarbeiter_ID))) : ?>
                    <p>
                        Mitarbeiter: <?= Staff::getById($insurance->Mitarbeiter_ID)->firstName . ' ' . Staff::getById($insurance->Mitarbeiter_ID)->name ?></p>
                <?php endif; ?>
                <p></p>
            </div>
        </div>
    </div>

<?php endif; ?>