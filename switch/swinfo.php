<?php                               //Подключить зависимости
include "../lib/settings.php";
include "../lib/header.php";
include "../lib/sidebar.php";
include "../lib/topbar.php";
include "./getstat.php";
?>
<?php
$sql = "SELECT * FROM switch WHERE swname = '"  . $_GET["id"] . "'";    //получить данные из таблицы коммутаторов
$sql1 = "SELECT * FROM swcomment WHERE swname = '" . $_GET["id"] . "'";  //получить данные из таблицы комментариев

if($result = mysqli_query($con,$sql)){
    $result1 = mysqli_query($con,$sql1);
    $row = mysqli_fetch_assoc($result);  //получить первую строку из таблицы коммутаторов
                                            //далее форма для комментария
    echo '<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Коммутатор: ' . $_GET["id"] . ' ip: ' . $row["swip"] .'</h6><br>
        <h6 class="m-0 font-weight-bold text-primary">' . getsnmpdescr($row["swip"], $row["swcommunity"]) . '</h6>
    </div>
    <div class="card-body">
    <div class="table-responsive">
    <form method="post" name="switch" action="/switch/swcoment.php?id=' . $_GET["id"] . '">
        <table class="table table-bordered" width="100%" cellspacing="0">
           <tbody><tr>
              <th>No</th>
              <th>Комментарий</th>
              <th>...</th>
           </tr>
           <tr>
        <td><input name="port_num" value="" size="3" type="text"></td>
        </div>
        <td><input name="port_description" size="80%" value=""></td>
        <td><input value="Установить" name="submit" type="submit"></td>
        </tr>
        </tbody></table>
        </form>





    <table class="table table-bordered" width="100%" cellspacing="0">
    <thead><tr>
    <th> Порт</th>
    <th> Комментарий </th>
    <th>Статус</th>
    </tr></thead><tbody>';
        
        $sw_addr = $row["swip"];
        $sw_community = $row["swcommunity"];
    //получить данные
    for ( $j = 1; $j <= $row["swports"]; $j++ ){
        $row1 = mysqli_fetch_assoc($result1);
        $i = $row1["swport"];
        $comment[$i]= $row1["comment"];
        $portstatus[$j] = getsnmpstatus($sw_addr, $sw_community, $j);
        $portspeed[$j] = getsnmpspeed($sw_addr, $sw_community, $j);
        }
    }
    //вывод данных
    for ( $i = 1; $i <= $row["swports"]; $i++ ){
        echo '<tr><td id="port_names_num_' . $i . '"><a id="edit_port_button_' . $i .'" title="Редактировать">' . $i . '</a></td>';
        echo '<td id="port_names_description_' . $i . '"><a id="edit_port_button_' . $i .'" title="Редактировать">';
            echo (tagsToLinks($comment[$i]) . "</a></td>");
            if ( $portstatus[$i] == 1 ){     //красим ячейку если порт поднят
                $portstatus[$i] = 'class="bg-success"';
            } else { $portstatus[$i] = '';};
            echo '<td ' . $portstatus[$i] . '><a id="edit_port_button_' . $i .'" title="Редактировать">' . $portspeed[$i] . '</a></td>';
        echo "</tr>";
        }
    echo "</table>";
?>

<script type="text/javascript" defer="defer">
$(document).ready(function(){

	$("#edit_ports_button").click(
	    function(event){
	       $("#edit_ports_loading").html("<b>Загрузка...</b>");
	       $("#ports_configuration").load($(this).attr("href"));
	       return false;
	    });
    /* Кнопка "Изменить" в свойствах порта */
      $("a[id^='edit_port_button_']").click( function() {
	 var num = this.id.replace("edit_port_button_", "");
	 var description = $("#port_names_description_" + num).html();

     $("input[name='port_num']:first").val(num);
	 $("input[name='port_description']:first").val(description.replace(/(<([^>]+)>)/gi, ''));
	 return false;
	 });
});
</script>




<?php
include  "../lib/footer.php";
?>