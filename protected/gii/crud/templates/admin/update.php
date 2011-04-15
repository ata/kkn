<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php
echo "<?php\n";
$nameColumn=$this->guessNameColumn($this->tableSchema->columns);
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	Yii::t('app','$label')=>array('index'),
	\${$this->singularName}->{$nameColumn}=>array('view','id'=>\${$this->singularName}->{$this->tableSchema->primaryKey}),
	Yii::t('app','Update'),
);\n";
?>

$this->menu=array(
	array('label'=>Yii::t('app','Manage <?php echo $this->modelClass; ?>'), 'url'=>array('index')),
	array('label'=>Yii::t('app','Create <?php echo $this->modelClass; ?>'), 'url'=>array('create')),
	array('label'=>Yii::t('app','View <?php echo $this->modelClass; ?>'), 'url'=>array('view', 'id'=>$<?php echo $this->singularName; ?>-><?php echo $this->tableSchema->primaryKey; ?>)),
);
?>

<h2><?php echo "<?php echo Yii::t('app','Update {name}',array('{name}' => \${$this->singularName}->{$nameColumn})); ?>"?></h2>

<?php echo "<?php echo \$this->renderPartial('_form', array('{$this->singularName}'=>\${$this->singularName})); ?>"; ?>
