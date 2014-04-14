<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<style type="text/css">
	*{ padding: 0; margin: 0;font-size:16px; font-family: "微软雅黑"} 
	div{ padding: 3px 20px;} 
	body{ background: #fff; color: #333;}
	h2{font-size:36px}
	input,textarea {border:1px solid silver;padding:5px;width:350px}
	input{height:32px}
	input.button,input.submit{width:68px; margin:2px 5px;letter-spacing:4px;font-size:16px; font-weight:bold;border:1px solid silver; text-align:center; background-color:#F0F0FF;cursor:pointer}
	</style>
<body>
<foreach name="data" item="v">
{$v.id} {$v.typename}<br/>
</foreach>
<hr/>
<div class="main">
            <form method='post' action="__URL__/insert">
                <table cellpadding=2 cellspacing=2>
                    <tr>
                        <td >ID：</td>
                        <td ><input type="text" name="id" ></td>
                    </tr>
                    <tr>
                        <td >标题：</td>
                        <td><textarea name="title" rows="5" cols="25"></textarea></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" class="button" value="提 交"> <input type="reset" class="button" value="清 空"></td>
                    </tr>
                </table>
            
            </form>
        </div>
        __URL__/del
</body>
</html>