<? if( isset($_GET['layout']) ): ?>
<div class="testing-breakpoints">
    <div class="size xxl">XXL</div>
    <div class="size xl">XL</div>
    <div class="size l">L</div>
    <div class="size m">M</div>
    <div class="size s">S</div>
</div>

<div class="testing-columns">
   
    <div class="testing-grid side-padding <?= global_columns(); ?>">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
        
</div>
<? endif; ?>