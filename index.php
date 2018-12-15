<?php
/**
 * 瀑布流布局的typecho主题practice01，因为这是我写的第一个typecho主题，纯属练习的作品，所以命名为practice01。
 * 
 * @package practice01
 * @author 小宇
 * @version 1.0
 * @link https://sunxyu.cn
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
    $this->need('header.php');
?>
<div class="site-wrap">
    <div class="flex-left">
        <div class="left-side">
            <div class="inside">
                <div id="content" class="content">
                    <?php while($this->next()): ?>
                        <?php include("post_common.php"); ?>
                    <?php endwhile; ?>
<!-- <?php $this->pageNav('上一页', 'Loading...', 0, '..', array('wrapClass' => 'page-navigator ajaxload')); ?> -->
                </div>

                <div id="ajaxloadpost" style="padding: 0 10px;">
                    <?php $this->pageLink('下一页','next'); ?>
                </div>
                <div id="showtext"></div>
                </div>                
            </div>
        </div>
        <?php $this->need('sidebar.php'); ?>
        <?php $this->need('footer.php'); ?>