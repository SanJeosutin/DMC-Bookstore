<?php include("includes/header.inc")?>
<body>
<?php include("includes/menu.inc")?>
  <section class="content">
    <h1>enhancements for the website 2: (JavaScript)</h1>
    <h2>Change items on <a href="product.html">Product</a> page</h2>
      <p>Implemented by using a simple trick that changed the content of the site. AKA used innerHTML properties<br>
      The user will need to click either, PREVIOUS or NEXT button in order to triger the event.
    </p>
    <h2>Timer for <a href="payment.html">payment</a> page</h2>
      <p>Implemented by using a simple trick that when the user load the payment.html, they will have 15minutes <br>
        to complete the payment. When the timer runs out, the user will get kick with a randomly generated prompt <br>
        The user will need to idle about 15minutes before the event can be trigered. Onced trigered, the user will be<br>
        put back on index.html and their session storage will be cleared.<br>
    </p>
  </section>
  <?php include("includes/footer.inc")?>
</body>

</html>