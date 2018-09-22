@extends("layouts.app")

@section("title",'Transaction')


@push('custom-css')

 <link rel="stylesheet" href="/assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker3.min.css">

@endpush
@section('content')
<style>
	

.block-content .file-list{

margin-left: 20px;

}	
</style>

<div class="content bg-gray-lighter">
    <div class="row items-push">
        <div class="col-sm-7">
            <h1 class="page-heading">
                @if(isset($trans))
                Transaction # {{$trans->id}}
                @else
                New transaction <small></small>
                @endif
                
            </h1>
        </div>
        
    </div>
</div>


<div class="content">

<div class="row">

@if(Auth::user()->role == "admin" && $mode == "view")
    <div class="col-md-12">
        <div class="block">
            <div class="block-content">
                  @include('admin.edit-status')
                
            </div>
        </div>
    </div>
      

@endif    
<div class="col-md-12">
    <div class="block">
        
        <div class="block-header">
            
        </div>
        <div class="block-content">
        @if(session('success'))
        <div class="col-md-12">
                                    <!-- Success Alert -->
                                    <div class="alert alert-success alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h3 class="font-w300 push-15">Success</h3>
                                        <p>{{ Session::get('success') }}</p>
                                    </div>
                                    <!-- END Success Alert -->
                                </div>

        @endif   
        @if($errors->any())
        <div class="col-md-12">
            
            <div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h3 class="font-w300 push-15">Error</h3>
                                        @foreach ($errors->all() as $key=>$error)

                                        
                                            <p>{{ $error }}</p>
                                        @endforeach
                                    </div>
        </div>
            
          
         

        @endif 

        
            <form id="root-form" url-submit="<?php
           
                if(isset($trans)){

                    echo route('submit-transaction',['id'=>$trans->id]);
                }else{

                    echo "";
                }
            ?>" class="form-horizontal" action="/transaction/save" method="POST">

                @if(isset($mode))
                <input type="hidden" value="{{$mode}}" name="mode"/>
                @else
                <input type="hidden" value="new" name="mode"/>
                @endif
                
                @if((isset($trans)))

                <input type="hidden" value="{{$trans->id}}" name="id"/>
                @endif
                {{ csrf_field() }}
               <div class="form-group col-md-6">
                    <label class="col-md-4 control-label" for="example-maxlength1">Transaction Number</label>
                    <div class="col-md-6">
                        <input disabled class="form-control" type="text" id="" value="{{{ $trans->id or '' }}}">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-md-4 control-label" for="example-maxlength1">Status</label>
                    <div class="col-md-6">
                        <select name="status" class="form-control" name="">
                            <option>...</option>
                            <option value="1">Option #1</option>
                            <option value="2">Option #2</option>
                            <option value="3">Option #3</option>
                        </select>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-md-6 <?php echo ($errors->has('mls_number') ? "has-error":"" )?>">
                    <label class="col-md-4 control-label" for="example-maxlength1">MLS Number</label>
                    <div class="col-md-6">
                        <input data-old="{{ old('mls_number')}}" name="mls_number" class="form-control" type="text" id="" name="" placeholder="" value="{{{$trans->mls_number or '' }}}">
                        
                        @if($errors->has('mls_number'))
                          <div class="help-block animated fadeInDown">{{ $errors->first('mls_number') }}</div>
                        @endif                    
                      
                    </div>
                </div>
                <div class="form-group col-md-6 <?php echo ($errors->has('price') ? "has-error":"" )?>">
                    <label class="col-md-4 control-label" for="example-maxlength1">Price</label>
                    <div class="col-md-6">
                        <input class="form-control" type="text" id="" value="{{{ $trans->price or 0 }}}" name="price" placeholder="">
                        @if($errors->has('price'))
                          <div class="help-block animated fadeInDown">{{ $errors->first('price') }}</div>
                        @endif        
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-md-6">
                    <label class="col-md-4 control-label" for="example-maxlength1">Conditions</label>
                    <div class="col-md-6">
                        <select class="form-control" name="condition">
                            <option>...</option>
                            <option value="1">Option #1</option>
                            <option value="2">Option #2</option>
                            <option value="3">Option #3</option>
                        </select>
                    </div>
                </div>
                <div class="form-group  col-md-6 <?php echo ($errors->has('deposit') ? "has-error":"" )?>">
                    <label class="col-md-4 control-label" for="example-maxlength1">Deposit amount</label>
                    <div class="col-md-6">
                        <input name="deposit" class="form-control" value="0" type="text" id="" placeholder="" value="{{{ $trans->deposit or 0 }}}">
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-md-6 <?php echo ($errors->has('further_deposit') ? "has-error":"" )?>">
                    <label class="col-md-4 control-label" for="example-maxlength1">Acceptance Date</label>
                    <div class="col-md-6">
                        <input name="accept_date" class="js-datetimepicker form-control" type="text" placeholder="Choose a date.." value="{{{ isset($trans) ? $trans->dateOut('accept_date') : '' }}}">
                        @if($errors->has('accept_date'))
                          <div class="help-block animated fadeInDown">{{ $errors->first('accept_date') }}</div>
                        @endif    
                    </div>
                   
                </div>
                <div class="form-group  col-md-6 <?php echo ($errors->has('further_deposit') ? "has-error":"" )?>">
                    <label class="col-md-4 control-label" for="example-maxlength1">Further Deposit</label>
                    <div class="col-md-6">
                        <input name="further_deposit" class="form-control" type="text" id="" value="{{{ $trans->deposit or 0 }}}" placeholder="">
                        @if($errors->has('further_deposit'))
                            <div class="help-block animated fadeInDown">{{ $errors->first('further_deposit') }}</div>
                        @endif   
                    </div>
                        
                </div>
                <div class="clearfix"></div>
                <div class="form-group  col-md-6 <?php echo ($errors->has('condition_expire') ? "has-error":"" )?>">
                    <label class="col-md-4 control-label" for="example-maxlength1">Condition Expiry date</label>
                    <div class="col-md-6">
                       <input name="condition_expire" class="js-datetimepicker form-control" type="text" name="example-datetimepicker1" placeholder="Choose a date.." value="{{{ isset($trans) ? $trans->dateOut('condition_expire') : '' }}}">
                       @if($errors->has('condition_expire'))
                          <div class="help-block animated fadeInDown">{{ $errors->first('condition_expire') }}</div>
                        @endif    
                    </div>
                    
                </div>
                <div class="form-group  col-md-6 <?php echo ($errors->has('deposit_date') ? "has-error":"" )?>">
                    <label class="col-md-4 control-label" for="example-maxlength1">Further deposit date</label>
                    <div class="col-md-6">
                       <input name="deposit_date" class="js-datetimepicker form-control" type="text" name="example-datetimepicker1" placeholder="Choose a date.." value="{{{ isset($trans) ? $trans->dateOut('deposit_date') : '' }}}">
                        @if($errors->has('deposit_date'))
                          <div class="help-block animated fadeInDown">{{ $errors->first('deposit_date') }}</div>
                        @endif    
                    </div>
                   
                </div>
                <div class="clearfix"></div>
                <div class="form-group  col-md-6 <?php echo ($errors->has('completion_date') ? "has-error":"" )?>">
                    <label class="col-md-4 control-label" for="example-maxlength1">Completion date</label>
                    <div class="col-md-6">
                       <input name="completion_date" class="js-datetimepicker form-control" type="text" name="example-datetimepicker1" placeholder="Choose a date.." value="{{{ isset($trans) ? $trans->dateOut('completion_date') : '' }}}">
                        @if($errors->has('completion_date'))
                            <div class="help-block animated fadeInDown">{{ $errors->first('completion_date') }}</div>
                        @endif   
                    </div>
                   
                </div>
                 <div class="form-group  col-md-6 <?php echo ($errors->has('trade_record') ? "has-error":"" )?>">
                    <label class="col-md-4 control-label" for="example-maxlength1">Trade record date</label>
                    <div class="col-md-6">
                       <input name="trade_record" class="js-datetimepicker form-control" type="text" name="example-datetimepicker1" placeholder="Choose a date.." value="{{{ isset($trans) ? $trans->dateOut('trade_record') : '' }}}">
                       @if($errors->has('trade_record'))
                          <div class="help-block animated fadeInDown">{{ $errors->first('trade_record') }}</div>
                       @endif    
                    </div>
                   
                </div>
               
                <div class="clearfix"></div>
                <hr class="col-md-12">
                @if(isset($trans) && $trans->address_id != null)
                <input type="hidden" value="{{$trans->address_id}}" name="add_id"/>
                @endif
                <div class="form-group  col-md-6">
                    <label class="col-md-4 control-label" style="text-align: left" for="example-maxlength1">Address</label>
                    
                </div>
                <div class="clearfix"></div>
                <div class="form-group  col-md-6">
                    <label class="col-md-4 control-label" for="example-maxlength1">Suite number</label>
                    <div class="col-md-6">
                        <input name="suite" class="form-control" type="text" id="" name="" placeholder="" value="{{{ isset($add) ? $add->suite : '' }}}">
                       
                    </div>
                    
                </div>
                <div class="form-group  col-md-6 <?php echo ($errors->has('city') ? "has-error":"" )?>">
                    <label class="col-md-4 control-label" for="example-maxlength1">City/Town</label>
                    <div class="col-md-6">
                        <input name="city" class="form-control" type="text" id="" name="" placeholder="" value="{{{ isset($add) ? $add->city : '' }}}">
                        @if($errors->has('price'))
                          <div class="help-block animated fadeInDown">{{ $errors->first('city') }}</div>
                        @endif    
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group  col-md-6 <?php echo ($errors->has('street') ? "has-error":"" )?>">
                    <label class="col-md-4 control-label" for="example-maxlength1">Street number</label>
                    <div class="col-md-6">
                        <input name="street" class="form-control" type="text" id="" name="" placeholder="" value="{{{ isset($add) ? $add->street : '' }}}">
                        @if($errors->has('price'))
                          <div class="help-block animated fadeInDown">{{ $errors->first('street') }}</div>
                        @endif  
                    </div>
                     
                </div>
                <div class="form-group  col-md-6 <?php echo ($errors->has('province') ? "has-error":"" )?>">
                    <label class="col-md-4 control-label" for="example-maxlength1">Province</label>
                    <div class="col-md-6">
                        <input name="province" class="form-control" type="text" id="" name="" placeholder="" value="{{{ isset($add) ? $add->province : '' }}}">
                        @if($errors->has('province'))
                            <div class="help-block animated fadeInDown">{{ $errors->first('province') }}</div>
                        @endif    
                    </div>
                   
                </div>
                <div class="clearfix"></div>
                <div class="form-group  col-md-6 <?php echo ($errors->has('street_name') ? "has-error":"" )?>">
                    <label class="col-md-4 control-label" for="example-maxlength1">Street name</label>
                    <div class="col-md-6">
                        <input name="street_name" class="form-control" type="text" id="" name="" placeholder="" value="{{{ isset($add) ? $add->street_name : '' }}}">
                        @if($errors->has('street_name'))
                          <div class="help-block animated fadeInDown">{{ $errors->first('street_name') }}</div>
                        @endif    
                    </div>
                   
                </div>
                <div class="form-group  col-md-6 <?php echo ($errors->has('postal') ? "has-error":"" )?>">
                    <label class="col-md-4 control-label" for="example-maxlength1">Postal code</label>
                    <div class="col-md-6">
                        <input name="postal" class="form-control" type="text" id="" name="" placeholder="" value="{{{ isset($add) ? $add->postal : '' }}}">
                        @if($errors->has('postal'))
                          <div class="help-block animated fadeInDown">{{ $errors->first('postal') }}</div>
                        @endif    
                    </div>
              
                </div>
                <div class="clearfix"></div>
                <hr class="col-md-12">
                <div class="form-group  col-md-6">
                    <label class="col-md-4 control-label" style="text-align: left" for="">Client Detail</label>
                  
                </div>
                <div class="clearfix"></div>
                <div class="form-group  col-md-12">
                    
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><select data-id="{{{ $trans->client_id or '' }}}" data-client="fname address email phone" class='my-client' name="client_id">
                                           <option disabled selected>Choose </option>
                                            @foreach($clients as $client)

                                            <option value="{{$client->id}}">{{$client->Fname.' '.$client->Lname}}</option>
                                            @endforeach
                                         
                                        </select>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group  col-md-6">
                    <label class="col-md-4 control-label" style="text-align: left" for="">Lawyer Detail</label>
                  
                </div>
                <div class="clearfix"></div>
                <div class="form-group  col-md-12">
                    
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Firm</th>
                                    <th>Address</th>
                                    <th>Side</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><select data-id="{{{ $trans->lawyer_id or '' }}}" data-client="fname firm address side email phone" class="my-client" name="lawyer_id">
                                            <option disabled selected>Choose </option>
                                            @foreach($clients as $client)

                                            <option value="{{$client->id}}">{{$client->Fname.' '.$client->Lname}}</option>
                                            @endforeach
                                         
                                        </select>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group  col-md-6">
                    <label class="col-md-12 control-label" style="text-align: left" for="">Referral information</label>
                  
                </div>
                <div class="clearfix"></div>
                <div class="form-group  col-md-12">
                    
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Brokerage</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><select data-id="{{{ $trans->referral_id or '' }}}" data-client="fname broker address email phone"class='my-client' name="referral_id">
                                            <option disabled selected>Choose </option>
                                            @foreach($clients as $client)

                                            <option value="{{$client->id}}">{{$client->Fname.' '.$client->Lname}}</option>
                                            @endforeach
                                          
                                        </select>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="clearfix"></div>
                <div class="form-group  col-md-6">
                    <label class="col-md-12 control-label" style="text-align: left" for="">Sales Person/Broker Information</label>
                  
                </div>
                <div class="clearfix"></div>
                <div class="form-group  col-md-12">
                    
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Brokerage</th>
                                    <th>Side</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><select data-id="{{{ $trans->sale_id or '' }}}" data-client="fname broker side address email phone" class='my-client' name='sale_id'>
                                            <option disabled selected>Choose </option>
                                            @foreach($clients as $client)

                                            <option value="{{$client->id}}">{{$client->Fname.' '.$client->Lname}}</option>
                                            @endforeach
                                            
                                        </select>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <div class="col-md-12">
                       
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <div class="col-md-8">

                        @if($mode == "edit" || $mode == "new")

                            <button class="btn btn-sm btn-primary" name="submit" type="submit" value="save">Save</button>
                            <button id="my-submit" <?php echo (isset($trans) ? "":"disabled") ?> name="submit" value="submit" type="submit" class="btn btn-sm btn-primary">Submit</button>
                        @endif
                 
                    </div>
                </div>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
    
</div>
<div class="col-md-12">
    @if(isset($mode) && ($mode == 'edit' || $mode == "view"))
        @include('main.transaction-type')
    @endif
    
</div>
</div>
</div>
<!-- Large Modal -->
        <div class="modal" id="modal-large" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="block block-themed block-transparent remove-margin-b">
                        <div class="block-header bg-primary-dark">
                            <ul class="block-options">
                                <li>
                                    <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                </li>
                            </ul>
                            <h3 class="block-title">Over view transation</h3>
                        </div>
                        <div class="block-content">
                        
                        </div>
                    </div>
                    <div class="modal-footer">

                        @if($mode == "edit")
                        <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                        <button id="my-save-button" class="btn btn-sm btn-success" type="button">Save</button>
                        @endif
                        
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- END Large Modal -->
       	<a class="btn btn-info" type="button" style="display: none"><i class="fa fa-download"></i> Download</a>   
        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 0%;display: :none">0%</div>
@endsection


@push('scripts')
<script src="/assets/js/plugins/bootbox/bootbox.min.js"></script>
<script src="/assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

<script src="/assets/js/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="/assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
<script>


(function( $ ) {
 
    $.fn.kFormUpload = function(options) {
        
        var settings = $.extend({
        
        }, options );   

        var mode = '{{ $mode }}';
        var modal = $(settings.modal);
        var method = $(this).attr('method');

        var form = this.find('form').first();
        var that = this;

        var token = '{{csrf_token()}}';

        this.filter( "a" ).each(function() {
         
        });
        this.hello = function(e){
         
        };

        this.hideShowFile = function(input){

            var selectedValue = $(input).children('option:selected');

            //console.log('current value',selectedValue.val());
            $(input).closest('.tab-pane').find('.file-field').removeClass('my-hide').show();    
            $(input).closest('.tab-pane').find('.file-field').not('.'+selectedValue.val()).addClass('my-hide').hide();              



        };
        this.test = function(e){
           
        };
        this.setBox = function(select,pos){

            that.hideShowFile(select);    
            var input = that.find('form').eq(0).find('div').eq(0).find('div.tab-pane').eq(pos).find('select').first();
            that.hideAndShow(input,select.value);

        };

        this.hideAndShow = function(input,myValue){

            var selectedValue = $(input).children('option:selected');
            
            var count = $(input).children('option').filter('.'+myValue).length;
            var option_show = $(input).children('option:visible').length;


            if(!selectedValue.hasClass(myValue) || option_show != count){
          
            
                $(input).children('option').filter('.'+myValue).show();
                $(input).children('option').not('.'+myValue).hide();
                $(input).children('option').filter('.'+myValue).eq(0).prop('selected',true);
                this.hideShowFile(input);    
            }

           



            var pos = $(input).attr('data-pos');
            if(typeof pos !== typeof undefined && pos !== false){
                var div = $('#my-form > div').eq(pos).find('select').first();
                this.hideAndShow(div ,$(input).val());
            }

        };

        this.uploadFile = function(id,name,file){

            var form_data = new FormData();
            form_data.append('id',id);
            form_data.append('_token',token);
            form_data.append(name,file);

            var td = $('td.'+name).first();

            $.ajax({
            url: "/upload",
            data: form_data,
            type: 'POST',
            contentType: false,
            processData: false,
            xhr:function(){

                var xhr = $.ajaxSettings.xhr();
                if (xhr.upload) {
                    xhr.upload.addEventListener('progress', function(event) {
                        var percent = 0;
                        var position = event.loaded || event.position;
                        var total = event.total;
                        if (event.lengthComputable) {
                            percent = Math.ceil(position / total * 100);
                        }
                        //update progressbar

                        var bar = td.children('div').eq(0);
                        bar.css("width", + percent +"%");
                        bar.text(percent +"%");
                    }, true);
                }
                return xhr;
            },
            success: function (data) {

                td.empty();
               /* var li = $("<a class='btn btn-info'></a>");
                var i = $("<i class='fa fa-download'></i> Download");
                console.log(data);
                li.attr('href','/storage/'+data[0]);
                li.attr("target","_blank");
                li.append(i);*/
                var url = "{{ config('filesystems.disks.public.url') }}"
                var li = that.viewFileButton(url+data[0]);
                td.append(li);

                form.find('input[name="'+data[2]+'"]').first().replaceWith($(data[1]));


            }

            });


        };

        this.viewFileButton = function(link){

            var li = $("<a class='btn btn-info'></a>");
            var i = $("<i class='fa fa-download'></i> Download");
             
            li.attr('href',link);
            li.attr("target","_blank");
            li.append(i);
            return li;

        }
        this.setUp = function(){
         
            $('.step-box').each(function(){

                var data = $(this).attr('data-value');

                if(data != ""){
                    $(this).val(data);
                }

                
            });

            if(mode == 'view'){


                $('input').not('.editable').attr('readonly', true);
                $('.step-box').attr('disabled', 'disabled');
            }
            //var step = parseInt(form.attr('data-step'));
          //  $('.js-wizard-simple').eq(0).bootstrapWizard('show',step);
            var input = that.find('form').eq(0).find('div').eq(0).find('div.tab-pane').eq(settings.pos).find('select').first();
            that.hideShowFile(input);    
            that.setBox(input,input.attr('data-pos'));

            that.find('div.form-group').on('click',"button.del-btn",function(){

                var button = $(this);
                var id = $(this).attr('data-id');
                bootbox.confirm("Are you sure to delete this file ?", function(result){

                        var url = '{{route("delete-file")}}';
                        if(result){

                            var data={
                               '_token':token,
                               'id':id 
                            };
                            $.post(url,data,function(){

                                var row = button.closest('div.row');
                               
                                row.next('input').show();
                                row.remove();
                            },"json");
                        } 
                    
                });
              
            });
        };

        this.setUp();

        that.find('.step-box').on('change',function(e){

            var pos = $(this).attr('data-pos');
            that.setBox(this,pos);
          
          
            

        });

        this.makeProgreeBar = function(){



        };
        $('#my-submttit').click(function(e){

         //   e.preventDefault();
            var data = $('#root-form').attr('url-submit');
            console.log(data);
            $('#root-form').attr('action',data);
         //   var data_form = $('#root-form').submit();
       //  e.preventDefault();
        // $('#root_form').submit();
           // var root_form = $('#root_form').submit();
           //  var url = root_form.attr('url-submit');
            // root_form.attr('action',url);

         //    root_form.submit();
        });
        $('#my-submit').on('click',function(e){

             
            var files = $('.file-field').not('.my-hide');
            var root_form = $('#root-form');

            var url = root_form.attr('url-submit');

            // $('#root-form').submit();
         
            // $('#root-form').submit();

             
             // $('#root-form').submit();
            //var url = $('#root-form').attr('url-submit');
            //$('#root-form').attr('action',url);
            //$("#root-form").submit();
          

         //   var files = $('.file-field').not('.my-hide');

            if(files.find('input:visible').length > 0){

                e.preventDefault();
                var first = "<p class='text-danger'>Please upload file for: </p>";
                var string = "";
              
                files.each(function(){

                    console.log(this);
                    var row = $(this).find('div').eq(0).children('div.row').first();
                    var input = $(this).find('div').eq(0).children('input').first();
                    if(input.length > 0 && row.length == 0){
                         var label = input.closest('div').find('label').first();
                        string +=  label.html()+"<br/>";
                    }
                });

                bootbox.alert(first+string);

                return false;
            }

            root_form.attr('action',url);
                    //$('#root_form').submit();


            

               

           

            
         //   $(this).unbind('submit').submit();
            //var root_form = $('#root-form');
           // var url = root_form.attr('url-submit');
           // root_form.attr('action',url);
           // $('#root-form').submit();
            //console.log( $('#root-form').submit());
           // root_form.submit();
            //form.attr('action',url);
           // console.log(form);
            /*$('.file-field').not('.my-hide').each(function(){

                var row = $(this).find('div').eq(0).children('div.row').first();
                var input = $(this).find('div').eq(0).children('input').first();
                if(input.length > 0 && row.length == 0){
                     var label = input.closest('div').find('label').first();
                    string +=  label.html()+"<br/>";
                }
            });
            $('input[type="file"]').each(function(){

             //   var label = $(this).closest('div').find('label').first();
               // string +=  label.html()+"<br/>";

            });
            bootbox.alert(first+string);*/



        });
     

        $('#my-save-button').on('click',function(){


            //var form = $('#my-main-form');
            var data = {};

            var mode = form.attr('data-mode');

            data['mode'] = mode;

            if(mode == 'edit'){

                data['id'] = form.attr('data-id');
            }
            data['current_step'] = $('.js-wizard-simple').eq(0).bootstrapWizard('currentIndex');
            var trans_id = form.attr('data-trans');

            if(trans_id != ""){

                data['transaction_id'] = trans_id;

            }

            data['_token'] = '{{csrf_token()}}';
            $('#my-form').find('select').each(function(){

                data[$(this).attr('name')] = $(this).val();
                
            });
            
            

            $.post('/saveStep',data,function(result){

                
                form.attr('data-mode','edit');
                form.attr('data-id',result.id);

                $('.file-field').not('.my-hide').find('input').each(function(index){
                  
                    
                    var name = $(this).attr('name');
                    if($(this).attr('name') != "" && $(this).val() != ""){

                        //return false;
                        that.uploadFile(result.id,name,this.files[0]);
                    }
                    
                });
                
            },"json");

        });
        modal.on('show.bs.modal',function(event){

        
        var table = $("<table class='table'></table>");    
        
      
        that.find('form').eq(0).find('div').eq(0).find('.tab-pane').each(function(index){
        
        var result = "";
        
        var h5 = "<h5>"+$(this).find('select').eq(0).val()+"</h5>";
    
        var current_content = modal.find('.block-content').first();
        current_content.empty();
        
        
        
        var first_row = $("<td colspan='3'><strong>"+$(this).find('select').eq(0).val()+"</strong></td>");        

        var file_content = $("<p class='file-list'></p>");

       // var table = $("<table class='table'></table>");
        var tr = $("<tr></tr>");

        tr.append(first_row);
        var tbody = $("<tbody></tbody>");
        table.append(tr);
        $(this).find('.file-field').not('.my-hide').find('input').each(function(index){

            var tr = $("<tr></tr>");
            var input_name = $(this).attr('name');
            var label = $(this).closest('div').find('label').eq(0).html();
            var file_name = "";
            tr.append("<td style='margin-left:30px'>"+label+"</td>");

            var link_button = $(this).closest('div').find('div.row').find('a[data-name="'+input_name+'"]').first();
            var td_small = $("<td></td>");

            

            if($(this).val() != ""){
                
                //file_name = $(this).val();
                file_name = this.files[0].name;
                //var td =  '<tr>'+'<td>'+label+'</td><td>'+$(this).val()+'</td><td></td></tr>';
            }

            td_small.append(file_name);
            tr.append(td_small);


            if(link_button.length > 0){
                var third_td = $('<td></td>');

                third_td.append(that.viewFileButton(link_button.attr('href')));

                tr.append(third_td);
               // console.log(link_button.attr('href'));
            }else{

                var bar = $('.progress-bar').eq(0).clone();
                bar.css('width','0%');
                bar.text('100%');
                //var td = '<tr>'+'<td>'+label+'</td><td>'+file_name+'</td><td></td></tr>';
               // td.append('<td>'+label+'</td>');
                //td.append('<td>'+file_name+'</td>');
                //td.append(td_small);
                var tdS = $('<td style="width:250px"></td>');
                tdS.addClass($(this).attr('name'));
                tdS.append(bar);
                tr.append(tdS);

            }
           
            
           // var td = $('<tr></tr>');

          

           // tr.append(tdS);
            table.append(tr);
            //$('.progress-bar').eq(0).clone().appendTo(tdS);
         //   td.append(tdS);
          //  tbody.append(td);

        });
        //table.append(tr);
        //table.append(tbody);
        //file_content.append(table);
        //current_content.append(h5);
        //current_content.append(file_content);
        current_content.append(table);
        // end modal show
    });
    

    });
    // Ending modal bind function    
        
        //this.find('input[type="submit"]').eq(0).click(this.hello);
        
 
        return this;
 
    };
 
}( jQuery ));


/*$('.js-wizard-simple').eq(0).kFormUpload({
    'modal':'#modal-large',
    'pos':0
});*/
/*$('#my-submit').click(function(e){

    var url = $('#root-form').attr('url-submit');
    $('#root-form').attr('action',url);
    $("#root-form").submit();
});*/


$('.my-client').each(function(){
    var id = $(this).attr('data-id');
    if(id != ""){
        $(this).val(id);
        var order = $(this).attr('data-client').split(" ");
        var tr = $(this).closest('tr');
        getClient(order,id,tr);
    }
});

$('.js-datetimepicker').datepicker({});
var files;




function getClient(order,id,tr){

    var data = {
        '_token':'{{csrf_token()}}'
    };

    $.get('/client/'+id,data,function(data){

        $.each(order,function(index,result){

            if(index != 0){
             
                tr.find('td').eq(index).html(data[result]);
            }

            //tr.find('td').eq(index).html(data[result]);
            //console.log(data[result]);

        });
       
    },'json');

}

$('.my-client').change(function(){

    var id = $(this).val();

    var order = $(this).attr('data-client').split(" ");
    //var data form_data.append('_token', '{{csrf_token()}}'
    var tr = $(this).closest('tr');

    getClient(order,id,tr);
    var data = {
        '_token':'{{csrf_token()}}'
    };
   
    /*$.get('/client/'+id,data,function(data){

        $.each(order,function(index,result){

            if(index != 0){
                console.log(result,index);
                console.log(data[result]);
                tr.find('td').eq(index).html(data[result]);
            }

            //tr.find('td').eq(index).html(data[result]);
            //console.log(data[result]);

        });
        console.log(data)
    },'json');*/
});

// Add events
$('input[type=file]').on('change', prepareUpload);

// Grab the files and set them to our variable
function prepareUpload(event)
{
    files = event.target.files;
}

function uploadFile(id){



	$('.file-field').not('.my-hide').find('input').each(function(index){

		var form_data = new FormData();
		var name = $(this).attr('name');
		if($(this).attr('name') == "" || $(this).val() == ""){

			return false;
		}
		form_data.append('id',id);
		form_data.append('_token', '{{csrf_token()}}');
		form_data.append(name, this.files[0]);

		var td = $('td.'+name).eq(0);
		$.ajax({
            url: "/upload",
            data: form_data,
            type: 'POST',
            contentType: false,
            processData: false,
            xhr:function(){

            	var xhr = $.ajaxSettings.xhr();
		        if (xhr.upload) {
		            xhr.upload.addEventListener('progress', function(event) {
		                var percent = 0;
		                var position = event.loaded || event.position;
		                var total = event.total;
		                if (event.lengthComputable) {
		                    percent = Math.ceil(position / total * 100);
		                }
		                //update progressbar

		                var bar = td.children('div').eq(0);
		                bar.css("width", + percent +"%");
		                bar.text(percent +"%");
		            }, true);
		        }
		        return xhr;
            },
            success: function (data) {

            	td.empty();
            	var li = $("<a class='btn btn-info'></a>");
            	var i = $("<i class='fa fa-download'></i> Download");

            	li.attr('href','/storage/'+data);
            	li.attr("target","_blank");
            	li.append(i);
            	td.append(li);


            }
            	
        });


	});



}
$('#my-save-buttonn').click(function(e){

	//var form_data = new FormData(document.getElementById("my-main-form"));

	var form = $('#my-main-form');
	var data = {};

	var mode = form.attr('data-mode');

	data['mode'] = mode;

	if(mode == 'edit'){

		data['id'] = form.attr('data-id');
	}
	data['_token'] = '{{csrf_token()}}';
	$('#my-form').find('select').each(function(){

		data[$(this).attr('name')] = $(this).val();
		
	});

	

	$.post('/saveStep',data,function(result){

		console.log(result);
		form.attr('data-mode','edit');
		form.attr('data-id',result.id);
		uploadFile(result.id);
	},"json");

	
});

$('#modal-large').on('show.bs.modal',function(event){

	var modal = $(this);

	var result = "";
	$('#my-form > .tab-pane').each(function(index){

	
		
		/*var h5 = "<h5>"+$(this).find('select').eq(0).val()+"</h5>";
	
		var current_content = modal.find('.block-content > p').eq(index);
		current_content.empty();
	 
		

		var file_content = $("<p class='file-list'></p>");

		var table = $("<table class='table'></table>");
		var tbody = $("<tbody></tbody>");
		$(this).find('.file-field').not('.my-hide').find('input').each(function(index){

			var label = $(this).closest('div').find('label').eq(0).html();
			var file_name = "";

			if($(this).val() != ""){
				
				//file_name = $(this).val();
				file_name = this.files[0].name;
				//var td =  '<tr>'+'<td>'+label+'</td><td>'+$(this).val()+'</td><td></td></tr>';
			}
			var td = $('<tr></tr>');

			var bar = $('.progress-bar').eq(0).clone();
			bar.css('width','0%');
			 bar.text('100%');
			//var td = '<tr>'+'<td>'+label+'</td><td>'+file_name+'</td><td></td></tr>';
			td.append('<td>'+label+'</td>');
			td.append('<td>'+file_name+'</td>');

			var tdS = $('<td style="width:250px"></td>');
			tdS.addClass($(this).attr('name'));
			tdS.append(bar);

			//$('.progress-bar').eq(0).clone().appendTo(tdS);
			td.append(tdS);
			tbody.append(td);

		});
		table.append(tbody);
		file_content.append(table);
		current_content.append(h5);
		current_content.append(file_content); */
	});

	//modal.find('.block-content').html(result);

});


function setFirst(){

	var pos = $('#step-one').attr('data-pos');


	var input = $('#my-form > div').eq(pos).find('select').first();
	
	hideAndShow(input,this.value);

}




/*$('#step-one').change(function(){

	var pos = $(this).attr('data-pos');


	var input = $('#my-form > div').eq(pos).find('select').first();
	
	hideAndShow(input,this.value);
});

$('#step-two').change(function(){

	var pos = $(this).attr('data-pos');
	var input = $('#my-form > div').eq(pos).find('select').first();
	hideAndShow(input,this.value);
});

$('#step-two').change(function(){

	var pos = $(this).attr('data-pos');
	var input = $('#my-form > div').eq(pos).find('select').first();
	hideAndShow(input,this.value);
});

$('#step-three').change(function(){

	var pos = $(this).attr('data-pos');
	var input = $('#my-form > div').eq(pos).find('select').first();
	hideAndShow(input,this.value);
});

*/


function hideShowFile(input){

	var selectedValue = $(input).children('option:selected');

	//console.log('current value',selectedValue.val());
	$(input).closest('.tab-pane').find('.file-field').removeClass('my-hide').show();	
	$(input).closest('.tab-pane').find('.file-field').not('.'+selectedValue.val()).addClass('my-hide').hide();				



}
function hideAndShow(input,myValue){


	

	var selectedValue = $(input).children('option:selected');
	

	if(!selectedValue.hasClass(myValue)){

	
		$(input).children('option').show();
		$(input).children('option').not('.'+myValue).hide();
		$(input).children('option').filter('.'+myValue).eq(0).prop('selected',true);
		hideShowFile(input);	
	}
	

	var pos = $(input).attr('data-pos');
	if(typeof pos !== typeof undefined && pos !== false){
		var div = $('#my-form > div').eq(pos).find('select').first();
		hideAndShow(div	,$(input).val());
	}
	//$('.step-box > option').show();	
	//$('.step-box > option').not('.'+input).hide();
	//$(".step-box > option").filter('.'+input).eq(0).prop('selected',true);	
}


/*
 *  Document   : base_forms_wizard.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Form Wizard Page
 */

var BaseFormWizard = function() {
    // Init simple wizard, for more examples you can check out https://github.com/VinceG/twitter-bootstrap-wizard
    var initWizardSimple = function(){
        jQuery('.js-wizard-simple').bootstrapWizard({
            'tabClass': '',
            'firstSelector': '.wizard-first',
            'previousSelector': '.wizard-prev',
            'nextSelector': '.wizard-next',
            'lastSelector': '.wizard-last',
            'onInit':function(){

                $('.js-wizard-simple').eq(0).kFormUpload({
                    'modal':'#modal-large',
                    'pos':0
                });
            	
            },
            'onTabShow': function($tab, $navigation, $index) {
		var $total      = $navigation.find('li').length;
		var $current    = $index + 1;
		var $percent    = ($current/$total) * 100;

                // Get vital wizard elements
                var $wizard     = $navigation.parents('.block');
                var $progress   = $wizard.find('.wizard-progress > .progress-bar');
                var $btnPrev    = $wizard.find('.wizard-prev');
                var $btnNext    = $wizard.find('.wizard-next');
                var $btnFinish  = $wizard.find('.wizard-finish');

                // Update progress bar if there is one
		if ($progress) {
                    $progress.css({ width: $percent + '%' });
                }

		// If it's the last tab then hide the last button and show the finish instead
		if($current >= $total) {
                    $btnNext.hide();
                    $btnFinish.show();
		} else {
                    $btnNext.show();
                    $btnFinish.hide();
		}
            }
        });
        var step = $('#my-main-form').attr('data-step');
        $('.js-wizard-simple').bootstrapWizard('show',0);
    };

    // Init wizards with validation, for more examples you can check out https://github.com/VinceG/twitter-bootstrap-wizard
    // and https://github.com/jzaefferer/jquery-validation
    var initWizardValidation = function(){
        // Get forms
        var $form1 = jQuery('.js-form1');
        var $form2 = jQuery('.js-form2');

        // Prevent forms from submitting on enter key press
        $form1.add($form2).on('keyup keypress', function (e) {
            var code = e.keyCode || e.which;

            if (code === 13) {
                e.preventDefault();
                return false;
            }
        });

        // Init form validation on classic wizard form
        var $validator1 = $form1.validate({
            errorClass: 'help-block animated fadeInDown',
            errorElement: 'div',
            errorPlacement: function(error, e) {
                jQuery(e).parents('.form-group > div').append(error);
            },
            highlight: function(e) {
                jQuery(e).closest('.form-group').removeClass('has-error').addClass('has-error');
                jQuery(e).closest('.help-block').remove();
            },
            success: function(e) {
                jQuery(e).closest('.form-group').removeClass('has-error');
                jQuery(e).closest('.help-block').remove();
            },
            rules: {
                'validation-classic-firstname': {
                    required: true,
                    minlength: 2
                },
                'validation-classic-lastname': {
                    required: true,
                    minlength: 2
                },
                'validation-classic-email': {
                    required: true,
                    email: true
                },
                'validation-classic-details': {
                    required: true,
                    minlength: 5
                },
                'validation-classic-city': {
                    required: true
                },
                'validation-classic-skills': {
                    required: true
                },
                'validation-classic-terms': {
                    required: true
                }
            },
            messages: {
                'validation-classic-firstname': {
                    required: 'Please enter a firstname',
                    minlength: 'Your firtname must consist of at least 2 characters'
                },
                'validation-classic-lastname': {
                    required: 'Please enter a lastname',
                    minlength: 'Your lastname must consist of at least 2 characters'
                },
                'validation-classic-email': 'Please enter a valid email address',
                'validation-classic-details': 'Let us know a few thing about yourself',
                'validation-classic-skills': 'Please select a skill!',
                'validation-classic-terms': 'You must agree to the service terms!'
            }
        });

        // Init form validation on the other wizard form
        var $validator2 = $form2.validate({
            errorClass: 'help-block text-right animated fadeInDown',
            errorElement: 'div',
            errorPlacement: function(error, e) {
                jQuery(e).parents('.form-group > div').append(error);
            },
            highlight: function(e) {
                jQuery(e).closest('.form-group').removeClass('has-error').addClass('has-error');
                jQuery(e).closest('.help-block').remove();
            },
            success: function(e) {
                jQuery(e).closest('.form-group').removeClass('has-error');
                jQuery(e).closest('.help-block').remove();
            },
            rules: {
                'validation-firstname': {
                    required: true,
                    minlength: 2
                },
                'validation-lastname': {
                    required: true,
                    minlength: 2
                },
                'validation-email': {
                    required: true,
                    email: true
                },
                'validation-details': {
                    required: true,
                    minlength: 5
                },
                'validation-city': {
                    required: true
                },
                'validation-skills': {
                    required: true
                },
                'validation-terms': {
                    required: true
                }
            },
            messages: {
                'validation-firstname': {
                    required: 'Please enter a firstname',
                    minlength: 'Your firtname must consist of at least 2 characters'
                },
                'validation-lastname': {
                    required: 'Please enter a lastname',
                    minlength: 'Your lastname must consist of at least 2 characters'
                },
                'validation-email': 'Please enter a valid email address',
                'validation-details': 'Let us know a few thing about yourself',
                'validation-skills': 'Please select a skill!',
                'validation-terms': 'You must agree to the service terms!'
            }
        });

        // Init classic wizard with validation
        jQuery('.js-wizard-classic-validation').bootstrapWizard({
            'tabClass': '',
            'previousSelector': '.wizard-prev',
            'nextSelector': '.wizard-next',
            'onTabShow': function($tab, $nav, $index) {
		var $total      = $nav.find('li').length;
		var $current    = $index + 1;

                // Get vital wizard elements
                var $wizard     = $nav.parents('.block');
                var $btnNext    = $wizard.find('.wizard-next');
                var $btnFinish  = $wizard.find('.wizard-finish');

		// If it's the last tab then hide the last button and show the finish instead
		if($current >= $total) {
                    $btnNext.hide();
                    $btnFinish.show();
		} else {
                    $btnNext.show();
                    $btnFinish.hide();
		}
            },
            'onNext': function($tab, $navigation, $index) {
                var $valid = $form1.valid();

                if(!$valid) {
                    $validator1.focusInvalid();

                    return false;
                }
            },
            onTabClick: function($tab, $navigation, $index) {
		return false;
            }
        });

        // Init wizard with validation
        jQuery('.js-wizard-validation').bootstrapWizard({
            'tabClass': '',
            'previousSelector': '.wizard-prev',
            'nextSelector': '.wizard-next',
            'onTabShow': function($tab, $nav, $index) {
		var $total      = $nav.find('li').length;
		var $current    = $index + 1;

                // Get vital wizard elements
                var $wizard     = $nav.parents('.block');
                var $btnNext    = $wizard.find('.wizard-next');
                var $btnFinish  = $wizard.find('.wizard-finish');

		// If it's the last tab then hide the last button and show the finish instead
		if($current >= $total) {
                    $btnNext.hide();
                    $btnFinish.show();
		} else {
                    $btnNext.show();
                    $btnFinish.hide();
		}
            },
            'onNext': function($tab, $navigation, $index) {
                var $valid = $form2.valid();

                if(!$valid) {
                    $validator2.focusInvalid();

                    return false;
                }
            },
            onTabClick: function($tab, $navigation, $index) {

		        return false;
            }
        });
    };

    return {
        init: function () {
            // Init simple wizard
            initWizardSimple();

            // Init wizards with validation
            initWizardValidation();
        }
    };
}();

// Initialize when page loads
jQuery(function(){ BaseFormWizard.init(); });

</script>

@endpush