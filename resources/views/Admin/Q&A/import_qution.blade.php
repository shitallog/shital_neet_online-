<div class="col-sm-12">
                <form enctype="multipart/form-data" style="" action="https://demo.itest.inilabs.xyz/bulkimport/question_bulkimport" class="form-horizontal" role="form" method="post">
                    <div class="form-group">
                        <label for="photo" class="col-sm-2 control-label col-xs-8 col-md-2">
                            Add Question                            &nbsp;<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Download the parent sample csv file first then see the format and make a copy of that file and add your data with exact format which is used in our csv file then upload the file."></i>
                        </label>
                        <div class="col-sm-3 col-xs-4 col-md-3">
                            <input class="form-control parent" id="uploadFile" placeholder="Choose File" disabled="">
                        </div>

                        <div class="col-sm-2 col-xs-6 col-md-2">
                            <div class="fileUpload btn btn-success form-control">
                                <span class="fa fa-repeat"></span>
                                <span>Upload</span>
                                <input id="uploadBtn" type="file" class="upload parentUpload" name="csvQuestion">
                            </div>
                        </div>

                        <div class="col-md-1 rep-mar">
                            <input type="submit" class="btn btn-success" value="Import">
                        </div>

                        <div class="col-md-1 rep-mar">
                            <a class="btn btn-info" href="https://demo.itest.inilabs.xyz/assets/csv/sample-question.csv"><i class="fa fa-download"></i> Download Sample</a>
                        </div>
                    </div>
                </form>


</div>