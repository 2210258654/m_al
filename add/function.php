<?php

	header('Content-type:text/html;charset=utf-8');
	
	
	//require_once('D:/wampServer 2/wamp/www/luntan2/public/config.php');//根据电脑自身情况写的绝对路径
	//连接数据库
	function connect($host='localhost',$root='root',$pass='')
	{
		$link = @mysqli_connect($host,$root,$pass);
		if(mysqli_connect_errno())
		{
			echo "连接失败,错误信息为:".mysqli_connect_error().'<br>';
            echo "连接失败,错误代码为:".mysqli_connect_errno();
		    die();
		}
		mysqli_select_db($link,'login');
		mysqli_set_charset($link,'utf8');

		return $link;
	}

	//执行insert update delete
	function execute($link,$sql)
	{
		$sql = strtolower($sql);//将sql语句转成小写

		if(substr($sql,0,6) == 'select' && substr($sql,0,4) == 'show')//判断是否有select字符
		{
			echo"此函数不能执行SELECT或SHOW语句，请重试";
			die();
		}

		if($result=mysqli_query($link,$sql))
		{
			//执行成功
			return $result;
		} else
		{
			//执行失败，显示错误信息以便调试程序
			echo 'SQL执行失败：<br>';
			echo '错误的SQL为：'.$sql.'<br>';
			echo '错误的代码为：'.mysqli_errno($link).'<br>';
			echo '错误的信息为：'.mysqli_error($link).'<br>';
			die();
		}
	}
	//取一条数据
	function fetchOne($link,$sql)
	{
		$sql = strtolower($sql);

		if(substr($sql,0,6) != 'select' && substr($sql,0,4) != 'show')
		{
			echo"此函数不能执行非SELECT或SHOW语句，请重试";
			die();
		}

		if($result=mysqli_query($link,$sql))
		{
			//执行成功
			return mysqli_fetch_assoc($result);
		} else
		{
			//执行失败，显示错误信息以便调试程序
			echo 'SQL执行失败：<br>';
			echo '错误的SQL为：'.$sql.'<br>';
			echo '错误的代码为：'.mysqli_errno($link).'<br>';
			echo '错误的信息为：'.mysqli_error($link).'<br>';
			die();
		}
	}

	//取出记录数---num
	function fetchAll_NUM($link,$sql)
	{
		$sql = strtolower($sql);

		if(substr($sql,0,6) != 'select' && substr($sql,0,4) != 'show')
		{
			echo"此函数不能执行非SELECT或SHOW语句，请重试";
			die();
		}

		if($result=mysqli_query($link,$sql))
		{
			//执行成功
			return mysqli_fetch_all($result,MYSQLI_NUM);
		} else
		{
			//执行失败，显示错误信息以便调试程序
			echo 'SQL执行失败：<br>';
			echo '错误的SQL为：'.$sql.'<br>';
			echo '错误的代码为：'.mysqli_errno($link).'<br>';
			echo '错误的信息为：'.mysqli_error($link).'<br>';
			die();
		}
	}

	//取出所有数据
	function fetchAll($link,$sql)
	{
		$sql = strtolower($sql);

		if(substr($sql,0,6) != 'select' && substr($sql,0,4) != 'show')
		{
			echo"此函数不能执行非SELECT或SHOW语句，请重试";
			die();
		}

		if($result=mysqli_query($link,$sql))
		{
			//执行成功
			return mysqli_fetch_all($result,MYSQLI_ASSOC);
		} else
		{
			//执行失败，显示错误信息以便调试程序
			echo 'SQL执行失败：<br>';
			echo '错误的SQL为：'.$sql.'<br>';
			echo '错误的代码为：'.mysqli_errno($link).'<br>';
			echo '错误的信息为：'.mysqli_error($link).'<br>';
			die();
		}
	}

	//获取记录数
	function Countrow($link,$sql)
	{
		$sql = strtolower($sql);

		if(substr($sql,0,6) != 'select' && substr($sql,0,4) != 'show')
		{
			echo"此函数不能执行非SELECT语句，请重试";
			die();
		}

		if($result=mysqli_query($link,$sql))
		{
			//执行成功
			return mysqli_num_rows($result);
		} else
		{
			//执行失败，显示错误信息以便调试程序
			echo 'SQL执行失败：<br>';
			echo '错误的SQL为：'.$sql.'<br>';
			echo '错误的代码为：'.mysqli_errno($link).'<br>';
			echo '错误的信息为：'.mysqli_error($link).'<br>';
			die();
		}
	}

	//截取字段
	function subtext($text, $length)
	{
	    if(mb_strlen($text, 'utf8') > $length)
		{
	    return mb_substr($text, 0, $length, 'utf8').'...';
		}
	    return $text;
	}

	function Close($link,$result)
	{
		//释放结果集
		mysqli_free_result($result);
		//关闭数据库
		mysqli_close($link);
	}

	//转义
	function safeHandle($link,$data){	
		$data=htmlspecialchars($data);	
		$data=mysqli_real_escape_string($link,$data);	
		return $data;
	}	
	