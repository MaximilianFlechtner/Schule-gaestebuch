<?php if (isset($insurance) && !empty($insurance) && $insurance instanceof InsuranceCompanyModel): ?>

    <div class="col-lg-4 col-12 col-md-6 mt-4">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <?= $insurance->name ?>
                    </div>
                    <div class="col-6 text-end">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal<?= $insurance->id ?>"><i class="fas fa-trash"></i></button>
                        <button class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#editModal<?= $insurance->id ?>"><i class="fas fa-edit"></i></button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <p>Ort: <?= $insurance->location ?></p>
            </div>
        </div>
    </div>

    <?php
    $id = $insurance->id;
    $name = $insurance->name;
    $post = 'insuranceCompanyDelete';
    include(__DIR__ . '/../modal/delete.php');
    ?>

<?php endif; ?>