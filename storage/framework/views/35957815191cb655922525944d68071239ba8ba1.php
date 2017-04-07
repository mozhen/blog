
<?php $__env->startSection('content'); ?>
        <!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="<?php echo e(url('admin/info')); ?>">首页</a> &raquo; 文章管理
</div>
<!--面包屑导航 结束-->

<!--结果集标题与导航组件 开始-->
<div class="result_wrap">
    <div class="result_title">
        <h3>编辑文章</h3>
        <?php if(count($errors)>0): ?>
            <div class="mark">
                <?php if(is_object($errors)): ?>
                    <?php foreach($errors->all() as $error): ?>
                        <p><?php echo e($error); ?></p>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p><?php echo e($errors); ?></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="result_content">
        <div class="short_wrap">
            <a href="<?php echo e(url('admin/article/create')); ?>"><i class="fa fa-plus"></i>添加文章</a>
            <a href="<?php echo e(url('admin/article')); ?>"><i class="fa fa-recycle"></i>全部文章</a>
        </div>
    </div>
</div>
<!--结果集标题与导航组件 结束-->

<div class="result_wrap">
    <form action="<?php echo e(url('admin/article/'.$field->art_id)); ?>" method="post">
        <input type="hidden" name="_method" value="put">
        <?php echo e(csrf_field()); ?>

        <table class="add_tab">
            <tbody>
            <tr>
                <th width="120">分类：</th>
                <td>
                    <select name="cate_id">
                        <?php foreach($data as $d): ?>
                        <option value="<?php echo e($d->cate_id); ?>"
                                <?php if($field->cate_id==$d->cate_id): ?> selected <?php endif; ?>
                        ><?php echo e($d->_cate_name); ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i> 文章标题：</th>
                <td>
                    <input type="text" class="lg" name="art_title" value="<?php echo e($field->art_title); ?>">
                </td>
            </tr>
            <tr>
                <th>编辑：</th>
                <td>
                    <input type="text" class="sm" name="art_editor" value="<?php echo e($field->art_editor); ?>">
                </td>
            </tr>
            <tr>
                <th>缩略图：</th>
                <td>
                    <input type="text" size="50" name="art_thumb" value="<?php echo e($field->art_thumb); ?>">
                    <input id="file_upload" name="file_upload" type="file" multiple="true">
                    <script src="<?php echo e(asset('resources/org/uploadify/jquery.uploadify.min.js')); ?>" type="text/javascript"></script>
                    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('resources/org/uploadify/uploadify.css')); ?>">
                    <script type="text/javascript">
                        <?php $timestamp = time();?>
                        $(function() {
                            $('#file_upload').uploadify({
                                'buttonText' : '图片上传',
                                'formData'     : {
                                    'timestamp' : '<?php echo $timestamp;?>',
                                    '_token'     : "<?php echo e(csrf_token()); ?>"
                                },
                                'swf'      : "<?php echo e(asset('resources/org/uploadify/uploadify.swf')); ?>",
                                'uploader' : "<?php echo e(url('admin/upload')); ?>",
                                'onUploadSuccess' : function(file, data, response) {
                                    $('input[name=art_thumb]').val(data);
                                    $('#art_thumb_img').attr('src','/'+data);
//                                    alert(data);
                                }
                            });
                        });
                    </script>
                    <style>
                        .uploadify{display:inline-block;}
                        .uploadify-button{border:none; border-radius:5px; margin-top:8px;}
                        table.add_tab tr td span.uploadify-button-text{color: #FFF; margin:0;}
                    </style>
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <img alt="" id="art_thumb_img" style="max-width: 350px; max-height:100px;" src="/<?php echo e($field->art_thumb); ?>">
                </td>
            </tr>
            <tr>
                <th>关键词：</th>
                <td>
                    <input type="text" class="lg" name="art_tag" value="<?php echo e($field->art_tag); ?>">
                </td>
            </tr>
            <tr>
                <th>描述：</th>
                <td>
                    <textarea name="art_description"><?php echo e($field->art_description); ?></textarea>
                </td>
            </tr>

            <tr>
                <th>文章内容：</th>
                <td>
                    <script type="text/javascript" charset="utf-8" src="<?php echo e(asset('resources/org/ueditor/ueditor.config.js')); ?>"></script>
                    <script type="text/javascript" charset="utf-8" src="<?php echo e(asset('resources/org/ueditor/ueditor.all.min.js')); ?>"> </script>
                    <script type="text/javascript" charset="utf-8" src="<?php echo e(asset('resources/org/ueditor/lang/zh-cn/zh-cn.js')); ?>"></script>
                    <script id="editor" name="art_content" type="text/plain" style="width:860px;height:500px;"><?php echo $field->art_content; ?></script>
                    <script type="text/javascript">
                        var ue = UE.getEditor('editor');
                    </script>
                    <style>
                        .edui-default{line-height: 28px;}
                        div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body
                        {overflow: hidden; height:20px;}
                        div.edui-box{overflow: hidden; height:22px;}
                    </style>
                </td>
            </tr>

            <tr>
                <th></th>
                <td>
                    <input type="submit" value="提交">
                    <input type="button" class="back" onclick="history.go(-1)" value="返回">
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>