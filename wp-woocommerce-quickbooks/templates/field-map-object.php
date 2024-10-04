<?php
if ( ! defined( 'ABSPATH' ) ) {
     exit;
 }                                               
 ?><div id="crm_fields_map" class="vx_contents">        
  <div class="vx_div ">
  <div class="vx_head ">
<div class="crm_head_div"> <?php esc_html_e('2. Select QuickBooks Object',  'wp-woocommerce-quickbooks' ); ?></div>
<div class="crm_btn_div"><i class="fa crm_toggle_btn fa-minus" title="<?php esc_html_e('Expand / Collapse','wp-woocommerce-quickbooks') ?>"></i></div>
<div class="crm_clear"></div> 
  </div>
  <div class="vx_group">
  <div class="vx_row">
  <div class="vx_col1">
  <label for="vxc_object"><?php esc_html_e('Select QuickBooks Object.', 'wp-woocommerce-quickbooks');  $this->tooltip($tooltips['sel_object']); ?></label>
  </div>
  <div class="vx_col2">
  <div>
  <select id="vxc_object" name="meta[object]" class="vx_sel" autocomplete="off">
  <?php
  $arr_temp=array('1'=>'Sales Receipt','2'=>'Estimate','3'=>'Credit Memo','4'=>'Refund Receipt','5'=>'Payment');
//  $modules=array_merge($modules,$arr_temp);
  $object_found=false;
  foreach($modules as $f_key=>$f_val){
  $select="";
  if($feed['object'] == $f_key){
  $select='selected="selected"';
  $object_found=true;
  }
  if(is_numeric($f_key)){
   $f_key=''; $select='disabled="disabled"'; $f_val.=' - (Premium Feature)';  
  }
  echo '<option value="'.esc_attr($f_key).'" '.$select.'>'.esc_html($f_val).'</option>';    
  }    
  ?>
  </select>
  </div>
      <?php
  if($api_type != "web"){  
  ?>
  <div class="vx_row">
  <button class="button" id="vx_refresh_objects" type="button" autocomplete="off" title="<?php esc_html_e('Refresh Objects','wp-woocommerce-quickbooks') ?>" style="vertical-align: baseline;">
  <span class="reg_ok"><i class="fa fa-refresh"></i> <?php esc_html_e('Refresh Objects','wp-woocommerce-quickbooks') ?></span>
  <span class="reg_proc"><i class="fa fa-refresh fa-spin"></i> <?php esc_html_e('Refreshing...','wp-woocommerce-quickbooks') ?></span>
  </button>
    <button class="button" id="vx_refresh_fields" type="button"  autocomplete="off" title="<?php esc_html_e('Refresh Fields','wp-woocommerce-quickbooks') ?>">
  <span class="reg_ok"><i class="fa fa-refresh"></i> <?php esc_html_e('Refresh Fields','wp-woocommerce-quickbooks') ?></span>
  <span class="reg_proc"><i class="fa fa-refresh fa-spin"></i> <?php esc_html_e('Refreshing...','wp-woocommerce-quickbooks') ?></span>
  </button>
  </div>
  <?php
  }
  ?>
  </div>
  <div class="clear"></div>
   </div>
   </div>
</div>


  <div id="crm_ajax_div" style="display:none; text-align: center; line-height: 100px;"><i><?php esc_html_e('Loading, Please Wait...', 'wp-woocommerce-quickbooks'); ?></i></div>
  <div id="vxc_error" class="crm_error"></div>
  <div id="crm_field_group" style="<?php if($feed['object'] == "" || !$object_found) {echo 'display:none';} ?>">
  <?php
if($object_found){
      $this->get_field_mapping($feed,$info); 
}
  ?>

  </div>
  
  </div>