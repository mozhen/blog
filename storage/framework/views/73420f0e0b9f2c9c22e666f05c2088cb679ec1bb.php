
<?php $__env->startSection('info'); ?>
    <title><?php echo e($field->art_title); ?> - <?php echo e(Config::get('web.web_title')); ?></title>
    <meta name="keywords" content="<?php echo e($field->art_tag); ?>" />
    <meta name="description" content="<?php echo e($field->art_description); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <article class="blogs">
        <h1 class="t_nav"><span>位置：<a href="<?php echo e(url('/')); ?>">首页</a>&nbsp;&gt;&nbsp;<a href="<?php echo e(url('cate/'.$field->cate_id)); ?>"><?php echo e($field->cate_name); ?></a></span><a href="<?php echo e(url('/')); ?>" class="n1">网站首页</a><a href="<?php echo e(url('cate/'.$field->cate_id)); ?>" class="n2"><?php echo e($field->cate_name); ?></a></h1>
        <div class="index_about">
            <h2 class="c_titile"><?php echo e($field->art_title); ?></h2>
            <p class="box_c"><span class="d_time">发布时间：<?php echo e(date('Y-m-d',$field->art_time)); ?></span><span>编辑：<?php echo e($field->art_editor); ?></span><span>查看次数：<?php echo e($field->art_view); ?></span></p>
            <ul class="infos">
                <?php echo $field->art_content; ?>

            </ul>
            <div class="keybq">
                <p><span>关键字词</span>：<?php echo e($field->art_tag); ?></p>
            </div>
            <div class="ad"> </div>
            <div class="nextinfo">
                <p>上一篇：
                    <?php if($article['pre']): ?>
                        <a href="<?php echo e(url('a/'.$article['pre']->art_id)); ?>"><?php echo e($article['pre']->art_title); ?></a>
                    <?php else: ?>
                        <span>没有上一篇了</span>
                    <?php endif; ?>
                </p>
                <p>下一篇：
                    <?php if($article['next']): ?>
                        <a href="<?php echo e(url('a/'.$article['next']->art_id)); ?>"><?php echo e($article['next']->art_title); ?></a>
                    <?php else: ?>
                        <span>没有下一篇了</span>
                    <?php endif; ?>
                </p>
            </div>
            <div class="otherlink">
                <h2>相关文章</h2>
                <ul>
                    <?php foreach($data as $d): ?>
                    <li><a href="<?php echo e(url('a/'.$d->art_id)); ?>" title="<?php echo e($d->art_title); ?>"><?php echo e($d->art_title); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <aside class="right">

            <div class="blank"></div>
            <div class="news">
                @parent
            </div>
        </aside>
    </article>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>