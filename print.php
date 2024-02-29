<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru" dir="ltr">
<head>
<title>Наряд на устранение неисправности</title>
<style type="text/css">

body {
  font-family: 'Trebuchet MS', Verdana, Arial, 'Geneva CY', sans-serif;
  font-size: 10pt;
  margin: 5mm 0 5mm 10mm;
  width: 185mm;
}

#header {
   position: relative;
   left: 0;
   top: 0;
   height: 42mm;
   border-bottom: 1px dashed #CCCCCC;
   font-size: 10pt;
}

#header h4 {
   margin: 4px 0 0 0;
   font-weight: normal;
   overflow: hidden;
   font-size: 8pt;
}

#header > img {
   position: absolute;
   top: 0;
   left: 0;
   width: 120px;
}

#header_client {
   position: absolute;
   top: 0;
   left: 40mm;

   width: 70mm;
   height: 14mm;

   overflow: hidden;
}

#header_manager {
   position: absolute;
   top: 0;
   right: 0;

   width: 60mm;
   height: 14mm;

   overflow: hidden;
}

#header_address {
   position: absolute;
   top: 14.5mm;
   left: 40mm;

   width: 150mm;
   height: 9mm;
   font-weight: bold;
}

#header_description {
   position: absolute;

   top: 25mm;
   left: 40mm;

   width: 145mm;
   height: 14mm;

   font-style: italic;
   text-align: left;

   float: left;
}

#header_orderid {
   position: absolute;

   bottom: -1.4em;
   right: 0;

   border-bottom: 1px dashed #CCCCCC;
   border-left: 1px dashed #CCCCCC;

   font-size: 12pt;
   font-weight: bold;
}

#content {
   font-size: 10pt;
   line-height: 2em;
}

#content h3 {
   font-size: 10pt;
   font-style: normal;
   color: black;
   font-weight: bold;
   margin-bottom: 0;
}

.halfpage {
   width: 45%;
   float: left;
   margin-right: 0;
   margin-top: 2em;
   line-height: 1.5em;
}

.halfpage table {
   margin: 0;
   line-height: 1.5em;
   border-spacing: 0;
}

.halfpage table th {
   padding: 0;
   font-size: 10pt;
   font-weight: normal;
   text-align: right;
   min-width: 5em;
   padding-right: 0.5em;
}

.underscores {
   color: #CCCCCC;
}

table.lines {
   width: 100%;
   border-collapse: collapse;
   margin: 0 0 2em 0;
   padding: 0;
}

table.lines td {
   border-bottom: 1px solid #CCCCCC;
   height: 1.5em;
}

</style>
</head>
<body>

   <div id="header">
      <img src="../img/logo.png" alt="PROVIDER" width='120' height='120' />
      <div id="header_client">
	 <h4>Абонент:</h4>
	 &nbsp;&nbsp;<?php print_r ($_GET['name']);  print_r ($_GET['surName']); print_r ($_GET['secName'] . ", ");  print_r ($_GET['phone']) ?><br/>
      </div>
      <div id="header_address">
	    <h4>Адрес:</h4>
	    &nbsp;&nbsp; <?php print_r ($_GET['address']); ?> </div>
      <div id="header_manager">
	 <h4>Наряд выписал:</h4>
	 &nbsp;<?php print_r (date("Y-m-d H:i:s")); ?> &nbsp;Сотрудник технической поддержки     </div>
      <div id="header_description"> <?php print_r ($_GET['id'] . $_GET['comment']); ?> </div>

      <div id="header_orderid">
	 &#x2116; <?php print_r ($_GET['id'] . "&nbsp;&nbsp;" . $_GET['start']); ?>       </div>

   </div>

   <div id="content">
      <div class="halfpage">
	 <h3>Состав бригады</h3>
	 <table>
	    <tr><th>Аварийщик:</th><td class="underscores">___________________________</td></tr>
	    <tr><th>Аварийщик:</th><td class="underscores">___________________________</td></tr>
	 </table>
      </div>
      <div class="halfpage" style="float: right; width: 23em;">
	 <h3>Время работы</h3>
	 <table>
	    <tr><th>Время&nbsp;начала:</th><td class="underscores">__________________</td></tr>
	    <tr><th>Время&nbsp;завершения:</th><td class="underscores">__________________</td></tr>
	    <tr><th colspan='2' style="padding-top:
		  1em;">Затрачено:&nbsp;<span
		     class="underscores">___________</span>часов</th></tr>
	 </table>
      </div>
      <div style="clear: both;"></div>

      <h3>Причины аварии</h3>
      <table class="lines">
	 <tr><td></td></tr>
	 <tr><td></td></tr>
	 <tr><td></td></tr>
	 <tr><td></td></tr>
	 <tr><td></td></tr>
      </table>

      <h3>Выполненные работы</h3>
      <table class="lines">
	 <tr><td></td></tr>
	 <tr><td></td></tr>
	 <tr><td></td></tr>
	 <tr><td></td></tr>
	 <tr><td></td></tr>
	 <tr><td></td></tr>
	 <tr><td></td></tr>
	 <tr><td></td></tr>
	 <tr><td></td></tr>
      </table>

      <h3>Что предпринято воизбежание повторения в дальнейшем</h3>
      <table class="lines">
	 <tr><td></td></tr>
      </table>

      <h3>Работы произвел</h3>
      <p>
	 Дата
	    &nbsp;<span class="underscores">___________________</span>
         &nbsp;&nbsp;&nbsp;Подпись&nbsp;сотрудника
            &nbsp;<span class="underscores">_________</span>
      </p>
      <h3>Наряд принят</h3>
      <p>
        Дата
           &nbsp;<span class="underscores">___________________</span>
	 &nbsp;&nbsp;&nbsp;Подпись&nbsp;абонента/оператора
	   &nbsp;<span class="underscores">____________</span>
      </p>
   </div>

</body>
</html>