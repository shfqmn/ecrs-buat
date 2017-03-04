<script>
    ip = <?= isset($input)? count($input['problem']):1 ?>;
    is = <?= isset($input)? count($input['sick']):1 ?>;

    $(
        function () {
            $('#addProblemBtn').click(function () {
                $('#problems').find('.collapse.in').collapse({
                    parent: '#problems',
                    toggle: true
                });
                $('#problems').find('.collapse.in').collapse('toggle');
                $('#problems').append($.parseHTML('<div class="panel panel-default"><div class="panel-heading"><h4 class="panel-title"><a data-toggle="collapse" data-parent="#problems" href="#problem' + ip + '">Perkara/Isu ' + (ip + 1) + '<span class="glyphicon glyphicon-plus"></a></h4></div><div id="problem' + ip + '" class="panel-collapse collapse in"><div class="panel-body"><div class="form-group"><label for="problem[' + ip + '][details]">Perkara/Isu :</label><input type="text" class="form-control" id="problem[' + ip + '][details]" name="problem[' + ip + '][details]"></div><div class="form-group"><label for="problem[' + ip + '][timePlace]">Tarikh,Masa,Tempat :</label><input type="text" class="form-control" id="problem[' + ip + '][timePlace]" name="problem[' + ip + '][timePlace]"></div><div class="form-group"><label for="problem[' + ip + '][action]">Tindakan :</label><input type="text" class="form-control" id="problem[' + ip + '][action]" name="problem[' + ip + '][action]"></div><div class="form-group"><label for="problem[' + ip + '][notes]">Cacatan :</label><input type="text" class="form-control" id="problem[' + ip + '][notes]" name="problem[' + ip + '][notes]"></div></div></div></div>'));

                ip++;
            });

            $('#addSickBtn').click(function () {
                $('#sicks').find('.collapse.in').collapse({
                    parent: '#sicks',
                    toggle: true
                });
                $('#sicks').find('.collapse.in').collapse('toggle');
                $('#sicks').append($.parseHTML('<div class="panel panel-default"> <div class=panel-heading> <h4 class=panel-title> <a data-toggle=collapse data-parent=#sicks href="#sick'+is+'">Pelajar Sakit '+(is+1)+'<span class="glyphicon glyphicon-plus"></a> </h4> </div> <div id=sick'+is+' class="panel-collapse collapse in"> <div class=panel-body> <div class=form-group> <label for="sick['+is+'][datetime]">Tarikh,Masa :</label> <div class="input-group date" id="sickdatetime'+is+'"> <input class=form-control id="sick['+is+'][datetime]" name="sick['+is+'][datetime]"/> <span class=input-group-addon>  <span class="glyphicon glyphicon-calendar"></span></span></div></div><div class=form-group> <label for="sick['+is+'][name]">Nama :</label> <input class=form-control id="sick['+is+'][name]" name="sick['+is+'][name]"> </div> <div class=form-group> <label for="sick['+is+'][ic]">No K/P :</label> <input class=form-control id="sick['+is+'][ic]" name="sick['+is+'][ic]"> </div> <div class=form-group> <label for="sick['+is+'][homeAddress]">Alamat (R) :</label> <input class=form-control id="sick['+is+'][homeAddress]" name="sick['+is+'][homeAddress]"> </div> <div class=form-group> <label for="sick['+is+'][studentNo]">No.Pelajar :</label> <input class=form-control id="sick['+is+'][studentNo]" name="sick['+is+'][studentNo]"> </div> <div class=form-group> <label for="sick['+is+'][tel]">No. Tel. :</label> <input class=form-control id="sick['+is+'][tel]" name="sick['+is+'][tel]"> </div> <div class=form-group> <label for="sick['+is+'][collegeAddress]">Alamat Kolej :</label> <input class=form-control id="sick['+is+'][collegeAddress]" name="sick['+is+'][collegeAddress]"> </div> <div class=form-group> <label for="sick['+is+'][courseCode]">Kod Khusus :</label> <input class=form-control id="sick['+is+'][courseCode]" name="sick['+is+'][courseCode]"> </div> <div class=form-group> <label for="sick['+is+'][notes]">Laporan :</label> <input class=form-control id="sick['+is+'][notes]" name="sick['+is+'][notes]"> </div> </div> </div> </div>'));

                $('#sickdatetime'+is).datetimepicker({
                    format: 'DD/MM/YYYY h:mm A'

                });
                is++;
            });
            $('#reportDate').datetimepicker({
                format : 'MMMM, YYYY',
                defaultDate :  moment($('#reportDate').find('input').val(), 'MMMM, YYYY').toDate()
            });
            
        });
</script>

<div class="container">
    <h2>Add Report</h2>
    <?= $this->Form->create(); ?>
    <div class="form-group">
        <label>Bulan Laporan :</label>
        <div class='input-group date' id='reportDate'>
            <input type='text' name="reportDate" class="form-control" value="<?= $input['reportDate']?>"/>
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>
    </div>

    <div class="form-group">
        <label for="workingDates">Tarikh Bertugas :</label>
        <input type="text" class="form-control" id="workingDates" name="workingDates" value="<?= $input['workingDates']?>">
    </div>
    <div class="form-group">
        <label for="workingTimes">Masa Bertugas :</label>
        <input type="text" class="form-control" id="workingTimes" name="workingTimes" value="<?= $input['workingTimes']?>">
    </div>
    <h2>Borang Laporan Bulanan PPP / Pegawai / Staf </h2>
    <div class="panel-group" id="problems">

        <?php foreach($input['problem'] as $i=>$problem){?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#problems" href="#problem<?= $i ?>">Perkara/Isu <?= $i+1 ?> <span class="glyphicon glyphicon-plus"></span></a>
                </h4>
            </div>
            <div id="problem<?= $i ?>" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="problem[<?= $i ?>][details]">Perkara/Isu :</label>
                        <input type="text" class="form-control" id="problem[<?= $i ?>][details]" name="problem[<?= $i ?>][details]" value="<?= $problem['details']?>">
                    </div>
                    <div class="form-group">
                        <label for="problem[<?= $i ?>][timePlace]">Tarikh,Masa,Tempat :</label>
                        <input type="text" class="form-control" id="problem[<?= $i ?>][timePlace]" name="problem[<?= $i ?>][timePlace]" value="<?= $problem['timePlace']?>">
                    </div>
                    <div class="form-group">
                        <label for="problem[<?= $i ?>][action]">Tindakan :</label>
                        <input type="text" class="form-control" id="problem[<?= $i ?>][action]" name="problem[<?= $i ?>][action]" value="<?= $problem['action']?>">
                    </div>
                    <div class="form-group">
                        <label for="problem[<?= $i ?>][notes]">Cacatan :</label>
                        <input type="text" class="form-control" id="problem[<?= $i ?>][notes]" name="problem[<?= $i ?>][notes]" value="<?= $problem['notes']?>">
                    </div>
                </div>
                <input type="hidden" name="problem[<?= $i ?>][id]" value="<?= $problem['id'] ?>">
            </div>
        </div>
        <?php } ?>
    </div>
    <button type="button" class="btn btn-default" id="addProblemBtn">Add Row</button>


    <h2>Laporan Pelajar Sakit </h2>
    <div class="panel-group" id="sicks">
        <?php foreach($input['sick'] as $i=>$sick){?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#sicks" href="#sick<?= $i ?>">Pelajar Sakit <?= $i+1 ?> <span class="glyphicon glyphicon-plus"></span></a>
                </h4>
            </div>
            <div id="sick<?= $i ?>" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="sick[<?= $i ?>][datetime]">Tarikh,Masa :</label>
                        <div class='input-group date' id="sickdatetime<?= $i ?>">
                            <input type='text' class="form-control" id="sick[<?= $i ?>][datetime]" name="sick[<?= $i ?>][datetime]" value="<?= is_string($sick['datetime'])? $sick['datetime']:$sick['datetime']->i18nFormat('dd/MM/YYYY h:mm a');?>"/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                            <script type="text/javascript">
                                eval('$("#sickdatetime<?= $i ?>").datetimepicker({format:"DD/MM/YYYY h:mm A",defaultDate:moment($("#sickdatetime<?= $i ?>").find("input").val(),"DD/MM/YYYY h:mm A").toDate()});');
                            </script>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sick[<?= $i ?>][name]">Nama :</label>
                        <input type="text" class="form-control" id="sick[<?= $i ?>][name]" name="sick[<?= $i ?>][name]" value="<?= $input['sick'][$i]['name']?>">
                    </div>
                    <div class="form-group">
                        <label for="sick[<?= $i ?>][ic]">No K/P :</label>
                        <input type="text" class="form-control" id="sick[<?= $i ?>][ic]" name="sick[<?= $i ?>][ic]" value="<?= $input['sick'][$i]['ic']?>">
                    </div>
                    <div class="form-group">
                        <label for="sick[<?= $i ?>][homeAddress]">Alamat (R) :</label>
                        <input type="text" class="form-control" id="sick[<?= $i ?>][homeAddress]" name="sick[<?= $i ?>][homeAddress]" value="<?= $input['sick'][$i]['homeAddress']?>">
                    </div>
                    <div class="form-group">
                        <label for="sick[<?= $i ?>][studentNo]">No.Pelajar :</label>
                        <input type="text" class="form-control" id="sick[<?= $i ?>][studentNo]" name="sick[<?= $i ?>][studentNo]" value="<?= $input['sick'][$i]['studentNo']?>">
                    </div>
                    <div class="form-group">
                        <label for="sick[<?= $i ?>][tel]">No. Tel. :</label>
                        <input type="text" class="form-control" id="sick[<?= $i ?>][tel]" name="sick[<?= $i ?>][tel]" value="<?= $input['sick'][$i]['tel']?>">
                    </div>
                    <div class="form-group">
                        <label for="sick[<?= $i ?>][collegeAddress]">Alamat Kolej :</label>
                        <input type="text" class="form-control" id="sick[<?= $i ?>][collegeAddress]" name="sick[<?= $i ?>][collegeAddress]" value="<?= $input['sick'][$i]['collegeAddress']?>">
                    </div>
                    <div class="form-group">
                        <label for="sick[<?= $i ?>][courseCode]">Kod Khusus :</label>
                        <input type="text" class="form-control" id="sick[<?= $i ?>][courseCode]" name="sick[<?= $i ?>][courseCode]" value="<?= $input['sick'][$i]['courseCode']?>">
                    </div>
                    <div class="form-group">
                        <label for="sick[<?= $i ?>][notes]">Laporan :</label>
                        <input type="text" class="form-control" id="sick[<?= $i ?>][notes]" name="sick[<?= $i ?>][notes]" value="<?= $input['sick'][$i]['notes']?>">
                    </div>
                    <input type="hidden" name="sick[<?= $i ?>][id]" value="<?= $sick['id'] ?>">
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <button type="button" class="btn btn-default" id="addSickBtn">Add Row</button>

    <?= $this->Form->button(__('Submit'),['class'=>'btn btn-default']) ?>
    <?= $this->Form->end() ?>
</div>