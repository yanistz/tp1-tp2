<?php
$headTitle = "Roulette";

ob_start();
?>

<section class="main-sections">
  <article class="main-articles">
    <div class="container">
    <h1>🎰Machine à Sous🎰</h1>
    <article class="slot-machine">
        <div class="reel" id="reel1">🍒</div>
        <div class="reel" id="reel2">🍒</div>
        <div class="reel" id="reel3">🍒</div>
    </article>
    <button id="spinButton">🎲🎲 Lancer</button>
    <div id="result"></div>
</div>

<script src="/sources/js/slotscript.js"></script>

  </article>
</section>

<?php

$mainContent = ob_get_clean();