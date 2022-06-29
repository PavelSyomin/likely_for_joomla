<?php

// no direct access
defined( '_JEXEC' ) or die;

$theme_suffix = $this->theme == 'normal' ? '' : ' likely-light';
$size_suffix  = $this->size == 'medium' ? '' : ' likely-' . $this->size;

?>

<div class="likely<?php echo $theme_suffix . $size_suffix; ?>">
<?php foreach ($this->buttons as $button) : ?>
    <div class="<?php echo $button[0]; ?>"><?php echo $button[1]; ?></div>
<?php endforeach; ?>
</div>
