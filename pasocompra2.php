<?php
require 'header.php';
require  'database.php';
?>

<div class="container">
    <div class="col-lg-12" id="mediodepago" >
        <div class="col-lg-12">
            <h2>Medio de Pago</h2>
        </div>
        <div class="col-lg-6">
            <div><h3>Mercadopago:</h3></div>
            <form action="" method="post" id="pay" name="pay" >
                <fieldset>
                    <ul>
                        <li>
                            <label for="email">Email</label>
                            <input id="email" name="email" value="test_user_19653727@testuser.com" type="email" placeholder="your email"/>
                        </li>
                        <li>
                            <label for="cardNumber">Credit card number:</label>
                            <input type="text" id="cardNumber" data-checkout="cardNumber" placeholder="4509 9535 6623 3704" onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off />
                        </li>
                        <li>
                            <label for="securityCode">Security code:</label>
                            <input type="text" id="securityCode" data-checkout="securityCode" placeholder="123" onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off />
                        </li>
                        <li>
                            <label for="cardExpirationMonth">Expiration month:</label>
                            <input type="text" id="cardExpirationMonth" data-checkout="cardExpirationMonth" placeholder="12" onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off />
                        </li>
                        <li>
                            <label for="cardExpirationYear">Expiration year:</label>
                            <input type="text" id="cardExpirationYear" data-checkout="cardExpirationYear" placeholder="2015" onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off />
                        </li>
                        <li>
                            <label for="cardholderName">Card holder name:</label>
                            <input type="text" id="cardholderName" data-checkout="cardholderName" placeholder="APRO" />
                        </li>
                        <li>
                            <label for="docType">Document type:</label>
                            <select id="docType" data-checkout="docType"></select>
                        </li>
                        <li>
                            <label for="docNumber">Document number:</label>
                            <input type="text" id="docNumber" data-checkout="docNumber" placeholder="12345678" />
                        </li>
                    </ul>
                    <input type="hidden" name="paymentMethodId" />
                </fieldset>
            </form>

        </div>
        <div class="col-lg-6">
            <div><h3>Otro metodo:</h3></div>

        </div>
        <div class="col-lg-12">
            <form action="logica/finalizarPedido.php" method="post">
                <input type="text" hidden name="direccion" value="<?php  echo $_POST['direccion'];?>">
                <input type="hidden" name="total" value="<?php  echo $_POST['totalConEnvio'];?>">
				<input type="hidden" name="tipoEntrega" value="<?php  echo $_POST['tipoEntrega'];?>">
            <button type="submit" style="margin-left: 25%; width: 50%;margin-top: 5%" class="primary-btn order-submit" >finalizar la compra</button>
            </form>
        </div>


    </div>


</div>


<?php require 'footer.php';
?>

