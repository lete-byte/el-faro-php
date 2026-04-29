<?php include 'header.php'; ?>
<section class="section">
    <div class="container">
        <h2 class="title">Formulario de Contacto</h2>
        <form action="index.php?action=enviar_contacto" method="POST">
            <div class="field">
                <label class="label">Nombre</label>
                <input class="input" type="text" name="nombre" required>
            </div>
            <div class="field">
                <label class="label">Mensaje</label>
                <div class="control">
                    <textarea class="textarea" name="mensaje" required></textarea>
                </div>
            </div>
            <button class="button is-link" type="submit">Enviar Mensaje</button>
        </form>
    </div>
</section>
<?php include 'footer.php'; ?>