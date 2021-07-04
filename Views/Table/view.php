
   
<select class="mdb-select md-form">
<?foreach ( $corpList  as $corpList ):
    $auditList = Table::getAuditList();?>
    <optgroup label="<?echo $corpList['Наименование_корпуса']?>">
    <?foreach ( $auditList  as $auditList ):?>
     <?if ($auditList['ИД_корпуса'] == $corpList['ИД_корпуса'] ):?>
        <option data-corpId = "<?echo $corpList['ИД_корпуса']?>" value="<?echo $auditList['ИД_аудитории']?>"><?echo $auditList['Наименование_аудитории']?></option>
    <?endif;?>
    <? endforeach;?>
  </optgroup>
<? endforeach;?>

</select>
<label class="mdb-main-label">Example label</label>

</div>