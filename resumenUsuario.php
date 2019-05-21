<?php
require 'header.php'; ?>
<body>
<div class="flecha">
    <a href="#header">
        <img src="img/flechaArriba.png" alt="Flecha_Ir_Arriba">
    </a>
</div>

<div class="container">
    <div class="row">

        <div class="col-md-6">
            <h3>Pills left</h3>
            <!-- tabs left -->
            <div class="tabbable">
                <ul class="nav nav-pills nav-stacked col-md-3">
                    <li><a href="#a" data-toggle="tab">One</a></li>
                    <li class="active"><a href="#b" data-toggle="tab">Two</a></li>
                    <li><a href="#c" data-toggle="tab">Twee</a></li>
                </ul>
                <div class="tab-content col-md-9">
                    <div class="tab-pane active" id="a">Lorem ipsum dolor sit amet, charetra varius rci quis tortor imperdiet venenatis quam sit amet vulputate. Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero.</div>
                    <div class="tab-pane" id="b">Secondo sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. Aliquam in felis sit amet augue.</div>
                    <div class="tab-pane" id="c">Thirdamuno, ipsum dolor sit amet, consectetur adipiscing elit. Duis elementum auctor accumsan. Duis pharetra
                        varius quam sit amet vulputate. Quisque mauris augue, molestie tincidunt condimentum vitae. </div>
                </div>
            </div>
            <!-- /tabs -->
        </div>

    </div>
    <!-- /row -->
</div>

<hr>

</body>
<?php
require 'footer.php';
?>
</html>