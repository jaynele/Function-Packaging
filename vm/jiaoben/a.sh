vim a.sh
#!/bin/bash
echo hello
cd /usr/local/src
ls
保存退出执行这个脚本
/bin/bash   是.sh脚本的解释器，直接执行，需要修改权限
(1)./a.sh  执行查看结果
more a.sh
(2)/bin/bash a.sh
(3)bash a.sh
变量，表达式，控制结构
变量
自定义变量
系统变量
命令返回值变量
（1）自定义变量
age=13
name=lilin   等号左右不能有空格
echo  $name is $age years old
给变量复制不加$
读取变量的值加$
vim b.sh
#!/bin/bash
age=23
name=lili
echo $name is $age years old
(2)系统变量
vim b.sh
#!/bin/bash
echo login urser is $USER
echo login home is $HOME
(3)命令返回值变量
vim c.sh
#!/bin/bash
date
bash c.sh
直接返回命令的返回值
vim cc.sh
#!/bin/bash
tt=`date`
echo $tt
把命令返回值赋给一个变量，进行返回
vim d.sh
#!/bin/bash
tt=`ls /usr/local/src`
echo $tt
遍历文件夹下所有的文件
表达式
命令表达式，数学表达式，字符串表达式，文件表达式
控制结构if/case/for/while
（1）
if命令表达式
then
语句1
语句2
else
语句1
语句2
fi
例：
vim ee.sh
#!/bin/bash
if mkdir test
then 
   echo mkdir test ok
else
   echo fail
fi
运行脚本，执行成功，成功生成文件
(2)文件判断表达式
不要先判断命令是否执行成功，而是先判断文件是否已经存在，然后再执行命令
[ -d/-f/-e/-r/-w/-x filename ]    
-d判断filename 是否是目录
-f判断filename 是否是文件
-e判断filename 是否是存在
-r判断filename 是否可读
-w判断filename 是否可写
-x判断filename 是否可执行
vim f.sh
#!/bin/bash
if [ -e ./test ]
then
echo test exist
elif mkdir test
then
  echo mkdir ok
else
  echo fail
fi
（3）数学表达式
-gt/-ge/-lt/-le
vim h.sh
#!/bin/bash
lili=12
mei=13
if [ $lili -gt $mei ]
then
  echo lili is older than mei
else
  echo lili is not older than mei
fi

sum=$[ $lili+$mei ]
echo lili and mei are $sum years old
(4)字符串表达式
vim i.sh
#!/bin/bash
if [ $USER = root ]
then
 echo danger switch please
else 
 echo ok run 
fi
(1)for循环控制结构
shell  脚本除了第一句，其余可以#来注释
vim j.sh
#!/bin/bash
for name in lili meimei
do
   echo $name
done

str=/usr/local/src
for name in `ls $str`
do
   if [ -e $str/$name ]
   then
      echo $name
   fi
done
(1)定时任务
输命令
crontab -e
编辑
分时日月周
02 16 * * * date >> /usr/local/src/test.txt
成功
