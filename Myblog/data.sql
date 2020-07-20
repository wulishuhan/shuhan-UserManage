
-- 修改表结构：
alter table `user` add `salt` char(32) not null after `password`;

-- 或重新建表：
create table `user` (
  `id` int unsigned primary key auto_increment,
  `username` varchar(10) not null unique,
  `password` char(32) not null,
  `salt` char(32) not null,
  `email` varchar(40) not null
)charset=utf8;
