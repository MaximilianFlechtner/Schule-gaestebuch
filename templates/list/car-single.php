<?php if (isset($car) && $car instanceof CompanyCarModel): ?>
    <div class="col-lg-4 col-12 col-md-6 mt-4">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <?= $car->indicator ?>
                    </div>
                    <div class="col-6">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal<?= $car->id ?>"><i class="fas fa-trash"></i></button>
                        <button class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#editModal<?= $car->id ?>"><i class="fas fa-edit"></i></button>
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
