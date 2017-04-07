
<?php $__env->startSection('info'); ?>
    <title><?php echo e(Config::get('web.web_title')); ?> - <?php echo e(Config::get('web.seo_title')); ?></title>
    <meta name="keywords" content="<?php echo e(Config::get('web.keywords')); ?>" />
    <meta name="description" content="<?php echo e(Config::get('web.description')); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!--
    <div class="banner">
        <section class="box">
            <ul class="texts">
                <p>冲淡</p>
                <p>素处以默，妙机其微。饮之太和，独鹤与飞。犹之惠风，荏苒在衣。</p>
                <p>阅音修篁，美曰载归。遇之匪深，即之愈希。脱有形似，握手已违。</p>
            </ul>
            <div class="avatar"><a href="#"><span>墨臻</span></a> </div>
        </section>
    </div>

    <div class="template">
        <div class="box">
            <h3>
                <p><span></span>Recommend</p>
            </h3>
            <ul>
                <?php foreach($pics as $p): ?>
                <li><a href="<?php echo e(url('a/'.$p->art_id)); ?>"  target="_blank"><img src="<?php echo e(url($p->art_thumb)); ?>"> </a><span><?php echo e($p->art_title); ?></span></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    -->
    <article class="blogs">
        <h2 class="title_tj">
            <p>文章列表</p>
        </h2>
        <div class="bloglist left">
            <?php foreach($data as $d): ?>
            <h3> <a title="<?php echo e($d->art_title); ?>" href="<?php echo e(url('a/'.$d->art_id)); ?>" target="_blank" ><?php echo e($d->art_title); ?></a></h3>
         <!--   <figure><img src="<?php echo e(url($d->art_thumb)); ?>"></figure> -->
            <ul>
                <p><?php echo e($d->art_description); ?></p>
                <a title="<?php echo e($d->art_title); ?>" href="<?php echo e(url('a/'.$d->art_id)); ?>" target="_blank" class="readmore">阅读全文>></a>
            </ul>
            <p class="dateview"><span><?php echo e(date('Y-m-d',$d->art_time)); ?></span><span>作者：<?php echo e($d->art_editor); ?></span></p>
            <?php endforeach; ?>
            <div class="page">
                <?php echo e($data->links()); ?>

            </div>
        </div>
        <aside class="right">
            <!-- Baidu Button BEGIN -->
        <!--    <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare"><a class="bds_tsina"></a><a class="bds_qzone"></a><a class="bds_tqq"></a><a class="bds_renren"></a><span class="bds_more"></span><a class="shareCount"></a></div>
            <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6574585" ></script>
            <script type="text/javascript" id="bdshell_js"></script>
        -->
            <script type="text/javascript">
                document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
            </script>
            <!-- Baidu Button END -->

            <div class="news" style="float:left;">
                @parent
                <h3 class="links">
                    <p>友情<span>链接</span></p>
                </h3>
                <ul class="website">
                    <?php foreach($links as $l): ?>
                        <li><a href="<?php echo e($l->link_url); ?>" target="_blank"><?php echo e($l->link_name); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

        </aside>
    </article>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>