<?php if($type=='Print'){?>
<style>
@media print {
    h1 {page-break-before: always;}
}
</style>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700,600,600italic' rel='stylesheet' type='text/css'>
<?php } ?>
<?php
/*function to convert fraction*/
function decimal_to_fraction($fraction) {
  $base = floor($fraction);
  $fraction -= $base;
  if( $fraction == 0 ) return $base;
  
  list($ignore, $numerator) = preg_split('/\./', $fraction, 2);
  $denominator = pow(10, strlen($numerator));
  
  if($numerator/$denominator < 0.25) return $base;
  $gcd = gcd($numerator, $denominator);
  $fraction = ($numerator / $gcd) . '/' . ($denominator / $gcd);
  if( $base > 0 ) {
    return $base . ' ' . $fraction;
  } else {
    return $fraction;
  }
}

function gcd($a,$b) {
  return ($a % $b) ? gcd($b,$a % $b) : $b;
}
$exrcise_timing = array('1'=>'Morning','2'=>'Afternoon','3'=>'Evening','4'=>'Late Evening');
?>
<?php if($type=='Print'){?>
  <script>
      window.onload = window.print();
  </script>
<?php } ?>
<?php if($guideline_stat=='true' ){ ?>  
<table width="1273" border="0" cellspacing="0" cellpadding="0" style="width:1273px; margin:0 auto; font-family: 'Open Sans', sans-serif;">
  <tr>
    <td style="height:20px;"></td>
  </tr>

  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#E8E1D7; border-radius:4px;">
        <tbody>
          <tr>
            <td width="40%" style="border-bottom:#222 solid 1px; padding-left:20px; padding-left:20px; font-size:33px; color:#222; height:50px; font-weight:400;">File No - <?php echo $main['file_no'];?> </td>
            <td width="20%" style="border-bottom:#222 solid 1px; padding-left:20px; padding-left:20px; font-size:33px; color:#222;font-weight:400;">Age -  <?php echo $main['age'];?> </td>
            <td width="40%" style="border-bottom:#222 solid 1px; padding-left:20px; padding-left:20px; font-size:33px; color:#222;font-weight:400;">Gender -  <?php echo $main['gender'];?> </td>
          </tr>
          <tr>
            <td colspan="2" style="border-bottom:#222 solid 1px; padding-left:20px; padding-left:20px; font-size:33px; color:#222; height:50px;font-weight:400;"> <?php echo $recomm_intake['consultation_date'];?> </td>
            <td style="border-bottom:#222 solid 1px; padding-left:20px; padding-left:20px; font-size:33px; color:#222;font-weight:400;">Food Preference -  <?php echo $main['ldesc'];?> </td>
          </tr>
          <tr>
            <td colspan="3" style="padding-left:20px; padding-left:20px; font-size:33px; color:#222; height:50px;font-weight:400;">Diet Guide For -  <?php echo $main['first_name'];?> </td>
          </tr>
        </tbody>
      </table></td>
  </tr>
  <tr>
    <td style="height:50px;">&nbsp;</td>
  </tr>
  <tr>
    <td><table width="90%" border="0" cellspacing="0" cellpadding="0" style="background-color:#E6E6E6; margin:0 auto;">
        <tbody>
          <tr>
            <td width="16%" style="background-color:#fff;">&nbsp;</td>
            <td width="28%" style="font-size:28px; color:#000; text-align:center; text-transform:uppercase; background-color:#fff; height:50px;border:#222 solid 1px;"> Started </td>
            <td width="28%" style="font-size:28px; color:#000; text-align:center; text-transform:uppercase; background-color:#fff;border:#222 solid 1px;border-left:none;"> Target </td>
            <td width="28%" style="font-size:28px; color:#000; text-align:center; text-transform:uppercase; background-color:#fff;border:#222 solid 1px;border-left:none; "> Ideal Range </td>
          </tr>
          <tr>
            <td  style="font-size:28px; color:#000; height:40px; text-align:left; font-weight:bold; padding-left:20px;  border:#222 solid 1px; border-bottom:none; background-color:#fff; "> Date </td>
            <td style="font-size:28px; color:#222; text-align:center; border-right:#222 solid 1px; border-bottom:#222 solid 1px;"><?php echo $target_details['start_date'];?> </td>
            <td style="font-size:28px; color:#222; text-align:center; border-right:#222 solid 1px; border-bottom:#222 solid 1px;"><?php echo $target_details['target_date'];?></td>
            <td style="font-size:28px; color:#222; text-align:center; border-right:#222 solid 1px; border-bottom:#222 solid 1px;">&nbsp;</td>
          </tr>
          <tr>
            <td  style="font-size:28px; color:#000; height:40px; text-align:left; font-weight:bold; padding-left:20px;  border:#222 solid 1px; border-bottom:none; background-color:#fff; "> Weight </td>
            <td style="font-size:28px; color:#222; text-align:center; border-right:#222 solid 1px; border-bottom:#222 solid 1px;"><?php echo $target_details['start_weight'];?> kgs</td>
            <td style="font-size:28px; color:#222; text-align:center; border-right:#222 solid 1px; border-bottom:#222 solid 1px;"><?php echo $target_details['target_weight'];?> kgs</td>
            <td style="font-size:28px; color:#222; text-align:center; border-right:#222 solid 1px; border-bottom:#222 solid 1px;"><?php echo $recomm_intake['ibw'];?> kgs</td>
          </tr>
          <tr>
            <td  style="font-size:28px; color:#000; height:40px; text-align:left; font-weight:bold; padding-left:20px;  border:#222 solid 1px; border-bottom:none; background-color:#fff; "> Fat </td>
            <td style="font-size:28px; color:#222; text-align:center; border-right:#222 solid 1px; border-bottom:#222 solid 1px;"><?php echo $recomm_intake['started_fat'];?> %</td>
            <td style="font-size:28px; color:#222; text-align:center; border-right:#222 solid 1px; border-bottom:#222 solid 1px;"><?php echo $recomm_intake['target_fat'];?> %</td>
            <td style="font-size:28px; color:#222; text-align:center; border-right:#222 solid 1px; border-bottom:#222 solid 1px;"><?php echo $recomm_intake['fat_ideal_range'];?> %</td>
          </tr>
          <tr>
            <td  style="font-size:28px; color:#000; height:40px; text-align:left; font-weight:bold; padding-left:20px;  border:#222 solid 1px; background-color:#fff; "> BMI </td>
            <td style="font-size:28px; color:#222; text-align:center; border-right:#222 solid 1px; border-bottom:#222 solid 1px;"><?php echo $target_details['bmi'];?></td>
            <td style="font-size:28px; color:#222; text-align:center; border-right:#222 solid 1px; border-bottom:#222 solid 1px;">&nbsp;</td>
            <td style="font-size:28px; color:#222; text-align:center; border-right:#222 solid 1px; border-bottom:#222 solid 1px;">&nbsp;</td>
          </tr>
        </tbody>
      </table></td>
  </tr>
  <tr>
    <td style="height:50px;">&nbsp;</td>
  </tr>
  
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <td style="background-color:#fff; border:#222222 solid 2px; height:50px; font-size:40px; text-align:center; color:#000; border-radius:4px 4px 0px 0px;"> General Guidelines </td>
          </tr>
          <tr>
            <td style="padding-left:20px; padding-right:20px; padding-top:20px; padding-bottom:20px;color:#222;"> 
				<ol style="font-size:33px;">
					<?php foreach($gen_guidelines as $general)  {                     if($general['chkd']=='true'){					?>
						<li style="line-height:50px;"><?php echo $general['recommendation'];?></li>
					 <?php }					 } ?>
					
				</ol>
				<?php if($gen_ext_guidelines!='')
				{
					echo "<div style='padding-left:20px;font-size:33px;'><b>Extra:</b> ".$gen_ext_guidelines.'</div>';
				}					        
				 ?>
			</td>
          </tr>
        </tbody>
      </table></td>
  </tr>
  <tr>
    <td style="height:10px;">&nbsp;</td>
  </tr>
  <tr>
    <td>
		<?php foreach($guidelines as $dkey=>$disease) { ?>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tbody>
			  <tr>
				<td style="background-color:#fff; border:#222222 solid 2px; height:50px; font-size:40px; text-align:center; color:#000; border-radius:4px 4px 0px 0px;"> <?php echo $disease['name'];?> </td>
			  </tr>
			  
			  <tr>
				<td style="padding-left:20px; padding-right:20px; padding-top:20px; padding-bottom:20px; color:#222;">
					<ol style="font-size:33px;">
						<?php foreach($disease['drecommed'] as $recommend) {                         if($recommend['chkd']=='true')						 {						?>
							<li style="line-height:50px;"><?php echo $recommend['recommendation'];?></li>
						<?php }						} ?>
					</ol>
				</td>
			  </tr>
				
			</tbody>
		</table>
		<?php } ?>
	  </td>
  </tr>
  <tr>
    <td style="height:20px;"></td>
  </tr>

 </table>
 
  <?php } ?>
<?php if($guideline_stat=='true'){?>
       <pagebreak />
<?php }  ?>
 <h1></h1>
 <table width="1273" border="0" cellspacing="0" cellpadding="0" style="width:1273px; margin:0 auto; font-family:'Open Sans', sans-serif;"> 
  <?php foreach($meals as $key=>$meal) { ?>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#E6E6E6;">
        <tbody>
          <tr>
            <td colspan="9" style="background-color:#fff; border:#222222 solid 2px; height:50px; font-size:33px; text-align:center; color:#000; border-radius:4px 4px 0px 0px;"> <span style="font-weight:600;"><?php echo $meal['meal_name'];?> : <?php echo $meal['start_time'].' - '.$meal['end_time'];?> </span><span style="font-size:26px;font-weight:300;">(Choose any one option)<br />
              <span style="font-size:26px; font-weight:600italic; font-style:italic;">
				<?php if($meal['meal_name'] == 'Break Fast') { echo 'Calories: '.$meal['breakfast_cal'].' kcal - Proteins :'.$meal['breakfast_protein'].'g'; } 
				else if($meal['meal_name'] == 'Lunch') { echo 'Calories: '.$meal['lunch_cal'].' kcal - Proteins :'.$meal['lunch_protein'].'g'; } 
				else if($meal['meal_name'] == 'Snack') { echo 'Calories: '.$meal['snack_cal'].' kcal - Proteins :'.$meal['snack_protein'].'g'; } 
				else if($meal['meal_name'] == 'Dinner') { echo 'Calories: '.$meal['dinner_cal'].' kcal - Proteins :'.$meal['dinner_protein'].'g'; } ?>
			  </span> </span></td>
          </tr>
		  
          <tr>
            <td width="6%" style="font-size:19px;font-weight:600; color:#000; height:40px; text-align:center; border-left:#222 solid 1px;border-right:#222 solid 1px; border-bottom:#222 solid 1px;"> Options </td>
            <td width="18%" style="font-size:23px;font-weight:600; color:#000; text-align:center; border-right:#222 solid 1px; border-bottom:#222 solid 1px; text-transform:uppercase;"> Carbs </td>
            <td width="18%" style="font-size:23px;font-weight:600; color:#000; text-align:center; border-right:#222 solid 1px; border-bottom:#222 solid 1px; text-transform:uppercase;"> Proteins </td>
            <td width="18%" style="font-size:23px;font-weight:600; color:#000; text-align:center; border-right:#222 solid 1px; border-bottom:#222 solid 1px; text-transform:uppercase; "> Min. Fat Intake </td>
            <td width="18%" style="font-size:23px;font-weight:600; color:#000; text-align:center;  border-bottom:#222 solid 1px;text-transform:uppercase; border-right:#222 solid 1px;"> Fibre </td>			            <td width="4%" style="font-size:19px;font-weight:600; color:#000; text-align:center;  border-bottom:#222 solid 1px; border-right:#222 solid 1px;"> Prot<br>(gms) </td>            <td width="4%" style="font-size:19px;font-weight:600; color:#000; text-align:center;  border-bottom:#222 solid 1px; border-right:#222 solid 1px;"> Fat <br>(gms) </td>            <td width="4%" style="font-size:19px;font-weight:600; color:#000; text-align:center;  border-bottom:#222 solid 1px; border-right:#222 solid 1px;"> Carb <br>(gms) </td>            <td width="4%" style="font-size:19px;font-weight:600; color:#000; text-align:center;  border-bottom:#222 solid 1px; border-right:#222 solid 1px;"> Cal <br>(kcal) </td>
          </tr>
		  <?php foreach($meal['options'] as $opt_key=>$option_val) { ?>
          <tr>
            <td style="font-size:23px;font-weight:600; color:#000; height:40px; text-align:center; border-left:#222 solid 1px;border-right:#222 solid 1px; border-bottom:#222 solid 1px; "> <?php echo $opt_key+1;?> </td>
			<?php if($option_val['items']['nut_count']==1){?>
            <td style="font-size:23px;font-weight:300; color:#222; text-align:center; border-right:#222 solid 1px; border-bottom:#222 solid 1px;" id='carbs'>
			<?php foreach($option_val['items'] as $item_val){
                  if($item_val['macro_nut']=='CARBS')
				  {
					  if($item_val['calc_base']=='gms' || $item_val['calc_base']=='Ml')
					  {
						  echo $item_val['amount'] * $item_val['gm_ml_meas'].' ';
					  }
					  else if($item_val['calc_base']=='cup' || $item_val['calc_base']=='Cup cooked')
					  {
						 $vals= $item_val['amount'] * $item_val['cup_meas'];
						 echo decimal_to_fraction($vals).' ';
					  }
					  else if($item_val['calc_base']=='Number' || $item_val['calc_base']=='Tbsp' || $item_val['calc_base']=='Tsp' || $item_val['calc_base']=='Pint' || $item_val['calc_base']=='Glass' || $item_val['calc_base']=='slice' || $item_val['calc_base']=='pieces' || $item_val['calc_base']=='slices' || $item_val['calc_base']=='rotis' || $item_val['calc_base']=='rings' || $item_val['calc_base']=='cookies' || $item_val['calc_base']=='biscuits')
					  {
						  $vals = $item_val['amount'] * $item_val['number_meas'];
						  echo decimal_to_fraction($vals).' ';
					  }
					    if($item_val['calc_base']!='Number' && $item_val['calc_base']!='rotis' && $item_val['calc_base']!='rings' && $item_val['calc_base']!='cookies' && $item_val['calc_base']!='biscuits' && $item_val['calc_base']!='slices')
						{
						  echo $item_val['calc_base'].' of ';
						}
						  echo  $item_val['food_item'];
						  
						if($option_val['items']['count_carb']>1 && $option_val['items']['count_carb']>$item_val['last_row_carb'])
						{
							echo ' +';
						}
                                							
						  echo '<br>';
					   
				  }
				  if($item_val['macro_nut']=='NA')
				  {
					  if($item_val['calc_base']=='cup' || $item_val['calc_base']=='Cup cooked')
					  {
						 $valsna = $item_val['amount'] * $item_val['cup_meas'];
						 echo decimal_to_fraction($valsna);
						 echo ' '.$item_val['calc_base'].' of '.$item_val['food_item'];
					  }
				  }
				  
			}?>
			</td>
            <td style="font-size:23px;font-weight:300; color:#222; text-align:center; border-right:#222 solid 1px; border-bottom:#222 solid 1px;" id='protein'> 
			<?php foreach($option_val['items'] as $item_val){
                  if($item_val['macro_nut']=='PROTEIN' && $item_val['exchange']=='')
				  {
					     if($item_val['calc_base']=='gms' || $item_val['calc_base']=='Ml')
						  {
							  echo $item_val['amount'] * $item_val['gm_ml_meas'].' ';
						  }
						  else if($item_val['calc_base']=='cup' || $item_val['calc_base']=='Cup cooked')
						  {
							  $vals = $item_val['amount'] * $item_val['cup_meas'];
							  echo decimal_to_fraction($vals).' ';
						  }
						  else if($item_val['calc_base']=='Number' || $item_val['calc_base']=='Tbsp' || $item_val['calc_base']=='Tsp' || $item_val['calc_base']=='Pint' || $item_val['calc_base']=='Glass' || $item_val['calc_base']=='slice' || $item_val['calc_base']=='pieces' || $item_val['calc_base']=='slices' || $item_val['calc_base']=='rotis' || $item_val['calc_base']=='rings' || $item_val['calc_base']=='cookies' || $item_val['calc_base']=='biscuits')
						  {
							  $vals = $item_val['amount'] * $item_val['number_meas'];
							  echo decimal_to_fraction($vals).' ';
						  }
						  
							if($item_val['calc_base']!='Number' && $item_val['calc_base']!='rotis' && $item_val['calc_base']!='rings' && $item_val['calc_base']!='cookies' && $item_val['calc_base']!='biscuits' && $item_val['calc_base']!='slices')
							{
							  echo $item_val['calc_base'].' of ';
							}
							echo  $item_val['food_item'];
							if($option_val['items']['count_prot']>1 && $option_val['items']['count_prot']>$item_val['last_row_prot'])
							{
								echo ' +';
							}
							echo '<br>'; 
				  }
				  if($item_val['exchange']!='')
				  {
					 
						 echo $item_val['text_exchange'] ;
					
				  }
			}?>
			 </td>
            <td style="font-size:23px;font-weight:300; color:#222; text-align:center; border-right:#222 solid 1px; border-bottom:#222 solid 1px;" id='fats'>
			<?php foreach($option_val['items'] as $item_val){
                  if($item_val['macro_nut']=='FATS')
				  {
					    if($item_val['calc_base']=='gms' || $item_val['calc_base']=='Ml')
						  {
							  echo $item_val['amount'] * $item_val['gm_ml_meas'].' ';
						  }
						  else if($item_val['calc_base']=='cup' || $item_val['calc_base']=='Cup cooked')
						  {
							  $vals = $item_val['amount'] * $item_val['cup_meas'];
							  echo decimal_to_fraction($vals).' ';
						  }
						  else if($item_val['calc_base']=='Number' || $item_val['calc_base']=='Tbsp' || $item_val['calc_base']=='Tsp' || $item_val['calc_base']=='Pint' || $item_val['calc_base']=='Glass' || $item_val['calc_base']=='slice' || $item_val['calc_base']=='pieces' || $item_val['calc_base']=='slices' || $item_val['calc_base']=='rotis' || $item_val['calc_base']=='rings' || $item_val['calc_base']=='cookies' || $item_val['calc_base']=='biscuits')
						  {
							  $vals = $item_val['amount'] * $item_val['number_meas'];
						      echo decimal_to_fraction($vals).' ';
						  }
						  
							if($item_val['calc_base']!='Number' && $item_val['calc_base']!='rotis' && $item_val['calc_base']!='rings' && $item_val['calc_base']!='cookies' && $item_val['calc_base']!='biscuits' && $item_val['calc_base']!='slices')
							{
							  echo $item_val['calc_base'].' of ';
							}
							echo $item_val['food_item'];
							if($option_val['items']['count_fat']>1 && $option_val['items']['count_fat']>$item_val['last_row_fat'])
							{
								echo ' +';
							}
							  echo  '<br>';   
				  }
			}?>
			</td>
			
            <td style="font-size:23px;font-weight:300; color:#222; text-align:center; border-right:#222 solid 1px; border-bottom:#222 solid 1px;" id='fibre'>
			<?php foreach($option_val['items'] as $item_val){
                  if($item_val['macro_nut']=='FIBRE')
				  {
					    if($item_val['calc_base']=='gms' || $item_val['calc_base']=='Ml')
						  {
							  echo $item_val['amount'] * $item_val['gm_ml_meas'].' ';
						  }
						  else if($item_val['calc_base']=='cup' || $item_val['calc_base']=='Cup cooked')
						  {
							  $vals = $item_val['amount'] * $item_val['cup_meas'];
							  echo decimal_to_fraction($vals).' ';
						  }
						  else if($item_val['calc_base']=='Number' || $item_val['calc_base']=='Tbsp' || $item_val['calc_base']=='Tsp' || $item_val['calc_base']=='Pint' || $item_val['calc_base']=='Glass' || $item_val['calc_base']=='slice' || $item_val['calc_base']=='pieces' || $item_val['calc_base']=='slices' || $item_val['calc_base']=='rotis' || $item_val['calc_base']=='rings' || $item_val['calc_base']=='cookies' || $item_val['calc_base']=='biscuits')
						  {
							  $vals = $item_val['amount'] * $item_val['number_meas'];
						      echo decimal_to_fraction($vals).' ';
						  }
						  
						if($item_val['calc_base']!='Number' && $item_val['calc_base']!='rotis' && $item_val['calc_base']!='rings' && $item_val['calc_base']!='cookies' && $item_val['calc_base']!='biscuits' && $item_val['calc_base']!='slices')
							{
							  echo $item_val['calc_base'].' of ';
							}
							echo $item_val['food_item'];
							if($option_val['items']['count_fibre']>1 && $option_val['items']['count_fibre']>$item_val['last_row_fibre'])
							{
								echo ' +';
							}
							  echo '<br>';  
				  }
			}?>
			
			</td>
			<?php } ?>
			<?php if($option_val['items']['nut_count']==2){ ?>
            <td style="font-size:23px;font-weight:300; color:#222; text-align:center; border-right:#222 solid 1px; border-bottom:#222 solid 1px;" id='carbs' colspan='2'>
			<?php foreach($option_val['items'] as $item_val){
                  if(($item_val['macro_nut']=='PROTEIN,CARBS' || $item_val['macro_nut']=='CARBS,PROTEIN') && $item_val['exchange']=='')
				  {
					  if($item_val['calc_base']=='gms' || $item_val['calc_base']=='Ml')
					  {
						  echo $item_val['amount'] * $item_val['gm_ml_meas'].' ';
					  }
					  else if($item_val['calc_base']=='cup' || $item_val['calc_base']=='Cup cooked')
					  {
						  $vals = $item_val['amount'] * $item_val['cup_meas'];
						  echo decimal_to_fraction($vals).' ';
					  }
					  else if($item_val['calc_base']=='Number' || $item_val['calc_base']=='Tbsp' || $item_val['calc_base']=='Tsp' || $item_val['calc_base']=='Pint' || $item_val['calc_base']=='Glass' || $item_val['calc_base']=='slice' || $item_val['calc_base']=='pieces' || $item_val['calc_base']=='slices' || $item_val['calc_base']=='rotis' || $item_val['calc_base']=='rings' || $item_val['calc_base']=='cookies' || $item_val['calc_base']=='biscuits')
					  {
						  $vals = $item_val['amount'] * $item_val['number_meas'];
						  echo decimal_to_fraction($vals).' ';
					  }
					  
						  echo ($item_val['calc_base']!='Number')? $item_val['calc_base'].' of ':' ';
						  echo  $item_val['food_item'].'<br>';
					   
				  }
				  if($item_val['exchange']!='')
				  {
					 
						 echo $item_val['text_exchange'] ;
					
				  }
				  
			}?>
			 </td>
            <td style="font-size:23px;font-weight:300; color:#222; text-align:center; border-right:#222 solid 1px; border-bottom:#222 solid 1px;" id='fats'>
			<?php foreach($option_val['items'] as $item_val){
                  if($item_val['macro_nut']=='FATS')
				  {
					     if($item_val['calc_base']=='gms' || $item_val['calc_base']=='Ml')
						  {
							  echo $item_val['amount'] * $item_val['gm_ml_meas'].' ';
						  }
						  else if($item_val['calc_base']=='cup' || $item_val['calc_base']=='Cup cooked')
						  {
							  $vals = $item_val['amount'] * $item_val['cup_meas'];
						      echo decimal_to_fraction($vals).' ';
						  }
						  else if($item_val['calc_base']=='Number' || $item_val['calc_base']=='Tbsp' || $item_val['calc_base']=='Tsp' || $item_val['calc_base']=='Pint' || $item_val['calc_base']=='Glass' || $item_val['calc_base']=='slice' || $item_val['calc_base']=='pieces' || $item_val['calc_base']=='slices' || $item_val['calc_base']=='rotis' || $item_val['calc_base']=='rings' || $item_val['calc_base']=='cookies' || $item_val['calc_base']=='biscuits')
						  {
							  $vals = $item_val['amount'] * $item_val['number_meas'];
						      echo decimal_to_fraction($vals).' ';
						  }
						  
							  echo ($item_val['calc_base']!='Number')? $item_val['calc_base'].' of ':' ';
							  echo  $item_val['food_item'].'<br>'; 
				  }
			}?>
			 </td>
			 <td style="font-size:23px;font-weight:300; color:#222; text-align:center; border-right:#222 solid 1px; border-bottom:#222 solid 1px;" id='fibre'>
			<?php foreach($option_val['items'] as $item_val){
                  if($item_val['macro_nut']=='FIBRE')
				  {
					     if($item_val['calc_base']=='gms' || $item_val['calc_base']=='Ml')
						  {
							  echo $item_val['amount'] * $item_val['gm_ml_meas'].' ';
						  }
						  else if($item_val['calc_base']=='cup' || $item_val['calc_base']=='Cup cooked')
						  {
							  $vals = $item_val['amount'] * $item_val['cup_meas'];
						      echo decimal_to_fraction($vals).' ';
						  }
						  else if($item_val['calc_base']=='Number' || $item_val['calc_base']=='Tbsp' || $item_val['calc_base']=='Tsp' || $item_val['calc_base']=='Pint' || $item_val['calc_base']=='Glass' || $item_val['calc_base']=='slice' || $item_val['calc_base']=='pieces' || $item_val['calc_base']=='slices' || $item_val['calc_base']=='rotis' || $item_val['calc_base']=='rings' || $item_val['calc_base']=='cookies' || $item_val['calc_base']=='biscuits')
						  {
							  $vals = $item_val['amount'] * $item_val['number_meas'];
						      echo decimal_to_fraction($vals).' ';
						  }
						  
							  echo ($item_val['calc_base']!='Number')? $item_val['calc_base'].' of ':' ';
							  echo  $item_val['food_item'].'<br>'; 
				  }
			}?>
			 </td>
			<?php } ?>
			<?php if($option_val['items']['nut_count']==3){ ?>
            <td style="font-size:23px;font-weight:300; color:#222; text-align:center; border-right:#222 solid 1px; border-bottom:#222 solid 1px;" id='carbspf' colspan='3'>
			<?php foreach($option_val['items'] as $item_val){
                  if($item_val['exchange']=='')
				  {
					  if($item_val['calc_base']=='gms' || $item_val['calc_base']=='Ml')
					  {
						  echo $item_val['amount'] * $item_val['gm_ml_meas'].' ';
					  }
					  else if($item_val['calc_base']=='cup' || $item_val['calc_base']=='Cup cooked')
					  {
						  $vals = $item_val['amount'] * $item_val['cup_meas'];
						  echo decimal_to_fraction($vals).' ';
					  }
					  else if($item_val['calc_base']=='Number' || $item_val['calc_base']=='Tbsp' || $item_val['calc_base']=='Tsp' || $item_val['calc_base']=='Pint' || $item_val['calc_base']=='Glass' || $item_val['calc_base']=='slice' || $item_val['calc_base']=='pieces' || $item_val['calc_base']=='slices' || $item_val['calc_base']=='rotis' || $item_val['calc_base']=='rings' || $item_val['calc_base']=='cookies' || $item_val['calc_base']=='biscuits')
					  {
						  $vals = $item_val['amount'] * $item_val['number_meas'];
						  echo decimal_to_fraction($vals).' ';
					  }
					  
						  echo ($item_val['calc_base']!='Number')? $item_val['calc_base'].' of ':' ';
						  echo  $item_val['food_item'].'<br>';
					   
				  }
				  if($item_val['exchange']!='')
				  {
					 
						 echo $item_val['text_exchange'];
					
				  }
				  
			}?>
			</td>			
			<?php }?>			<td style="font-size:19px;font-weight:300; color:#222; text-align:center; border-right:#222 solid 1px; border-bottom:#222 solid 1px;">				<?php echo $option_val['items']['tot_prot'];?>			</td>			<td style="font-size:19px;font-weight:300; color:#222; text-align:center; border-right:#222 solid 1px; border-bottom:#222 solid 1px;">				<?php echo $option_val['items']['tot_fat'];?>			</td>			<td style="font-size:19px;font-weight:300; color:#222; text-align:center; border-right:#222 solid 1px; border-bottom:#222 solid 1px;">				<?php echo $option_val['items']['tot_carb'];?>			</td>			<td style="font-size:19px;font-weight:300; color:#222; text-align:center; border-right:#222 solid 1px; border-bottom:#222 solid 1px;">				<?php echo $option_val['items']['tot_kcal'];?>			</td>
          </tr>
		  <?php } ?>
		  <?php if($meal['notes'] !='') { ?>
          <tr>
            <td colspan="9" style="font-size:23px; color:#000;  text-align:left; padding:20px;"><span style="font-weight:600;">NOTES:</span>
              <br />
             <span style="font-weight:300;"><?php echo $meal['notes'];?></span>
			</td>
          </tr>
		  <?php } ?>
		  <tr style="background-color:#fff;">
		    <td style="height:40px;" colspan='9'>&nbsp;</td>
		  </tr>
        </tbody>
      </table></td>
  </tr>
  <?php } ?>
</table>

    <table width="1273" border="0" cellspacing="0" cellpadding="0" style="width:1273px; margin:0 auto; font-family:'Open Sans', sans-serif;">
		<tr>
			<td height="30px">&nbsp;</td>
		</tr>
		<tr>
			<td><table width="90%" border="0" cellspacing="0" cellpadding="0" style="margin:0 auto;">
				<tbody>
				  <tr>
					<td style="border-bottom:#ACACAC solid 1px; text-align:center; font-size:30px; text-transform:uppercase; color:#000;"> The Nutritional Value of your diet chart </td>
				  </tr>
				</tbody>
			  </table></td>
		  </tr>
		  <tr>
			<td style="height:30px;"></td>
		  </tr>
		  <tr>
			<td><table width="80%" border="0" cellspacing="0" cellpadding="0" style="background-color:#fff; margin:0 auto; border-radius:4px;">
				<tbody>
				  <tr style="background-color:#fff;">
					<td style="background-color:#fff; text-align:center; color:#000; font-size:26px; font-weight:600; height:40px; font-style:italic; border-radius:4px 0px 0px 0px; border-bottom:#222 solid 1px;"> Calories</td>
					<td style="background-color:#fff; text-align:center; color:#000; font-size:26px; font-weight:600; font-style:italic; border-bottom:#222 solid 1px;"> Proteins</td>
					<td style="background-color:#fff; text-align:center; color:#000; font-size:26px; font-weight:600;  font-style:italic; border-bottom:#222 solid 1px;"> Fats</td>
					<td style="background-color:#fff; text-align:center; color:#000; font-size:26px; font-weight:600;  font-style:italic; border-bottom:#222 solid 1px;"> Carbs</td>
					<td style="background-color:#fff; text-align:center; color:#000; font-size:26px; font-weight:600;  font-style:italic; border-bottom:#222 solid 1px; border-radius:0px 4px 0px 0px;"> Calcium</td>
				  </tr>
				  <tr>
					<td style="text-align:center; color:#222; font-size:23px; font-weight:700; height:35px;"><?php echo $intake_chart['calories'];?> kcal</td>
					<td style="text-align:center; color:#222; font-size:23px; font-weight:700;"><?php echo $intake_chart['protein'];?> g</td>
					<td style="text-align:center; color:#222; font-size:23px; font-weight:700;"><?php echo $intake_chart['fats'];?> g</td>
					<td style="text-align:center; color:#222; font-size:23px; font-weight:700;"><?php echo $intake_chart['carbs'];?> g</td>
					<td style="text-align:center; color:#222; font-size:23px; font-weight:700;"><?php echo $intake_chart['calcium'];?> g</td>
				  </tr>
				</tbody>
			  </table></td>
		  </tr>

    </table>

<?php if($exercise_stat=='true'){?>
<pagebreak />
<h1></h1>
<table width="1273" border="0" cellspacing="0" cellpadding="0" style="width:1273px; margin:0 auto; font-family:'Open Sans', sans-serif;">
<tr>
    <td><img src="<?php echo base_url();?>assets/images/logo.png" /></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td style="background-color:#fff; height:70px; width:100px; border-right:#222 solid 4px; border-left:#222 solid 2px; border-top:#222 solid 2px; border-bottom:#222 solid 2px; text-align:center;"><img src="<?php echo base_url();?>assets/images/runnig_01.png" /></td>
          <td style="background-color:#fff; height:70px; line-height:70px; padding-left:50px; font-size:33px; color:#000; font-weight:bold; border-top:#222 solid 2px; border-right:#222 solid 2px; border-bottom:#222 solid 2px;"> Exercise Schedule </td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td style="height:10px;">&nbsp;</td>
  </tr>
  <tr>
   <td>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="8%" style="color:#000; text-transform:uppercase; font-size:26px; vertical-align:bottom; font-weight:600;">Name</td>
                <td style="height:50px;" width="4%">&nbsp;</td>
                <td width="48%" style="border-bottom:#222 solid 1px;font-size:26px; font-weight:400;"><?php echo $main['first_name'];?></td>
                <td width="4%">&nbsp;</td>
                <td width="8%" style="color:#000; text-transform:uppercase; font-size:26px; vertical-align:bottom; font-weight:600;">Age</td>
                <td width="4%">&nbsp;</td>
                <td width="20%" style="border-bottom:#222 solid 1px;font-size:26px; font-weight:400;"><?php echo $main['age'];?></td>
                <td width="7%">&nbsp;</td>
              </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td style="height:20px;" colspan="3">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="3" style="color:#000; text-transform:uppercase; font-size:26px;font-weight:600;">Instructions</td>
              </tr>
              <tr>
                <td width="43%" valign="top" style="font-size:26px;font-weight:400; color:#222; line-height:33px; padding-top:10px;"> 1. It is advisable to change your sports sheos every year, <br/>
                  <br/>
                  2. For best result, do low impact cardio on empty stomach. <br />
                  <br/>
                  3. Do not eat any solid food within half hour of finishing the work-out. </td>
                <td width="6%">&nbsp;</td>
                <td width="51%" valign="top" style="font-size:26px;font-weight:400; color:#222; line-height:33px; padding-top:10px;"> 4. If you tend to get dizzy or have a tedency of low blood pressure, please have a carb drink before or after th work-out. <br/>
                  <br/>
                  5.High carb drink(&#8593; CD) = 1 glass nimbu pani (200ml of water with 2 tsp of sugar and pinch of salt and lime) or 250ml of Gatorade or Enerzal. </td>
              </tr>
              <tr>
                <td style="height:20px;" colspan="3">&nbsp;</td>
              </tr>
            </table>
			
			              
							<?php  $exercises = json_decode($exercise['exercises'],true);
							       $anytime = json_decode($exercise['exercise_anytime'],true);
							    
							    foreach($exercises as $keys=>$vals){
							 ?> 
							     <table width="250px" border="0" cellspacing="0" cellpadding="0" style="border:#222 solid 1px; width:250px; border-bottom:none; margin-top:20px;">
									  <tbody>
										<tr>
										  <td style="height:40px; text-align:center; border-right:#222 solid 1px;width:70px;">
											<img src="<?php echo base_url();?>assets/images/exercise_<?php echo $keys;?>.png" width="30" height="30" alt=""/></td>
										  <td  style="padding-left:10px;font-size:26px; font-weight:600;width:180px;"><?php echo $exrcise_timing[$keys];?></td>
										</tr>
									  </tbody>
								 </table>
								<table width="1273" border="0" cellspacing="0" cellpadding="0" style="border:#444 solid 1px; border-radius:3px; border-bottom:none; width:1273px;">
								 <tr>
									<td  width="35%" style="text-transform:uppercase; font-size:24px; height:30px; text-align:center; font-weight:600; border-right:#000 solid 1px; border-bottom:#000 solid 1px;width:35% !important;"> Type of exercise </td>
									<td width="15%" style="text-transform:uppercase; font-size:24px; height:30px; text-align:center; font-weight:600; border-right:#000 solid 1px; border-bottom:#000 solid 1px;width:15% !important;">Duration</td>
								   
									<td width="50%" style="text-transform:uppercase; font-size:24px; height:30px; text-align:center; font-weight:600; border-bottom:#000 solid 1px;width:50% !important;">Remarks</td>
								  </tr>
								  <?php foreach($vals['items'] as $kk=>$vv){?>
								  <tr>
									<td width="35%"  style="border-right:#444 solid 1px; border-bottom:#444 solid 1px; height:30px; color:#222; font-size:26px; font-weight:400; text-align:center;width:35% !important;"><?php echo $vv['exercise_name'];?></td>
									<td width="15%"  style="border-right:#444 solid 1px; border-bottom:#444 solid 1px; height:30px; color:#222; font-size:26px; font-weight:400; text-align:center;width:15% !important;"><?php echo $vv['duration'];?></td>
									
									<td width="50%" style=" border-bottom:#444 solid 1px; height:50px; color:#222; font-size:26px; font-weight:400; text-align:center;width:50% !important;">&nbsp;</td>
								  </tr>
								  <?php }?>							  
								</table>
							<?php } ?>	
							  
                                 <table width="250px" border="0" cellspacing="0" cellpadding="0" style="border:#222 solid 1px; width:250px; border-bottom:none; margin-top:20px;">
									  <tbody>
										<tr>
										  <td  style="height:40px; text-align:center; border-right:#222 solid 1px;width:70px;">
										  
											<img src="<?php echo base_url();?>assets/images/all_time_01.png" width="30" height="30" alt=""/></td>
										  <td style="padding-left:10px; font-size:26px;font-weight:600;width:180px;">Anytime</td>
										</tr>
									  </tbody>
								 </table>
								<table width="1273" border="0" cellspacing="0" cellpadding="0" style="border:#444 solid 1px; border-radius:3px; border-bottom:none;width:1273px;">
								 <tr>
									<td  style="text-transform:uppercase; font-size:24px; font-weight:600; height:30px; text-align:center;  border-right:#000 solid 1px; border-bottom:#000 solid 1px;width:35%;"> Toning Exercises </td>
									<td  style="text-transform:uppercase; font-size:24px; font-weight:600; height:30px; text-align:center; border-right:#000 solid 1px; border-bottom:#000 solid 1px;width:15%;">Repetition</td>
								   
									<td style="text-transform:uppercase; font-size:24px; font-weight:600; height:30px; text-align:center; border-bottom:#000 solid 1px;width:50%;">Remarks</td>
								  </tr>
								  <?php foreach($anytime as $keya=>$vala){?>
								  <tr ng-repeat="anyex in dietchart.exercise.exercise_anytime track by $index">
									<td  style="border-right:#444 solid 1px; border-bottom:#444 solid 1px; height:30px; color:#222; font-size:26px; font-weight:400; text-align:center;width:35%;"><?php echo $vala['exercise_name'];?></td>
									<td  style="border-right:#444 solid 1px; border-bottom:#444 solid 1px; height:30px; color:#222; font-size:26px; font-weight:400; text-align:center;width:15%;"><?php echo $vala['repetition'];?></td>									
									<td  style=" border-bottom:#444 solid 1px; height:50px; color:#222; font-size:26px; font-weight:400; text-align:center;width:50%;">&nbsp;</td>
								  </tr>
                                  <?php } ?>									  
								</table>
   </td>
  </tr>
   <tr><td height="50px"></td></tr>
    
 </table>
 
	                           <table width="1273" border="0" cellspacing="0" cellpadding="0" style="width:1273px; margin:0 auto; font-family:'Open Sans', sans-serif;">
									<tr>
										<td><table width="90%" border="0" cellspacing="0" cellpadding="0" style="margin:0 auto;">
											<tbody>
											  <tr>
												<td style="border-bottom:#ACACAC solid 1px; text-align:center; font-size:30px; text-transform:uppercase; color:#000;"> Weekly Analysis </td>
											  </tr>
											</tbody>
										  </table></td>
									  </tr>
									  <tr>
										<td style="height:30px;"></td>
									  </tr>
									  <tr>
										<td><table width="90%" border="0" cellspacing="0" cellpadding="0" style="background-color:#fff; margin:0 auto; border-radius:4px;">
											<tbody>
											  <tr style="background-color:#fff;">
												<td style="background-color:#fff; text-align:center; color:#000; font-size:26px; font-weight:600; height:40px; font-style:italic; border-radius:4px 0px 0px 0px; border-bottom:#222 solid 1px;width:15%;"> Total CD</td>
												<td style="background-color:#fff; text-align:center; color:#000; font-size:26px; font-weight:600; height:40px; font-style:italic; border-bottom:#222 solid 1px;width:15%;"> Ex Def</td>
												<td style="background-color:#fff; text-align:center; color:#000; font-size:26px; font-weight:600; height:40px; font-style:italic; border-bottom:#222 solid 1px;width:15%;"> Total C Loss</td>
												<td style="background-color:#fff; text-align:center; color:#000; font-size:26px; font-weight:600; height:40px; font-style:italic; border-bottom:#222 solid 1px;width:15%;"> W.L</td>
												<td style="background-color:#fff; text-align:center; color:#000; font-size:26px; font-weight:600; height:40px; font-style:italic; border-bottom:#222 solid 1px; border-radius:0px 4px 0px 0px;width:20%;"> Program (in gms)</td>
												<td style="background-color:#fff; text-align:center; color:#000; font-size:26px; font-weight:600; height:40px; font-style:italic; border-bottom:#222 solid 1px; border-radius:0px 4px 0px 0px;width:20%;"> Exp. No. of Weeks</td>
											  </tr>
											  <tr>
												<td style="text-align:center; color:#222; font-size:23px; font-weight:700; height:35px;width:15%;"><?php echo $exercise['total_cd'];?> </td>
												<td style="text-align:center; color:#222; font-size:23px; font-weight:700; height:35px;width:15%; "><?php echo $exercise['tot_ex_def'];?> </td>
												<td style="text-align:center; color:#222; font-size:23px; font-weight:700; height:35px;width:15%; "><?php echo $exercise['total_closs'];?> </td>
												<td style="text-align:center; color:#222; font-size:23px; font-weight:700; height:35px;width:15%; "><?php echo $exercise['weight_loss'];?> </td>
												<td style="text-align:center; color:#222; font-size:23px; font-weight:700; height:35px;width:20%; "><?php echo $exercise['program'];?> </td>
												<td style="text-align:center; color:#222; font-size:23px; font-weight:700; height:35px;width:20%; "><?php echo $exercise['exno_of_weeks'];?> </td>
											  </tr>
											  <tr><td  colspan="6" style="font-size:26px; font-weight:bold; height:40px;">- Diet & Exercise should be followed for <?php echo $exercise['exno_of_days'];?> days.</td></tr>
											</tbody>
										  </table></td>
									  </tr>
									  <tr><td height="50px;"></td></tr>
									  
								</table>

<?php } ?> 