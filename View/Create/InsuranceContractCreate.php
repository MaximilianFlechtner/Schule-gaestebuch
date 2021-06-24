<div class="row">
    <div class="col-12">
        <h1>Neuen Versicherungsvertrag erstellen</h1>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <form method="post">
            <div class="form-group mb-2">
                <label for="tech-vertragsnummer">Vertragsnummer</label>
                <input id="tech-vertragsnummer" name="tech-vertragsnummer" type="text" required="required"
                       class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="tech-abschlussdatum">Abschlussdatum</label>
                <input id="tech-abschlussdatum" name="tech-abschlussdatum" type="date" required="required"
                       class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="tech-art">Art</label>
                <div>
                    <select id="tech-art" name="tech-art" class="custom-select" required="required">
                        <option value=""></option>
                        <option value="VK">VK</option>
                        <option value="TK">TK</option>
                        <option value="HP">HP</option>
                    </select>
                </div>
            </div>
            <div class="form-group mb-2">
                <label for="tech-mitarbeiter">Mitarbeiter</label>
                <div>
                    <select id="tech-mitarbeiter" name="tech-mitarbeiter" class="custom-select" required="required">
                        <option value=""></option>
                        <?php
                        $mitarbeiter = Staff::getAll();

                        if ($mitarbeiter):
                            foreach ($mitarbeiter as $m):?>
                                <option value="<?= $m->id ?>"><?= $m->firstName . ' ' . $m->name ?></option>
                            <?php endforeach; endif; ?>
                    </select>
                </div>
            </div>
            <div class="form-group mb-2">
                <label for="tech-fahrzeug">Fahrzeug</label>
                <div>
                    <select id="tech-fahrzeug" name="tech-fahrzeug" class="custom-select" required="required">
                        <option value=""></option>
                        <?php
                        $fahrzeug = Car::getAll();

                        if ($fahrzeug):
                            foreach ($fahrzeug as $f):?>
                                <option value="<?= $f->id ?>"><?= $f->Kennzeichen ?></option>
                            <?php endforeach; endif; ?>
                    </select>
                </div>
            </div>
            <div class="form-group mb-2">
                <label for="tech-versicherungsnehmer">Versicherungsnehmer</label>
                <div>
                    <select id="tech-versicherungsnehmer" name="tech-versicherungsnehmer" class="custom-select"
                            required="required">
                        <option value=""></option>
                        <?php
                        $versicherungsnehmer = Insurance::getAll();

                        if ($versicherungsnehmer):
                            foreach ($versicherungsnehmer as $v):?>
                                <option value="<?= $v->id ?>"><?= $v->name ?></option>
                            <?php endforeach; endif; ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <button name="submit" type="submit" class="btn btn-primary">Bestätigen</button>
            </div>
        </form>
    </div>
</div>
