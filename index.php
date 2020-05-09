<?php
/**
 * 瀑布流布局的typecho主题practice01，这是我写的第一个typecho主题，纯属练习的作品，所以命名为practice01。主题功能请在使用中慢慢体会：）
 * 
 * @package practice01
 * @author 小宇
 * @version 1.0.6
 * @link https://kisxy.com
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
    $this->need('header.php');
?>
<?php if($this->is('index') && !empty($this->options->SimpleHomeOn) && in_array('simpleHome', $this->options->SimpleHomeOn)): ?>
    <style type="text/css">
        .simple_home {
            width: 100%;
            text-align: center;
            position: absolute;
            top: 30%;
        }
        .simple_home_span p {
            font-size: 20px;
            line-height: 26px;
            font-family: '华文行楷';
            color: #ccc;
        }
        .simple_home_a {
            color: #333;
            font-weight: bold;
            font-size: 26px;
            margin-top: 20px;
            font-family: '华文隶书';
        }
        .simple_home_span img {
            width: 100%;
            max-width: 600px;
            height: auto;
        }
    </style>

    <?php if (!empty($this->options->ShowTimeline) && in_array('sidebarTimeline', $this->options->ShowTimeline)): ?>
    <?php
    $this->widget('Widget_Archive@index', 'pageSize=1&type=category', 'slug=timeline')->to($timeline);
    while($timeline->next()): ?>
        <div class="simple_home">
            <span class="simple_home_span"><?php $timeline->content(); ?></span>
            <p><a class="simple_home_a" href="<?php $this->widget('Widget_Metas_Category_List')->to($categorys); ?><?php while($categorys->next()): ?><?php $getCateName =  $categorys->slug; if($getCateName == 'timeline'): ?><?php echo $categorys->permalink; ?><?php endif; ?><?php endwhile; ?>" title="进入网站...">--- Enter ---</a></p>
        </div>
    <?php endwhile; ?>
    <?php endif; ?>

<?php else: ?>
<div class="site-wrap">
    <div class="flex-left">
        <div class="left-side">
            <div class="inside">
                <div id="content" class="content">
                    <?php while($this->next()): ?>
                        <?php
                            $getCate = $this->category;
                            if ($getCate != 'gallery' && $getCate != 'timeline') {
                                include("post_common.php");
                            }
                        ?>
                    <?php endwhile; ?>
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
<?php endif; ?>