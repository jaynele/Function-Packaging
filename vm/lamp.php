<?php 
//php 开发环境  lamp平台
linux操作系统
apache服务器
mysql数据库
php语言
//在此平台上php运行效率都是比较高的,四个软件都是免费的开源的,开发成本比较低,php开发环境的黄金搭档
//wamp平台  window操作系统
//lnmp平台  nginx服务器,轻量级,
1.apache 安装并测试
2.mysql安装并测试
3.php安装并测试
4.php扩展安装gd,curl,安装与配置,mcrypt
5.wamp平台下的集成开发环境安装
//远程对linux服务器操作使用第三方工具xshell,用root以外的其他用户操作
//root新建用户,为用户设密码,设置用户名登录服务器
//apache
平台：VMware上虚拟的centos4.7

宿主机：windows

安装Apache前准备：

1、检查该环境中是否已经存在httpd服务的配置文件，默认存储路径：/etc/httpd/httpd.conf（这是centos预装的Apache的一个ent版本，一般我们安装源代码版的Apache）。如果已经存在/etc/httpd/httpd.conf，请先卸载或者关闭centos系统自带的web服务，执行命令：chkconfig  httpd off，再或者把centos自带的httpd服务的80端口改为其他端口，只要不与我们安装的Apache服务的端口冲突就可以啦。

停止并卸载Linux系统自带的httpd服务：

1、service httpd stop

2、ps -ef | grep httpd

3、kill -9 pid号（逐个删除）

4、rpm -qa |grep httpd

5、rpm -e httpd软件包




















