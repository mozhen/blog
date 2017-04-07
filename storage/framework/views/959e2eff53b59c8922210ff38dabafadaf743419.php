
<?php $__env->startSection('content'); ?>
        <!--面包屑配置项 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="<?php echo e(url('admin/info')); ?>">首页</a> &raquo; 配置项管理
</div>
<!--面包屑配置项 结束-->

<?php /*<!--结果页快捷搜索框 开始-->*/ ?>
<?php /*<div class="search_wrap">*/ ?>
    <?php /*<form action="" method="post">*/ ?>
        <?php /*<table class="search_tab">*/ ?>
            <?php /*<tr>*/ ?>
                <?php /*<th width="120">选择分类:</th>*/ ?>
                <?php /*<td>*/ ?>
                    <?php /*<select onchange="javascript:location.href=this.value;">*/ ?>
                        <?php /*<option value="">全部</option>*/ ?>
                        <?php /*<option value="http://www.baidu.com">百度</option>*/ ?>
                        <?php /*<option value="http://www.sina.com">新浪</option>*/ ?>
                    <?php /*</select>*/ ?>
                <?php /*</td>*/ ?>
                <?php /*<th width="70">关键字:</th>*/ ?>
                <?php /*<td><input type="text" name="keywords" placeholder="关键字"></td>*/ ?>
                <?php /*<td><input type="submit" name="sub" value="查询"></td>*/ ?>
            <?php /*</tr>*/ ?>
        <?php /*</table>*/ ?>
    <?php /*</form>*/ ?>
<?php /*</div>*/ ?>
<?php /*<!--结果页快捷搜索框 结束-->*/ ?>

<!--搜索结果页面 列表 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>配置项列表</h3>
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
        <!--快捷配置项 开始-->
        <div class="result_content">
            <div class="short_wrap">
                <a href="<?php echo e(url('admin/config/create')); ?>"><i class="fa fa-plus"></i>添加配置项</a>
                <a href="<?php echo e(url('admin/config')); ?>"><i class="fa fa-recycle"></i>全部配置项</a>
            </div>
        </div>
        <!--快捷配置项 结束-->
    </div>

    <div class="result_wrap">
        <div class="result_content">
            <form action="<?php echo e(url('admin/config/changecontent')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

            <table class="list_tab">
                <tr>
                    <th class="tc" width="5%">排序</th>
                    <th class="tc" width="5%">ID</th>
                    <th>标题</th>
                    <th>名称</th>
                    <th>内容</th>
                    <th>操作</th>
                </tr>

                <?php foreach($data as $v): ?>
                <tr>
                    <td class="tc">
                        <input type="text" onchange="changeOrder(this,<?php echo e($v->conf_id); ?>)" value="<?php echo e($v->conf_order); ?>">
                    </td>
                    <td class="tc"><?php echo e($v->conf_id); ?></td>
                    <td>
                        <a href="#"><?php echo e($v->conf_title); ?></a>
                    </td>
                    <td><?php echo e($v->conf_name); ?></td>
                    <td>
                        <input type="hidden" name="conf_id[]" value="<?php echo e($v->conf_id); ?>">
                        <?php echo $v->_html; ?>

                    </td>
                    <td>
                        <a href="<?php echo e(url('admin/config/'.$v->conf_id.'/edit')); ?>">修改</a>
                        <a href="javascript:;" onclick="delLinks(<?php echo e($v->conf_id); ?>)">删除</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <div class="btn_group">
                <input type="submit" value="提交">
                <input type="button" class="back" onclick="history.go(-1)" value="返回" >
            </div>
            </form>
        </div>
    </div>
<!--搜索结果页面 列表 结束-->

<script>
    function changeOrder(obj,conf_id){
        var conf_order = $(obj).val();
        $.post("<?php echo e(url('admin/config/changeorder')); ?>",{'_token':'<?php echo e(csrf_token()); ?>','conf_id':conf_id,'conf_order':conf_order},function(data){
            if(data.status == 0){
                layer.msg(data.msg, {icon: 6});
            }else{
                layer.msg(data.msg, {icon: 5});
            }
        });
    }

    //删除配置项
    function delLinks(conf_id) {
        layer.confirm('您确定要删除这个配置项吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.post("<?php echo e(url('admin/config/')); ?>/"+conf_id,{'_method':'delete','_token':"<?php echo e(csrf_token()); ?>"},function (data) {
                if(data.status==0){
                    location.href = location.href;
                    layer.msg(data.msg, {icon: 6});
                }else{
                    layer.msg(data.msg, {icon: 5});
                }
            });
//            layer.msg('的确很重要', {icon: 1});
        }, function(){

        });
    }



</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>