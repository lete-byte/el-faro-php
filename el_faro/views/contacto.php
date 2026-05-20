<?php include 'header.php'; ?>
<section class="section">
    <div class="container">
        <h2 class="title">Formulario de Contacto</h2>

        <?php if (isset($mensajeExito)): ?>
            <div class="notification is-link">
                <button class="delete" onclick="this.parentElement.style.display='none'"></button>
                <strong>Formulario Recibido:</strong> <?php echo $mensajeExito; ?>
            </div>
        <?php endif; ?>

        <?php if (isset($errorMsg)): ?>
            <div class="notification is-danger">
                <button class="delete" onclick="this.parentElement.style.display='none'"></button>
                <strong>Error:</strong> <?php echo $errorMsg; ?>
            </div>
        <?php endif; ?>

        <form action="index.php?action=enviar_contacto" method="POST">
            <div class="field">
                <label class="label">Nombre</label>
                <div class="control">
                    <input class="input <?php echo (isset($code) && $code == 'contacto_error' && empty($_POST['nombre'])) ? 'is-danger' : ''; ?>" 
                           type="text" 
                           name="nombre" 
                           value="<?php echo htmlspecialchars($_POST['nombre'] ?? ''); ?>" 
                           required>
                </div>
            </div>
            <div class="field">
                <label class="label">Mensaje (Máximo 140 caracteres)</label>
                <div class="control">
                    <textarea class="textarea <?php echo (isset($code) && $code == 'contacto_error' && strlen($_POST['mensaje'] ?? '') < 10) ? 'is-danger' : ''; ?>" 
                              name="mensaje" 
                              maxlength="140" 
                              required><?php echo htmlspecialchars($_POST['mensaje'] ?? ''); ?></textarea>
                </div>
            </div>
            <button class="button is-link" type="submit">Enviar Mensaje</button>
        </form>
    </div>
</section>
<?php include 'footer.php'; ?>