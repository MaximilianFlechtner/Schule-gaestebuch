<?php if (isset($car) && $car instanceof CompanyCarModel): ?>
    <div class="col-lg-4 col-12 col-md-6 mt-4">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12">
                        <?= $car->indicator ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <p>Farbe: <?= $car->color ?></p>
                <p>Typ: <?= CarType::getById($car->typeId)->name ?></p>
                <p>Hersteller: <?= CarManufacturer::getById(CarType::getById($car->typeId)->manufacturerID)->name ?></p>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if (isset($car) && $car instanceof CarModel): ?>
    <div class="col-lg-4 col-12 col-md-6 mt-4">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12">
                        <?= $car->Kennzeichen ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <p>Farbe: <?= $car->Farbe ?></p>
                <p>Typ: <?= CarType::getById($car->Fahrzeugtyp_ID)->name ?></p>
                <p>
                    Hersteller: <?= CarManufacturer::getById(CarType::getById($car->Fahrzeugtyp_ID)->manufacturerID)->name ?></p>
            </div>
        </div>
    </div>
<?php endif; ?>

