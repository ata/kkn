<?php
$this->breadcrumbs=array(
    'Berita'=>array('/berita'),
    $berita->id,
);?>

<div class="list-view">
	<h2><?php echo CHtml::link(CHtml::encode($berita->title), array('view', 'id'=>$berita->id)); ?></h2>

	<div class="view">
		<p><?php echo nl2br($berita->body)?></p>
	</div>
</div>
