<div class="form">
    <?php echo CHtml::beginForm();?>
        <ul class="tasks">
            <?php for($i=0; $i<count($models); $i++) {
                $this->renderPartial('_task', array(
                    'model' => $models[$i],
                    'index' => $i
                ));
            } ?>
        </ul>
        <div class="row buttons">
            <?php
                echo CHtml::button('Add task', array('class' => 'tasks-add'));
                Yii::app()->clientScript->registerCoreScript('jquery');
            ?>

            <script type="text/javascript">
                $('.tasks-add').click(function() {
                    $.ajax({
                        success: function(html) {
                            $('.tasks').append(html);
                        },
                        data: {
                            index: $('.tasks li').size()
                        },
                        type: 'get',
                        url: '<?php echo $this->createUrl('field');?>',
                        cache: false,
                        dataType: 'html'
                    });
                });
            </script>

            <?php echo CHtml::submitButton('Save')?>
        </div>
    <?php echo CHtml::endForm();?>
</div>