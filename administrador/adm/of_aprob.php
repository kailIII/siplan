<?php date_default_timezone_set('UTC'); ?>
<script src="SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
<div class="wrap">
<h2><span class="glyphicon glyphicon-list-alt"></span>&nbsp;Oficios de Aprobación</h2>
<br>
<div class="panel panel-default">
<div class="panel-heading"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;Oficios de Aprobación enviados a Finanzas</div>
<div class="panel-body">
<div id="TabbedPanels1" class="TabbedPanels">
  <ul class="TabbedPanelsTabGroup">
    <li class="TabbedPanelsTab" tabindex="0"><div style="font-size:12px;">C73</div></li>
    <li class="TabbedPanelsTab" tabindex="0"><div style="font-size:12px;">C74</div></li>
    <li class="TabbedPanelsTab" tabindex="0"><div style="font-size:12px;">C75</div></li>
    <li class="TabbedPanelsTab" tabindex="0"><div style="font-size:12px;">C76</div></li>
    <li class="TabbedPanelsTab" tabindex="0"><div style="font-size:12px;">C77</div></li>
  </ul>
<div class="TabbedPanelsContentGroup">
 <div class="TabbedPanelsContent">
   <?php require_once('c73_html.php');?>
</div>
    <div class="TabbedPanelsContent">
	<?php require_once('c74_html.php');?>
   </div>
    <div class="TabbedPanelsContent">
 <?php require_once('c75_html.php');?>
    </div>
    <div class="TabbedPanelsContent"><?php require_once('c76_html.php');?></div>
  <div class="TabbedPanelsContent"><?php require_once('c77_html.php');?>
    </div></div></div>


  </div>
</div>
</div>
<p>&nbsp;</p>
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script>
