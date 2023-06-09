<style type="text/css">
    .festivo{
        background-color: black;
    }
    
    .festivoparificato{
        background-color: gray;
    }
</style>   
<script type="text/javascript">
    var contextmenu_el;
    $(document).ready(function(){
        $.contextMenu({
            // define which elements trigger this menu
            selector: ".calendarioaziendale_giorno",
            // define the elements of the menu
            build: function(trigger, e) {
                contextmenu_el=trigger;
            },
            items: {
                    salvaPonte: {name: "Segna Ponte", callback: function(key, opt){ salvaPonte(contextmenu_el) }},
                    cancellaPonte: {name: "Cancella Ponte", callback: function(key, opt){ cancellaPonte(contextmenu_el) }},
            }
            // there's more, have a look at the demos and docs...
        });
    });
    
    
    function salvaPonte(el)
    {
        var input=$(el).find('.feriale').find('input');
        $(input).clone().attr('type','text').insertAfter(input).prev().remove();
    }
    
    function cancellaPonte(el)
    {
        var input=$(el).find('.feriale').find('input');
        $(input).clone().attr('type','number').insertAfter(input).prev().remove();
    }
</script>
<div id="calendarioaziendale" style="padding: 50px;" >
    <div style="font-size: 30px;float: left;margin-bottom: 10px;">
        <select onchange="ajax_calendarioaziendale(this,'<?=$recordid_azienda?>',$(this).val())">
            <?php
            for($i=2018;$i<2023;$i++)
            {
                if($i==$anno)
                {
                    $selected='selected="selected"';
                }
                else
                {
                    $selected='';
                }
            ?>
            <option <?=$selected?>><?=$i?></option>
            <?php
            }
            ?>
        </select>
    </div>
    <div style="font-size: 20px;margin-bottom: 10px;float: left;margin-left: 10px">
        <button onclick="ajax_salva_calendarioaziendale(this,'<?=$recordid_azienda?>','<?=$anno?>')">Salva</button>
    </div>
    <div style="font-size: 20px;margin-bottom: 10px;float: left;margin-left: 10px">
        <button onclick="">Stampa</button>
    </div>
    <div style="clear: both;"></div>
    <div style="font-size: 26px;font-weight: bolder;margin-bottom: 10px;">
        CALENDARIO AZIENDALE - <?=$ragionesociale?>
    </div>
    
    <form id="form_calendarioaziendale"   >
        
<?php
$mesi=$calendarioaziendale['mesi'];

foreach ($mesi as $key => $mese) {
    $border_right="";
    if($key==12)
    {
        $border_right="border-right:3px solid black;";
    }
?>
<div style="float: left; height: 90%;width: 7%;">
    <div style="width:100%;border: 3px solid black;border-right: 0px;<?=$border_right?>">
        <?=$mese['nome']?>
    </div>
    <div>
        <?php
        for($i=0;$i<33;$i++){
                
            
                ?>
                <div class="calendarioaziendale_giorno" style="width:100%;border-left: 3px solid black;height: 20px;text-align: center;;<?=$border_right?> ">
                    <?php
                    if(array_key_exists($i, $mese['giorni']))
                    {
                    $giorno=$mese['giorni'][$i];
                    ?>
                        <div style="font-size: 12px;float: left;height: 100%;width: 30%;"><?=date('j', strtotime($giorno['data']))?></div>
                        <?php
                        if($giorno['tipogiorno']=='festivo')
                        {
                        ?>
                            <div style="background-color: #B2DAF3;height: 100%;width: 70%;float: left"></div>
                        <?php
                        }
                        ?>
                            
                        <?php
                        if($giorno['tipogiorno']=='festivoparificato')
                        {
                        ?>
                            <div style="background-color: OrangeRed;height: 100%;width: 70%;float: left"><?=$giorno['descrizione']?></div>
                        <?php
                        }
                        ?>
                            
                        <?php
                        if($giorno['tipogiorno']=='festivononparificato')
                        {
                        ?>
                            <div style="background-color: #dedede;height: 100%;width: 70%;float: left"><?=$giorno['descrizione']?></div>
                        <?php
                        }
                        ?>
                            
                        <?php
                        if($giorno['tipogiorno']=='feriale')
                        {
                        ?>
                            <div class="feriale" style="float: left;height: 100%;width: 70%;border-bottom: 1px solid black;">
                                <input type="number" name="giorno[<?=$giorno['recordid_']?>]"  style="font-size: 16px;width: 100%;height:100%;border: 0px;text-align: center;" value="<?=$giorno['ore']?>">
                            </div>
                        <?php
                        }
                        ?>
                        <div style="clear: both"></div>
                    <?php
                    }
                    ?>
                </div>
                <?php
            
        }
        ?>
    </div>
    
    <div style="text-align: center; width:100%;border: 3px solid black;border-right: 0px;<?=$border_right?>">
        <?=$mese['totore']?>
    </div>

    <div style="text-align: center; width:100%;border: 3px solid black;border-right: 0px;margin-top: 20px;<?=$border_right?>">
        <?=$mese['totgiorni']?>
    </div>

</div>
        <div>
        
    
<?php
}
?>
</form>
</div>