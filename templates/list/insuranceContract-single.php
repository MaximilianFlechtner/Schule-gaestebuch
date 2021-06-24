<?php if (isset($insurance) && !empty($insurance) && $insurance instanceof InsuranceContractModel): ?>

    <div class="col-lg-4 col-12 col-md-6 mt-4">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6"><?= $insurance->Vertragsnummer ?></div>
                    <div class="col-6 text-end">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal<?= $insurance->id ?>"><i class="fas fa-trash"></i></button>
                        <button class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#editModal<?= $insurance->id ?>"><i class="fas fa-edit"></i></button>
                    </div>
                </div>
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

    <?php
    $id = $insurance->id;
    $name = $insurance->Vertragsnummer;
    $post = 'insuranceContractDelete';
    include(__DIR__ . '/../modal/delete.php');
    ?>

<?php endif; ?>