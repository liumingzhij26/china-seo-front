<div class="panel order panelsmall">
	<h2>酒店预订</h2>
	<form class="form-horizontal" role="form" id="search_from" method="post" action="/Search/">
	  <div class="form-group">
		<label for="inputEmail3" class="labell control-label">入住国家:</label>
		<div class="labelw">
			<select class="form-control" name="keys_country"></select>
		</div>
		<font class="msginfo">*</font>
	  </div>
	  <div class="form-group">
		<label for="inputPassword3" class="labell control-label">入住城市:</label>
		<div class="labelw">
			<select class="form-control" name="keys_city" datatype="*" nullmsg="*" errormsg="请选择城市">
			  <option value="">请选择城市</option>
			</select>                        
		</div>
		<font class="msginfo">*</font>
	  </div>
	  <div class="form-group">
		<label for="inputPassword3" class="labell control-label">入住日期:</label>
		<div class="labelw">
			<input type="text" name="start_date" class="start_date form-control" style="cursor: pointer;" datatype="/^[\d\-]+$/" nullmsg="*"  placeholder="入住日期" value="" readonly>       
		</div>
		<font class="msginfo">*</font>
	  </div>
	  <div class="form-group">
		<label for="inputPassword3" class="labell control-label">退房日期:</label>
		<div class="labelw">
			<input type="text" name="end_date" class="end_date form-control" style="cursor: pointer;" datatype="/^[\d\-]+$/" nullmsg="*" placeholder="退房日期" value="" readonly>                        
		</div>
		<font class="msginfo">*</font>
	  </div>                
	  <div class="form-group groupperson">
		<label for="inputPassword3" class="labell control-label">入住人员:</label>
		<div class="labelw">
			<a class="link addroom">添加房间</a>
			<div class="smallp">
				<span class="pull-left">成人（18岁以上）</span>                            
				<select id="adults1" name="room1.adults" class="form-control selectsmall">
					<option value="1">1</option>
					<option selected=selected value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
				</select>
			</div>
			<div class="smallp">
				<span class="pull-left">儿童（18岁以上）</span>
				<select id="children1" name="room1.children" class="form-control selectsmall">
					<option value="0" selected=selected>0</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select>
			</div>
		</div>
	  </div>
	  <div class="form-group">
		<label for="inputPassword3" class="labell control-label">酒店星级:</label>
		<div class="labelw">
			<select name="stars" class="form-control" id="starRating">
				<option value="1">没有特别偏好</option>
				<option value="2">两星级或以上酒店</option>
				<option value="3">三星级或以上酒店</option>
				<option value="4">四星级或以上酒店</option>
				<option value="5">仅限5星级酒店</option>
			</select>
		</div>
	  </div>
	  <div class="form-group">
		<label for="inputPassword3" class="labell control-label">酒店名称:</label>
		<div class="labelw">
			<input type="text" name="city_name" class="form-control" placeholder="选填" >
		</div>
	  </div>
	  <div class="form-group">
		<div class="col-xs-offset-3 col-xs-8">
		  <button type="button" class="btn btn-purp" id="search_btn">查&nbsp;&nbsp;&nbsp;询</button>
		</div>
	  </div>
	</form>
</div>