<?php if (isset($damage) && $damage instanceof DamageCaseModel): ?>
    <div class="col-lg-4 col-12 col-md-6 mt-4">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12">
                        <?= $damage->Beschreibung ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <p>Datum: <?= $damage->Datum ?></p>
                <p>Ort: <?= $damage->Ort ?></p>
                <p>Schadenshöhe: <?= $damage->Schadenshoehe ?></p>
                <p>Verletzte: <?= $damage->Verletzte ?></p>
                <?php if ($damage->Mitarbeiter_ID && Staff::getById($damage->Mitarbeiter_ID)): ?>
                    <p><?= Staff::getById($damage->Mitarbeiter_ID)->firstName . ' ' . Staff::getById($damage->Mitarbeiter_ID)->name ?></p>
                <?php endif; ?>
                <p></p>
            </div>
        </div>
    </div>
<?php endif; ?>