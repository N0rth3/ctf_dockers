# 第一行默认用bash
#!/bin/bash
# 至少sleep 1，但也不要太久
sleep 1

# 启动服务，例如apache2
# 具体的启动命令，视系统环境而定
/etc/init.d/apache2 start

# 运行 XSS bot
cd /var/www/
python xssbot.py

#flag在 adminfg51g5d4saf26z3v1.php内，如需修改，请酌情考虑

# ctf.sql为数据库的sql文件，在mysql启动后才导入。
# 如果flag不是存在数据库里，那么这里写上存在flag的文件（如flag.php）
# 存在flag的文件里的flag值请用flag{xxxxxx}表示
# flagfile=/var/www/html/ctf.sql
# if [ -f $flagfile ]; then
# #   这里就是替换flag值为/root/flag.txt里的值（这是为动态flag做准备）
#     sed -i "s/flag{x*}/$(cat /root/flag.txt)/" $flagfile
# #   修改mysql的root密码（如果有使用mysql且必须修改的话）
#     mysqladmin -u root password "newpasswd"
# #   mysql导入sql文件（newwpasswd只是示例密码）
#     mysql -uroot -pnewpasswd < $flagfile
# #   删除sql文件(一般是要删除的) / 如果不是sql文件这里不需要删除
#     rm -f $flagfile
# fi
/bin/bash