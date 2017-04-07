
<?php $__env->startSection('info'); ?>
    <title><?php echo e($field->cate_name); ?> - <?php echo e(Config::get('web.web_title')); ?></title>
    <meta name="keywords" content="<?php echo e($field->cate_keywords); ?>" />
    <meta name="description" content="<?php echo e($field->cate_description); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <article>
        <h1 class="t_nav"><span><?php echo e($field->cate_title); ?></span><a href="<?php echo e(url('/')); ?>" class="n1">网站首页</a><a href="<?php echo e(url('cate/'.$field->cate_id)); ?>" class="n2"><?php echo e($field->cate_name); ?></a></h1>
        <div class="newblog left">
            <?php foreach($data as $d): ?>
            <h2><?php echo e($d->art_title); ?></h2>
            <p class="dateview"><span>发布时间：<?php echo e(date('Y-m-d',$d->art_time)); ?></span><span>作者：<?php echo e($d->art_author); ?></span><span>分类：[<a href="<?php echo e(url('cate/'.$field->cate_id)); ?>"><?php echo e($field->cate_name); ?></a>]</span></p>
          <!--  <figure><img src="<?php echo e(url($d->art_thumb)); ?>"></figure> -->
            <ul class="nlist">
                <p><?php echo e($d->art_description); ?></p>
                <a title="<?php echo e($d->art_title); ?>" href="<?php echo e(url('a/'.$d->art_id)); ?>" target="_blank" class="readmore">阅读全文>></a>
            </ul>
            <div class="line"></div>
            <?php endforeach; ?>

            <div class="page">
                <?php echo e($data->links()); ?>

            </div>
        </div>
        <aside class="right">
            <?php if($submenu->all()): ?>
            <div class="rnav">
                <ul>
                    <?php foreach($submenu as $k=>$s): ?>
                    <li class="rnav<?php echo e($k+1); ?>"><a href="<?php echo e(url('cate/'.$s->cate_id)); ?>" target="_blank"><?php echo e($s->cate_name); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>

            <div class="news" style="float:left;">
                @parent
            </div>
        </aside>
    </article>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>