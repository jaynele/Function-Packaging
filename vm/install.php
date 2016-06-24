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










