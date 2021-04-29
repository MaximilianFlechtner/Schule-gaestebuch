<div class="row">
    <div class="col-12 mb-4 mt-2">
        <h1>Gästebuch</h1>
    </div>
    <?php if (isset($message) && !empty($message)): ?>
        <div class="col-12">
            <?= $message ?>
        </div>
    <?php endif; ?>
    <div class="col-12">
        <form action="indexCreate" method="post">
            <div class="form-group">
                <label for="tech-mail">Email address</label>
                <input type="email" class="form-control" id="tech-mail" name="tech-mail" required>
            </div>
            <div class="form-group">
                <label for="tech-name">Name</label>
                <input name="tech-name" type="text" class="form-control" id="tech-name" required>
            </div>
            <div class="form-group">
                <label for="tech-web">Webseite</label>
                <input name="tech-web" type="url" class="form-control" id="tech-web">
            </div>
            <div class="form-group">
                <label for="tech-comment">Kommentar</label>
                <textarea class="form-control" id="tech-comment" name="tech-comment" rows="3"></textarea>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="tech-gender" id="tech-male" value="male">
                <label class="form-check-label" for="tech-male">
                    Weiblich
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="tech-gender" id="tech-female" value="female">
                <label class="form-check-label" for="tech-female">
                    Mänlich
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="tech-gender" id="tech-other" value="other">
                <label class="form-check-label" for="tech-other">
                    Anderes
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Speichern</button>
        </form>

    </div>
</div>

<div class="row mt-5">
    <?php if (isset($guests) && !empty($guests)): ?>
        <?php foreach ($guests as $guest): ?>
            <div class="col-4 mt-4">
                <div class="card">
                    <div class="card-header">
                        <?= strip_tags($guest->name) ?>
                    </div>
                    <div class="card-body">
                        <?= strip_tags($guest->text) ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
