<?php if (isset($insurance) && !empty($insurance) && $insurance instanceof InsuranceCompanyModel): ?>

    <div class="col-lg-4 col-12 col-md-6 mt-4">
        <div class="card">
            <div class="card-header">
                <?= $insurance->name ?>
            </div>
            <div class="card-body">
                <p>Ort: <?= $insurance->location ?></p>
            </div>
        </div>
    </div>

<?php endif; ?>