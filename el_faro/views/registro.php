<?php include 'header.php'; ?>
<section class="section">
    <div class="container">
        <h2 class="title">Registro de Cuenta</h2>
        <form action="index.php?action=registrar" method="POST">
            <div class="field">
                <label class="label">Nombre</label>
                <input class="input" type="text" name="nombre" required>
            </div>
            <div class="field">
                <label class="label">Email</label>
                <input class="input" type="email" name="email" required>
            </div>
            <div class="field">
                <label class="label">Plan de Suscripción</label>
                <div class="select">
                    <select name="plan">
                        <option value="Gratis">Gratis</option>
                        <option value="Premium">Premium (Acceso total)</option>
                    </select>
                </div>
            </div>
            <button class="button is-success" type="submit">Crear Cuenta</button>
        </form>
    </div>
</section>
<?php include 'footer.php'; ?>