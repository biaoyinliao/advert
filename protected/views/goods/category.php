<div id="content_main">
    <div id="content_title"></div>
    <div id="content_body">
        <div id="left">
            <div class="left_title">
                <h2>产品展示</h2>
            </div>
            <div class="left_body">
                <ul class="channel_list">
                    <li><a href="./index.php?r=goods/category&value='led发光字制作'">led发光字制作</a></li>
                    <li><a href="./index.php?r=goods/category&value='广告牌制作'">广告牌制作</a></li>
                    <li><a href="./index.php?r=goods/category&value='广告灯箱制作'">广告灯箱制作</a></li>
                    <li><a href="./index.php?r=goods/category&value='LED显示屏制作'">LED显示屏制作</a></li>
                    <li><a href="./index.php?r=goods/category&value='楼宇亮化工程'">楼宇亮化工程</a></li>
                    <li><a href="./index.php?r=goods/category&value='标识标牌制作'">标识标牌制作</a></li>
                    <li><a href="./index.php?r=goods/category&value='门头店招制作'">门头店招制作</a></li>
                    <li><a href="./index.php?r=goods/category&value='铜字铜牌制作'">铜字铜牌制作</a></li>
                    <li><a href="./index.php?r=goods/category&value='不锈钢金属字制作'">不锈钢金属字制作</a></li>
                    <li><a href="./index.php?r=goods/category&value='有机雕刻制品'">有机雕刻制品</a></li>
                    <li><a href="./index.php?r=goods/category&value='会议/活动/庆典'">会议/活动/庆典</a></li>
                    <li><a href="./index.php?r=goods/category&value='广告印刷制作'">广告印刷制作</a></li>
                     <li><a href="./index.php?r=goods/category&value='品牌包装设计'">品牌包装设计</a></li>
                    <li><a href="./index.php?r=goods/category&value='标志商标设计'">标志商标设计</a></li>
                    <li><a href="./index.php?r=goods/category&value='样本画册设计'">样本画册设计</a></li>
                    <li><a href="./index.php?r=goods/category&value='平面广告设计'">平面广告设计</a></li>
                    <li><a href="./index.php?r=goods/category&value='企业CI/VI设计'">企业CI/VI设计</a></li>
                    <li><a href="./index.php?r=goods/category&value='海报/广告设计'">海报/广告设计</a></li>
                    <li><a href="./index.php?r=goods/category&value='墙体/幕墙广告玻璃贴膜'">墙体/幕墙广告玻璃贴膜</a></li>
                </ul>
            </div>
            <div class="left_bottom"></div>
            <div class="left_title">
                <h2>联系我们</h2>
            </div>
            <div class="left_body">
                <p>联系人：王先生</p>
                <p>手机：13818242337</p>
                <p>电话：021-55221417</p>
                <p>传真：021-55092206</p>
                <p>广告设计部：<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=451559572&amp;site=qq&amp;menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:451559572:41" alt="广告设计部" title="广告设计部"></a></p>
                <p>广告制作部：<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=543366767&amp;site=qq&amp;menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:543366767:41" alt="广告制作部" title="广告制作部"></a></p>
                <p>网络事业部：<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=286741251&amp;site=qq&amp;menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:286741251:41" alt="网络事业部" title="网络事业部"></a></p>
                <p>投诉建议：<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=860092121&amp;site=qq&amp;menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:860092121:41" alt="投诉建议" title="投诉建议"></a></p>
                <p>邮件：shyichen@126.com</p>
                <p>地址：上海市杨浦区翔殷路121弄4临</p>
                <p>网址：http://www.sh1c.cn</p>
            </div>
            <div class="left_bottom"></div>
        </div>
        <div id="right">
            <div class="right_title">
                <h2>产品展示</h2>
            </div>
            <div class="right_body">
                <ul class="productslist">
                    <!--循环开始-->
                    <?php
                    //遍历传递过来的商品变量值$goods_infos
                    foreach ($goods_infos as $_v) {
                        ?>
                        <li>
                            <a href="#" target="_blank"><img src="<?php echo $_v->goods_path; ?>" title="<?php echo $_v->goods_name; ?>" alt="<?php echo $_v->goods_name; ?>"></a><br>
                            <a href="#" target="_blank" title="<?php echo $_v->goods_name; ?>"><?php
                               $str=new CutString();
                                echo $str->g_substr($_v->goods_name);
                                ?>
                            </a>
                        </li>
                        <?php
                    }
                    ?>		   
                    <!--
                    <li>
                        <a href="/info.asp?id=2943" target="_blank"><img src="<?php //echo UPLOADFILE_URL; ?>image/20140506082002.jpg" title="楼顶大型发光字" alt="楼顶大型发光字"></a><br>
                        <a href="/info.asp?id=2943" target="_blank" title="楼顶大型发光字">楼顶大型发光字</a>
                    </li>
                    -->
                    <!--循环结束-->
                </ul>
                <div class="page_turner">
                    <?php echo $page_list; ?>
                    <!--
                   <a title="第1页" class="c">1</a><a title="第2页" href="?id=4&amp;page=2">2</a><a title="第3页" href="?id=4&amp;page=3">3</a><a title="第4页" href="?id=4&amp;page=4">4</a><a title="第5页" href="?id=4&amp;page=5">5</a><a title="第6页" href="?id=4&amp;page=6">6</a><a title="第7页" href="?id=4&amp;page=7">7</a><a title="第8页" href="?id=4&amp;page=8">8</a><a title="第9页" href="?id=4&amp;page=9">9</a><a title="第10页" href="?id=4&amp;page=10">10</a><a title="末页" href="?id=4&amp;page=12">...12</a><a title="上一页" href="javascript:void(0)"></a><a title="下一页" href="?id=4&amp;page=2">&gt;&gt;</a><span>20条/页 共<label id="total">231</label>条</span>
                    -->
                </div> 
            </div>
            <div class="right_bottom"></div>
        </div>
        <div class="float_clear"></div>
    </div>
    <div id="content_bottom"></div>
</div>
