<?php

// no direct access
defined( '_JEXEC' ) or die;

switch($this->theme)
{
    case 'normal':
    $theme_suffix = '';
    break;

    case 'dark':
    $theme_suffix = ' likely-light';
    break;

    case 'user':
    $theme_suffix = ' likely-color-theme-based';
    break;

    default:
    $theme_suffix = '';
    break;
}

$size_suffix  = $this->size == 'medium' ? '' : ' likely-' . $this->size;
$counters_attr = $this->counters ? '' : ' data-counters="no"';
?>

<div class="likely<?php echo $theme_suffix . $size_suffix; ?>"<?php echo $counters_attr; ?>>
<?php foreach ($this->buttons as $button) : ?>
    <div class="<?php echo $button[0]; ?>"><?php echo $button[1]; ?></div>
<?php endforeach; ?>
</div>
