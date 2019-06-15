<?php
//para no ingresar a la pagina por la url
session_start();
if (!isset($_SESSION['rol'])){
    header("location:index.php");
}
require 'header.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box;
        }

        /* Create two equal columns that floats next to each other */
        .column_left {
            float: left;
            width: 60%;

        }
        .column_right {
            float: left;
            width: 35%;

        }
        .column_image_left{
            float: left;
            width: 30%;
            padding: 10px;
            height: 300px; /* Should be removed. Only for demonstration */
        }
        .column_image_right{
            float: left;
            width: 70%;
            padding: 10px;
            height: 300px; /* Should be removed. Only for demonstration */
        }
        /* Clear floats after the columns */
        .row:after {
            width: 80%;
            content: "";
            display: table;
            clear: both;
        }
        img {
            vertical-align: middle;
        }

        /* Position the image container (needed to position the left and right arrows) */
        .container {
            position: relative;
            display: contents;
        }

        /* Hide the images by default */
        .mySlides {
            display: inline-block;
        }
        .mySlides img{
            width:30rem;
            height: 20rem;
        }

        /* Add a pointer when hovering over the thumbnail images */
        .cursor {
            cursor: pointer;
        }

        /* Next & previous buttons */
        .prev,
        .next {
            cursor: pointer;
            position: absolute;
            top: 40%;
            width: auto;
            padding: 16px;
            margin-top: -50px;
            color: white;
            font-weight: bold;
            font-size: 20px;
            border-radius: 0 3px 3px 0;
            user-select: none;
            -webkit-user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover,
        .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        /* Container for image text */
        .caption-container {
            text-align: center;
            background-color: #222;
            padding: 2px 16px;
            color: white;
        }

        /* Six columns side by side */
        .column {
            float: left;
            width: 16.66%;
            position: relative;
            margin-left: 1rem;

        }
        .column img{
            width:50px;
            height: 50px;
        }


        /* Add a transparency effect for thumnbail images */
        .demo {
            opacity: 0.6;
        }

        .active,
        .demo:hover {
            opacity: 1;
        }
        .row2{
            margin-top: 2rem;
            width: 60%;
        }
        .btn{
            display: inline-block;
            margin-top: .5rem;
            text-decoration: none;
            padding: 0.4rem 1rem;
            background-color: #8cc129;
            color: #fff;
            transition: background-color 0.4s ease 0;
        }
        .btn:hover{
            background-color:#aad677;
        }
    </style>

</head>
<body>
<div style="width: 80%; margin: auto">
<h2>Detalles:</h2>

<div class="row">
    <div class="column_left" >
        <div class="container">
            <?php
            require 'producto_imagenes.php'; ?>
</div>
</div>
<script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        var captionText = document.getElementById("caption");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        captionText.innerHTML = dots[slideIndex-1].alt;
    }
    function agregarProducto(n) {
        $.ajax({ url: 'agregar_producto_carrito.php',
            data: {id: 'n'},
            type: 'post',
            success: function() {
                alert("Producto Agregado con exito");
            }
        });
    }
</script>
</body>
</html>

