<?php if ($fn_include = $this->_include("header.html")) include($fn_include); ?>
<div class="content clearfix">
	<div class="page_url"><a href="<?php echo SITE_URL; ?>">首页</a> <span>&gt;</span> <a href="<?php echo dr_member_url('home/index'); ?>">会员中心</a> <span>&gt;</span> 首页</div>
	
	<div class="aside">
		<div class="round memberinfo">
			<table width="178" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td rowspan="2" width="50"><div class="memberinfo_avatar"><a href="<?php echo dr_member_url('account/avatar'); ?>"><img src="<?php echo dr_avatar($uid); ?>"></a></div></td>
				<td><b>&nbsp;<?php echo $member['username']; ?></b></td>
				</tr>
			  <tr>
				<td colspan="2"><div class="dr_stars"><a href="" title="<?php echo $member['level']['name']; ?>"><?php echo dr_show_stars($member['level']['stars']); ?></a></div></td>
			  </tr>
			  <tr height="20">
				<td colspan="3" style="padding-top:8px;">
				<?php echo SITE_EXPERIENCE; ?>：<a href="<?php echo dr_member_url('pay/experience'); ?>"><?php echo $member['experience']; ?></a>
				</td>
			  </tr>
			  <tr height="20">
				<td colspan="3">
				<?php echo SITE_SCORE; ?>：<a href="<?php echo dr_member_url('pay/score'); ?>"><?php echo $member['score']; ?></a>
				</td>
			  </tr>
			  <tr height="20">
				<td colspan="3">
				<?php echo SITE_MONEY; ?>：<a href="<?php echo dr_member_url('pay/index'); ?>"><?php echo $member['money']; ?></a>
				</td>
			  </tr>
			  <tr height="20">
				<td colspan="3">
				会员组：<?php echo $member['group']['name']; ?>
				</td>
			  </tr>
			  <?php if ($member['levelid']) { ?>
			  <tr height="20">
				<td colspan="3">
				会员等级：<?php echo $member['level']['name']; ?>
				</td>
			  </tr>
			  <?php }  if ($member['groupid']==1 && $regverify == 1) { ?>
			  <tr height="20">
				<td colspan="3">
				审核会员：<a href="<?php echo dr_url('login/resend'); ?>">重发邮件</a>
				</td>
			  </tr>
			  <?php } ?>
			</table>   
		</div>
		<div class="menu round">
			<h4><strong>快捷菜单</strong></h4>
			<ul>
				<li><a href="<?php echo dr_member_url('account/index'); ?>">基本资料</a></li>
				<li><a href="<?php echo dr_member_url('account/password'); ?>">修改密码</a></li>
				<li><a href="<?php echo dr_member_url('account/upgrade'); ?>">会员升级</a></li>
				<li><a href="<?php echo dr_member_url('pm/index'); ?>">站内消息</a></li>
			</ul>
		</div>
	</div>
    
    <div class="article">
        <div class="message message_info">您目前的身份是：<?php echo $member['group']['name']; ?>，拥有<?php echo SITE_SCORE; ?>：<?php echo $member['score']; ?></div>
		<!--应用
        <div class="section">
            <div class="title"><strong>广播</strong></div>
            <div style="padding:10px;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td colspan="2"><textarea id="app_descr" name="appDescr" style="width:733px; height:50px;"></textarea></td>
                    </tr>
                  <tr>
                    <td width="85%" style="padding-top:10px;">测试中&nbsp;</td>
                    <td width="15%" style="padding-top:10px;" align="right"><span class="button"><button value="" type="button" class="blue_button" style="margin-right:0;float:right;" selected="selected">发布</button></span></td>
                  </tr>
                </table>
            </div>
            <div class="title_tabs">
            	<span style="border-left:none"><a href="">全部</a></span>
                <span class="cur"><a href="javascript:void(0);">我的关注</a></span>
                <span><a href="javascript:void(0);">我的粉丝</a></span>
            </div>
            <div class="main" style="border-top: 1px solid #D5D5D5">
            </div>
        </div>
		-->
		<div class="section">
            <div class="title"><strong>统计</strong></div>
            <div class="main">
            <?php echo dr_chart(urlencode(dr_url('api/chart_module', array('uid'=>$member['uid']))), 240, 200);  echo dr_chart(urlencode(dr_url('api/chart_space', array('uid'=>$member['uid']))), 240, 200);  echo dr_chart(urlencode(dr_url('api/chart_attachment', array('uid'=>$member['uid']))), 230, 200); ?>
            </div>
        </div>
        <div class="section">
            <div class="title"><strong>登录记录</strong></div>
            <div class="main dr_table">
				<table style="table-layout:fixed;">
					<thead>
						<tr>
							<th style="width:140px;" class="algin_l">登录时间</th>
							<th style="width:80px;" class="algin_c">登录类型</th>
							<th class="algin_l">登录Ip</th>
						</tr>
					</thead>
					<tbody>
					<?php if (is_array($loginlog)) { $count=count($loginlog);foreach ($loginlog as $t) { ?>
					<tr>
						<td class="algin_l"><?php echo dr_date($t['login_time']); ?></td>
						<td class="algin_c"><?php if ($t['login_type']) {  echo $t['login_type'];  } else { ?>默认<?php } ?></td>
						<td class="algin_l"><a href="http://www.baidu.com/baidu?wd=<?php echo $t['login_ip']; ?>" target="_blank"><?php echo $t['login_ip']; ?></a></td>
					</tr>
					<?php } } ?>
					</tbody>
				</table>
            </div>
        </div>
    </div>
</div>

<?php if ($fn_include = $this->_include("footer.html")) include($fn_include); ?>