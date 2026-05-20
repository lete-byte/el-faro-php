<?php include 'header.php'; ?>
<section class="section">
    <div class="container">
        <h2 class="title">Registro de Cuenta</h2>

        <?php if (isset($mensajeExito)): ?>
            <div class="notification is-success">
                <button class="delete" onclick="this.parentElement.style.display='none'"></button>
                <strong>¡Suscripción Completa!:</strong> <?php echo $mensajeExito; ?>
            </div>
        <?php endif; ?>

        <?php if (isset($errorMsg)): ?>
            <div class="notification is-danger">
                <button class="delete" onclick="this.parentElement.style.display='none'"></button>
                <strong>Aviso:</strong> <?php echo $errorMsg; ?>
            </div>
        <?php endif; ?>

        <form action="index.php?action=registrar" method="POST">
            <div class="field">
                <label class="label">Nombre</label>
                <div class="control">
                    <input class="input" 
                           type="text" 
                           name="nombre" 
                           pattern="[a-zA-Z0-9]{4,20}" 
                           title="Solo letras y números (De 4 a 20 caracteres)"
                           value="<?php echo htmlspecialchars($_POST['nombre'] ?? ''); ?>" 
                           required>
                </div>
            </div>
            <div class="field">
                <label class="label">Email</label>
                <div class="control">
                    <input class="input" 
                           type="email" 
                           name="email" 
                           value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" 
                           required>
                </div>
            </div>
            <div class="field">
                <label class="label">Plan de Suscripción</label>
                <div class="control">
                    <div class="select">
                        <select name="plan">
                            <option value="Gratis" <?php echo (isset($_POST['plan']) && $_POST['plan'] == 'Gratis') ? 'selected' : ''; ?>>Gratis</option>
                            <option value="Premium" <?php echo (isset($_POST['plan']) && $_POST['plan'] == 'Premium') ? 'selected' : ''; ?>>Premium (Acceso total)</option>
                        </select>
                    </div>
                </div>
            </div>
            <button class="button is-success" type="submit">Crear Cuenta</button>
        </form>
    </div>
</section>
<?php include 'footer.php'; ?>