<h2>Prueba fase 1</h2>
    <p class="lead">Se requiere desarrollar una conexión en PHP utilizando la documentación de
      PlacetoPay (Redirección-Pago básico). Esta integración debe permitir realizar un
      pago básico desde internet.
    </p>
    <p class="lead">
      Mediante un formulario debe suministrar los datos necesarios para realizar el pago
      (revisar parámetros de entrada del servicio). Debe mantener un registro de la
      respuesta generada por el WebService, determinando su estado actual (Aprobado,
      pendiente, fallido o rechazado). Listar cada intento de pago con el estado en que se
      encuentre
    </p>
  </div>

  <div class="row">
  
    <div class="col-md-12 order-md-1">
      <h4 class="mb-3">Formulario</h4>
      <form class="needs-validation" novalidate action="src/controller/PlacetopayController.php" method="post">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">Nombre</label>
            <input type="text" class="form-control" name="name" placeholder="" value="">
              <div class="invalid-feedback">
              Debes ingresar el Nombre
              </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Apellido <span class="text-muted">(Opcional)</span></label>
            <input type="text" class="form-control" name="surname" placeholder="" value="">
          </div>
        </div>

        <div class="mb-3">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" placeholder="you@example.com" required>
            <div class="invalid-feedback">
            Debes ingresar el Email
            </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-6">
            <label for="tipo">Tipo de documento <span class="text-muted">(Opcional)</span></label>
            <select class="custom-select d-block w-100" name="documentType">
              <option value=""></option>
              <option>CC</option>
            </select>
          </div>
          <div class="col-md-6 mb-6">
            <label for="ndocumento">Número de Documento <span class="text-muted">(Opcional)</span></label>
            <input type="text" class="form-control" name="document" placeholder="">
          </div>
        </div>
       <div class="row">
        <div class="col-md-4">
          <label for="address">Dirección <span class="text-muted">(Opcional)</span></label>
          <input type="text" class="form-control" name="street" placeholder="Calle 26E No 87 -1" required>
        </div>

        <div class="col-md-4 ">
          <label for="address2">Ciudad <span class="text-muted">(Optional)</span></label>
          <input type="text" class="form-control" name="city" placeholder="Cali">
        </div>

       <div class="col-md-4">
          <label for="pais">País <span class="text-muted">(Optional)</span></label>
          <input type="text" class="form-control" name="country" placeholder="CO">
        </div>
        </div>

        <hr class="mb-4">
        <h4 class="mb-3">Pago</h4>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="reference">Referencia <span class="text-muted">(Requerido)</span></label>
            <input type="text" class="form-control" name="reference" placeholder="" required>
            <div class="invalid-feedback">
              Este campo es requerido
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="description">Descrición del producto <span class="text-muted">(Requerido)</span></label>
            <input type="text" class="form-control" name="description" placeholder="" required>
            <div class="invalid-feedback">
              Este campo es requerido
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 mb-3">
            <label for="currency">Moneda <span class="text-muted">(Requerido)</span></label>
            <input type="text" class="form-control" name="currency" placeholder="COP" required>
            <div class="invalid-feedback">
              Este campo es requerido
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="total">Total <span class="text-muted">(Requerido)</span></label>
            <input type="text" class="form-control" name="total" placeholder="200000" required>
            <div class="invalid-feedback">
              Este campo es requerido
            </div>
          </div>
        </div>
        <hr class="mb-4">
        <button class="btn  btn-success btn-lg btn-block" type="submit">Pagar por <img src="src/img/logo_placetopay.png" height="30"></button> <br><br>
      </form>
    </div>
  </div>
