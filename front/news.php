<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
			<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
				<?php
			$ads=$Ad->all(['sh'=>1]);
			foreach($ads as $ad){
				echo $ad['text'];
				echo "&nbsp;&nbsp;&nbsp;";
			}
			//echo q("SELECT *,GROUP_CONCAT('---',`text`) as 'ad' FROM `ad` where sh=1 group by sh;")[0]['ad'];
		;?>	
			</marquee>
				<div style="height:32px; display:block;"></div>
				<!--正中央-->

					<?php
						$all=$News->count(['sh'=>1]);
						$div=5;
						$pages=ceil($all/$div);
						$now=$_GET['p']??1;
						$start=($now-1)*$div;
						$rows=$News->all(['sh'=>1]," limit $start,$div");
						echo "<ol start='".($start+1)."'>";
						foreach($rows as $idx => $row){
							echo "<li>";
		/* 					echo $start+$idx+1 . ". "; */
							echo mb_substr($row['text'],0,25);
							echo "<span class='all' style='display:none;'>";
							echo $row['text'];
							echo "</span>";
							echo "</li>";
						}
						echo "</ol>";

					?>


				<div style="text-align:center;">
					<?php 
					if(($now-1)>0){
					?>
						<a class="bl" style="font-size:30px;" href="?do=news&p=<?=$now-1;?>">&lt;&nbsp;</a>
					<?php
					}
					?>

					<?php
					for($i=1;$i<=$pages;$i++){
						$size=($i==$now)?"26px":"18px";
					?>
						<a class="bl" style="font-size:<?=$size;?>" href="?do=news&p=<?=$i;?>">&nbsp;<?=$i;?>&nbsp;</a>
					<?php
					}
					?>
					<?php 
					if(($now+1)<=$pages){
					?>
					<a class="bl" style="font-size:30px;" href="?do=news&p=<?=$now+1;?>">&nbsp;&gt;</a>
					<?php 
					}
					?>
				</div>
			</div>