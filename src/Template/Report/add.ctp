<div class="row">
    <script>
        ip = 1;
        is = 1;
        $(function() {
            $('#addProblemBtn').click(function() {
                $('#problems').find('.collapse.in').collapse({
                    parent: '#problems',
                    toggle: true
                });
                $('#problems').find('.collapse.in').collapse('toggle');
                $('#problems').append($.parseHTML('<div class="panel panel-default"><div class=panel-heading><h4 class=panel-title><a data-parent=#problems data-toggle=collapse href="#problem">Perkara/Isu ' + (ip + 1) + '<span class="glyphicon glyphicon-plus"></span></a></h4></div><div class="collapse in panel-collapse"id=problem><div class=panel-body><div class=form-group><label for="problem[' + ip + '][details]">Perkara/Isu :</label><input class=form-control id="problem[' + ip + '][details]"name="problem[' + ip + '][details]"></div><div class=form-group><label for="problem[' + ip + '][timePlace]">Tarikh & Masa :</label><div style=position:relative><input class=form-control id="problem[' + ip + '][datetime]"name="problem[' + ip + '][datetime]"></div></div><div class=form-group><label for="problem[' + ip + '][venue]">Venue :</label><input class=form-control id="problem[' + ip + '][venue]"name="problem[' + ip + '][venue]"></div><div class=form-group><label for="problem[' + ip + '][action]">Tindakan :</label><input class=form-control id="problem[' + ip + '][action]"name="problem[' + ip + '][action]"></div><div class=form-group><label for="problem[' + ip + '][notes]">Cacatan :</label><input class=form-control id="problem[' + ip + '][notes]"name="problem[' + ip + '][notes]"></div></div></div></div>'));
                $('#problem\\[' + ip + '\\]\\[datetime\\]').datetimepicker({
                    format: 'MMMM, YYYY',
                    viewMode: 'months'
                });
                ip++;
            });
            $('#addSickBtn').click(function() {
                $('#sicks').find('.collapse.in').collapse({
                    parent: '#sicks',
                    toggle: true
                });
                $('#sicks').find('.collapse.in').collapse('toggle');
                $('#sicks').append($.parseHTML('<div class="panel panel-default"><div class=panel-heading><h4 class=panel-title><a data-parent=#sicks data-toggle=collapse href="#sick' + is + '">Pelajar Sakit ' + (is + 1) + ' <span class="glyphicon glyphicon-plus"></span></a></h4></div><div class="collapse in panel-collapse"id="sick' + is + '"><div class=panel-body><div class=form-group><label for="sick[' + is + '][datetime]">Tarikh & Masa :</label><div style=position:relative><input class=form-control id="sick[' + is + '][datetime]"name="sick[' + is + '][datetime]"></div></div><div class=form-group><label for="sick[' + is + '][name]">Nama :</label><input class=form-control id="sick[' + is + '][name]"name="sick[' + is + '][name]"></div><div class=form-group><label for="sick[' + is + '][ic]">No K/P :</label><input class=form-control id="sick[' + is + '][ic]"name="sick[' + is + '][ic]"></div><div class=form-group><label for="sick[' + is + '][homeAddress]">Alamat (R) :</label><input class=form-control id="sick[' + is + '][homeAddress]"name="sick[' + is + '][homeAddress]"></div><div class=form-group><label for="sick[' + is + '][studentNo]">No.Pelajar :</label><input class=form-control id="sick[' + is + '][studentNo]"name="sick[' + is + '][studentNo]"></div><div class=form-group><label for="sick[' + is + '][tel]">No. Tel. :</label><input class=form-control id="sick[' + is + '][tel]"name="sick[' + is + '][tel]"></div><div class=form-group><label for="sick[' + is + '][collegeAddress]">Alamat Kolej :</label><input class=form-control id="sick[' + is + '][collegeAddress]"name="sick[' + is + '][collegeAddress]"></div><div class=form-group><label for="sick[' + is + '][courseCode]">Kod Khusus :</label><input class=form-control id="sick[' + is + '][courseCode]"name="sick[' + is + '][courseCode]"></div><div class=form-group><label for="sick[' + is + '][notes]">Laporan :</label><input class=form-control id="sick[' + is + '][notes]"name="sick[' + is + '][notes]"></div></div></div></div>'));
                $('#sick\\[' + is + '\\]\\[datetime\\]').datetimepicker({
                    format: 'DD/MM/YYYY h:mm A',
                    ignoreReadonly: true
                });
                is++;
            });
            $('#reportDate').datetimepicker({
                format: 'MMMM, YYYY',
                viewMode: 'months'
            });
            $('#workingDates').datepicker({
                format: 'd/m/yy',
                multidate: true
            });
        });

    </script>
    <div class="container">
        <h2>Add Report</h2>
        <?= $this->Form->create($report) ?>
            <div class="form-group">
                <label>Bulan Laporan :</label>
                <div class="form-group">
                    <div style="position: relative">
                        <?= $this->Form->control('reportDate',['type'=>'text','label'=>false,'class'=>'form-control','id'=>'reportDate']) ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="workingDates">Date of Duty :</label>
                    <?= $this->Form->control('workingDates',['type'=>'text','label'=>false,'class'=>'form-control','id'=>'workingDates']) ?>
                </div>
                <h2>Borang Laporan Bulanan PPP / Pegawai / Staf </h2>
                <div class="panel-group" id="problems">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#problems" href="#problem0">Perkara/Isu 1<span class="glyphicon glyphicon-plus"></span></a>
                    </h4> </div>
                        <div id="problem0" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label for="problem[0][details]">Perkara/Isu :</label>
                                    <?= $this->Form->control('problem.0.details',['type'=>'text','label'=>false,'class'=>'form-control','id'=>'problem[0][details']) ?>
                                </div>
                                <div class="form-group">
                                    <label for="problem[0][datetime]">Tarikh & Masa :</label>
                                    <div style="position: relative">
                                        <?= $this->Form->control('problem.0.datetime',['type'=>'text','label'=>false,'class'=>'form-control','id'=>'problem[0][datetime]']) ?>
                                    </div>
                                    <script type="text/javascript">
                                        $(function() {
                                            $('#problem\\[0\\]\\[datetime\\]').datetimepicker({
                                                //format: 'DD/MM/YYYY h:mm A'
                                            });
                                        });

                                    </script>
                                </div>
                                <div class="form-group">
                                    <label for="problem[0][venue]">Venue :</label>
                                    <?= $this->Form->control('problem.0.venue',['type'=>'text','label'=>false,'class'=>'form-control','id'=>'problem[0][venue]']) ?>
                                </div>
                                <div class="form-group">
                                    <label for="problem[0][action]">Tindakan :</label>
                                    <?= $this->Form->control('problem.0.action',['type'=>'text','label'=>false,'class'=>'form-control','id'=>'problem[0][action]']) ?>
                                </div>
                                <div class="form-group">
                                    <label for="problem[0][notes]">Cacatan :</label>
                                    <?= $this->Form->control('problem.0.notes',['type'=>'text','label'=>false,'class'=>'form-control','id'=>'problem[0][notes]']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-default" id="addProblemBtn">Add Row</button>
                <h2>Laporan Pelajar Sakit </h2>
                <div class="panel-group" id="sicks">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#sicks" href="#sick0">Pelajar Sakit 1 <span class="glyphicon glyphicon-plus"></span></a>
                                            </h4> </div>
                        <div id="sick0" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label for="sick[0][datetime]">Tarikh & Masa :</label>
                                    <div style="position: relative">
                                        <input type="text" class="form-control" id="sick[0][datetime]" name="sick[0][datetime]" value="" /> </div>
                                    <script type="text/javascript">
                                        $(function() {
                                            $('#sick\\[0\\]\\[datetime\\]').datetimepicker({
                                                format: 'DD/MM/YYYY h:m A'
                                            });
                                        });

                                    </script>
                                </div>
                                <div class="form-group">
                                    <label for="sick[0][name]">Nama :</label>
                                    <input type="text" class="form-control" id="sick[0][name]" name="sick[0][name]" value=""> </div>
                                <div class="form-group">
                                    <label for="sick[0][ic]">No K/P :</label>
                                    <input type="text" class="form-control" id="sick[0][ic]" name="sick[0][ic]" value=""> </div>
                                <div class="form-group">
                                    <label for="sick[0][homeAddress]">Alamat (R) :</label>
                                    <input type="text" class="form-control" id="sick[0][homeAddress]" name="sick[0][homeAddress]" value=""> </div>
                                <div class="form-group">
                                    <label for="sick[0][studentNo]">No.Pelajar :</label>
                                    <input type="text" class="form-control" id="sick[0][studentNo]" name="sick[0][studentNo]" value=""> </div>
                                <div class="form-group">
                                    <label for="sick[0][tel]">No. Tel. :</label>
                                    <input type="text" class="form-control" id="sick[0][tel]" name="sick[0][tel]" value=""> </div>
                                <div class="form-group">
                                    <label for="sick[0][collegeAddress]">Alamat Kolej :</label>
                                    <input type="text" class="form-control" id="sick[0][collegeAddress]" name="sick[0][collegeAddress]" value=""> </div>
                                <div class="form-group">
                                    <label for="sick[0][courseCode]">Kod Khusus :</label>
                                    <input type="text" class="form-control" id="sick[0][courseCode]" name="sick[0][courseCode]" value=""> </div>
                                <div class="form-group">
                                    <label for="sick[0][notes]">Laporan :</label>
                                    <input type="text" class="form-control" id="sick[0][notes]" name="sick[0][notes]" value=""> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-default" id="addSickBtn">Add Row</button>
                <button class="btn btn-success btn btn-default" type="submit">Submit</button>
            </div>
            </form>
    </div>
</div>
