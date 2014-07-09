<div id="content_main">
    <div id="content_title"></div>
    <div id="content_body">
        <div id="left">		
            <div class="left_title">
                <h2>联系我们</h2>
            </div>
            <div class="left_body">
                <p>联系人：王先生</p>
                <p>手机：13818242337</p>
                <p>电话：021-55221417</p>
                <p>传真：021-55092206</p>

                <p>广告设计部：<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=858581411&amp;site=qq&amp;menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:858581411:41" alt="广告设计部" title="广告设计部"></a></p>

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
                <h2>成功案例</h2>
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
                        <a href="/info.asp?id=2897" target="_blank"><img src="./uploadfile/image/20140418092038.jpg" title="太平洋百货精神堡垒" alt="太平洋百货精神堡垒"></a><br>
                        <a href="/info.asp?id=2897" target="_blank" title="太平洋百货精神堡垒">太平洋百货精神堡垒</a>
                    </li>
                    -->
                    <!--循环结束-->
                </ul>
                <div class="page_turner">
                    <?php echo $page_list; ?>
                </div>
            </div>
            <div class="right_bottom"></div>
        </div>
        <div class="float_clear"></div>
    </div>
    <div id="content_bottom"></div>
</div>
<!-- 底部 Footer -->
<!-- //底部 Footer -->