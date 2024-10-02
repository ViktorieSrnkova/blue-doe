<?php 
$ogPrice = get_field('price');
$czkPrice = convert_eur_to_czk($ogPrice);
$formattedCzkPrice = format_large_number($czkPrice);

?>
<div class="i-body">
  <div class="first-line-i">
    <div class="first-row-1">
      <p class="txt"> <?php the_field('type'); ?> </p>
      <p class="faded-txt number">ID: <?php the_field('index');?> </p>
    </div>
    <hr class="price-line">
    <div class="first-row-1">
      <p class="txt number txt-bold"> <?php echo number_format($ogPrice, 0, '.', ' ');?> EUR </p>
      <p class="faded-txt number">~ <?php echo $formattedCzkPrice;?> CZK</p>
    </div>
  </div>
  <div class="second-row-i">
    <h1 style="font-size: 26px;"><?php the_field('title')?></h2>
  </div>
  

</div>
