<?php
$_block = 'example';

if (isset($block['data']['preview_image_help'])) :
    block_render($block);
else :
?>

    <section class="<?= $_block ?>">

        <? bergenglobal_block_css($_block) ?>
    </section>
<? endif; ?>