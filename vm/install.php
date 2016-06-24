<?php 
//download vmware on 
//linux centos ios 
//自定义布局,boot200,swam1000,home2000,/
//base server 
//命令操作
shutdown
poweroff
reboot
root
ifconfig
ifup eth0
//get ip ,and use xshell5
//相对定位,绝对定位
//[root@localhost ~]# $
//root 当前登录用户,localhost 主机名, # 管理员 ,$ 普通用户
pwd
cd 
ls 
ll 
//-rwxrwxrwx
//-文件 l 软连接 d 目录
//读写执行
make dir 
make -p dir 
//移动 改名
mv 
//复制
cp .. .. -r 
touch 
rm -rf ..
ln -s .. ..
more ..
less 
head -3 filename 
tail -3 filename 
cat filename1 filename2
echo aa > aa .txt
echo bb > bb .txt 
cat aa.txt bb.txt > cc.txt 
more cc.txt
grep adm /etc/passwd  //把/etc/passwd目录下含adm内容的行都打印出来
//bin 普通
//sbin 超管
//boot 启动目录
//dev 设备保存目录
//etc  系统配置文件
//home 普通家目录
//root  超级家目录
//lib 函数库保存位置
//media misc mnt 挂载目录
//tmp 临时
//usr 系统资源目录
man -f 
ls --help 
tar -zcvf ..tar.gz  源文件
tar -zxvf ..tar.gz 
tar -jcvf ..tar.bz2 源文件
tar -jxvf ..tar.bz2
find / -name httpd.conf , find 目录 按名字查 文件名
whoami 
su - root 
free -m -s 3 显示内存状态
top 资源管理器
ps -aux 
mount /dev/cdrom  /mnt 挂载到/mnt下
cp /mnt/package/thing  /use/local/.
umount /mnt   or umount /cdrom
//命令模式i,a,o,s,dd,ddp编辑模式esc,尾行模式wq!
groupadd 组名
more /etc/group 
groupmod -n 新组名 原组名
groupdel 组名
useradd 
userdel 名 -r 
usermod 
more /etc/passwd 
usermod -l 新名 旧名
passwd 用户名
///存放密码的文件  /etc/shadow
chmod o+w 文件名
chmod g+r 文件名
chmod u-x 文件名
chown 用户名 文件名
chgrp 组名 文件名
//rpm
//yum  可以一次解决这种依赖关系
yum install **
yum list **
yum remove **
yum list updates 
yum list installed
yum info updates
yum info installed
yum check-update
yum update 
//清缓存  
yum clean 
//yum 安装 gcc 编译环境,为编译lnmp准备
yum install gcc automake autoconf libtool gcc-c++
//源代码编译成二进制要下载源代码,官网复制云代码下载路径
cd /usr/local/src
wget
ls 
yum install wget 
yum install gcc automake autoconf libtool gcc-c++
date -s '2016-05-23 15:23:40'
//解压
ls 
cd 
//src 下放源代码 //local 下放二进制
./configure --prefix=/usr/local/memcache
cd src
//wget libevent 地址
//解压编译  ./configure --prefix=/usr/local/libevent  make && make install
cd src
./configure --prefix=/usr/local/memcache 
make && make install 
//编译lnmp
//下载http://nginx.org/en/download.html    stable
//解压   tar -zxvf ......tar.gz
//配置   ./configure --prefix=/usr/lobal/nginx
//如果提示缺少pcre库,则在http://www.pcre.org/  下载
//解压在/usr/local/src/pcre-source
//假设安装在/usr/local/pcre
//1.6版本要求指定源码目录
./configure --prefix=/usr/local/nginx --with-pcre=/usr/local/src/pcre-source
//之前版本指定安装目录
./configure --prefix=/usr/local/nginx --with-pcre=/usr/local/pcre 
make && make install 
./sbin/nginx 
Pkill -9 进程名
Service iptables stop
////编译php
//php依赖的库很多 yum install gd zlib openssl openssl-devel libxml2 libxml2-devel libjpeg libjpeg-devel libpng libpng-devel freetype freetype-devel libmcrypt libmcrypt-devel
//官网大陆镜像wget 解压
// ./configure --prefix=/usr/local/php \
--with-gd \
--enable-gd-native-ttf \
--enable-gd-jis-conv \
--with-mysql=mysqlnd \
--enable-mysqlnd \
--with-pdo-mysql=mysqlnd \
--enable-fpm
//报错缺libmcrypt   
yum install epel-rebease
yum update 
yum install libmcrypt-devel
//继续编译
 --with-gd \
--enable-gd-native-ttf \
--enable-gd-jis-conv \
--with-mysql=mysqlnd \
--enable-mysqlnd \
--with-pdo-mysql=mysqlnd \
--enable-fpm
make &&　make install 
//window 下,apache-php.dll文件,启动Apache,php也启动
//但nginx与php要整合
//启动php 配置nginx
//启动php
# cd /usr/local/php
# cp etc/php-fpm.conf.default etc/php-fpm.conf
#cp /usr/local/src/php-5.5.13/php.ini-development ./lib/php.ini
#./sbin/php-fpm
//配置nginx
cd /usr/local/nginx 
vim conf/nginx.conf 
//告诉nginx,碰到php找9000端口
:set nu 看他的行号
location ~ \.php$ 
/usr/local/nginx/html$fast
让 nginx 的最新配置文件生效
pkill -9 nginx 
# ./sbin/nginx -s reload
vim html/a.php 
<?php phpinfo();
//php 的配置文件在/usr/local/php/lib 但查看没有,
//找/usr/local/src/php/php.ini 有,复制一份到/usr/local/php/lib/  
pkill -9 php 
./sbin/php-fpm 
再次请求 xx.php,看到如下类似效果,即整合成功
//编译mysql  http://mirrors.sohu.com/  wget 





















