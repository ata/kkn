<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php
echo "<?php\n";
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	Yii::t('app','$label')=>array('index'),
	Yii::t('app','Create'),
);\n";
?>

$this->menu=array(
	array('label'=> Yii::t('app','Manage <?php echo $this->modelClass; ?>'), 'url'=>array('index')),
);
?>

<h2><?php echo "<?php echo Yii::t('app','Create {$this->modelClass}'); ?>"?></h2>

<?php echo "<?php echo \$this->renderPartial('_form', array('{$this->singularName}'=>\${$this->singularName})); ?>"; ?>
