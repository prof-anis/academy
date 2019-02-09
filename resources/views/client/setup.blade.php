@extends('layout.admin_remove')

@section('content')
<form id="setupForm">
<div class="col-md-12">
                <div class="alert alert-info visible-xs m-r-5 m-l-5" role="alert">
                  <button class="close" data-dismiss="alert"></button>
                  <strong>Info: </strong> On mobile the tab will be come a Accorian by using data-init-reponsive-tabs="collapse"
                </div>
                <div class="panel">
                  <ul class="nav nav-tabs nav-tabs-simple hidden-xs" role="tablist" data-init-reponsive-tabs="collapse">
                    <li class="active"><a href="#tab2hellowWorld" data-toggle="tab" role="tab" aria-expanded="false">Let get to know you</a>
                    </li>
                    <li class=""><a href="#tab2FollowUs" data-toggle="tab" role="tab" aria-expanded="false">How can we find you?</a>
                    </li>
                    <li class=""><a href="#tab2Inspire" data-toggle="tab" role="tab" aria-expanded="true">Welcome to our world</a>
                    </li>
                  </ul><div class="panel-group visible-xs" id="vn4Bk-accordion"></div>
                  <div class="tab-content hidden-xs">
                    <div class="tab-pane active" id="tab2hellowWorld">
                      <div class="row column-seperation">


                       <div class="form-group form-group-default required">
                        <label>Name</label>
                        <input type="text" class="form-control" required="" name='name'>
                      </div>

                      <div class="form-group form-group-default required">
                        <label>Email</label>
                        <input type="email" class="form-control" required="" name='email'>
                      </div>

                      <div class="form-group form-group-default required col-md-6">
                        <label>Phone</label>
                        <input type="text" class="form-control" required="" name='phone'>
                      </div>

                      <div class="form-group form-group-default required col-md-6">
                        <label>Gender</label>
                        <select class="form-control required" name="gender">
                            <option class="form-control" value="male">male</option>
                             <option class="form-control" value="female">female</option>
                        </select>
                      </div>

                      <div class="form-group form-group-default required col-md-6">
                        <label>Department</label>
                        <select class="form-control required" name="dept">
                            <option class="form-control" value="science">science</option>
                             <option class="form-control" value="commercial">commercial</option>
                              <option class="form-control" value="art">art</option>
                        </select>
                      </div>

                        <div class="form-group form-group-default required col-md-6">
                        <label>Class</label>
                        <select class="form-control required" name="grade">
                            <option class="form-control" value="js1">ss1</option>
                             <option class="form-control" value="js2">ss2</option>
                              <option class="form-control" value="js3">ss3</option>
                        </select>
                      </div>




                      </div>
                    </div>
                    <div class="tab-pane" id="tab2FollowUs">
                      <div class="row">

                         <div class="form-group form-group-default required">
                        <label>Address</label>
                        <input type="text" class="form-control" required="" name='address'>
                      </div>

                       COUNTRY

                      <div class="form-group ">
                        <select class="full-width" data-init-plugin="select2" name="country">
                          <optgroup label="Alaskan/Hawaiian Time Zone">
                            <option value="AK">Alaska</option>
                            <option value="HI">Hawaii</option>
                          </optgroup>
                          <optgroup label="Pacific Time Zone">
                            <option value="CA">California</option>
                            <option value="NV">Nevada</option>
                            <option value="OR">Oregon</option>
                            <option value="WA">Washington</option>
                          </optgroup>
                          <optgroup label="Mountain Time Zone">
                            <option value="AZ">Arizona</option>
                            <option value="CO">Colorado</option>
                            <option value="ID">Idaho</option>
                            <option value="MT">Montana</option>
                            <option value="NE">Nebraska</option>
                            <option value="NM">New Mexico</option>
                            <option value="ND">North Dakota</option>
                            <option value="UT">Utah</option>
                            <option value="WY">Wyoming</option>
                          </optgroup>
                          <optgroup label="Central Time Zone">
                            <option value="AL">Alabama</option>
                            <option value="AR">Arkansas</option>
                            <option value="IL">Illinois</option>
                            <option value="IA">Iowa</option>
                            <option value="KS">Kansas</option>
                            <option value="KY">Kentucky</option>
                            <option value="LA">Louisiana</option>
                            <option value="MN">Minnesota</option>
                            <option value="MS">Mississippi</option>
                            <option value="MO">Missouri</option>
                            <option value="OK">Oklahoma</option>
                            <option value="SD">South Dakota</option>
                            <option value="TX">Texas</option>
                            <option value="TN">Tennessee</option>
                            <option value="WI">Wisconsin</option>
                          </optgroup>
                          <optgroup label="Eastern Time Zone">
                            <option value="CT">Connecticut</option>
                            <option value="DE">Delaware</option>
                            <option value="FL">Florida</option>
                            <option value="GA">Georgia</option>
                            <option value="IN">Indiana</option>
                            <option value="ME">Maine</option>
                            <option value="MD">Maryland</option>
                            <option value="MA">Massachusetts</option>
                            <option value="MI">Michigan</option>
                            <option value="NH">New Hampshire</option>
                            <option value="NJ">New Jersey</option>
                            <option value="NY">New York</option>
                            <option value="NC">North Carolina</option>
                            <option value="OH">Ohio</option>
                            <option value="PA">Pennsylvania</option>
                            <option value="RI">Rhode Island</option>
                            <option value="SC">South Carolina</option>
                            <option value="VT">Vermont</option>
                            <option value="VA">Virginia</option>
                            <option value="WV">West Virginia</option>
                          </optgroup>
                        </select>
                      </div>

                       <div class="form-group form-group-default required">
                        <label>State</label>
                        <input type="text" class="form-control" required="" name='state'>
                      </div>

                       <div class="form-group form-group-default required">
                        <label>city</label>
                        <input type="text" class="form-control" required="" name='city'>
                      </div>

                     

                       <div class="form-group form-group-default required">
                        <label>Zip</label>
                        <input type="zip" class="form-control" required="" name='zip' placeholder="not really important">
                      </div>


                      </div>
                    </div>
                    <div class="tab-pane " id="tab2Inspire">
                      <div class="row">
                        <div class="col-md-12">
                            <h3>We are so glad to have you here. </h3>
                          <center><button class="btn btn-primary" id="setupsubmit">Submit</button></center>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              {{csrf_field()}}
          </form>


           <!-- Modal -->
          <div class="modal fade slide-up disable-scroll" id="setUpSlideUp" tabindex="-1" role="dialog" aria-hidden="false">
            <div class="modal-dialog ">
              <div class="modal-content-wrapper">
                <div class="modal-content">
                 
                     <div class="col-md-12">
              
                       <h1>you have finished setting up your account, we would now redirect you to your home page</h1>
              </div>

                      </div>
                  
                  </div>
                </div>
              </div>
              <!-- /.modal-content -->
           
               <script src={{asset("client/assets/plugins/jquery/jquery-1.11.1.min.js")}} type="text/javascript"></script>

          <script type="text/javascript">
              
            $(document).ready(function(){
                $('#setupsubmit').click(function(e){
                    e.preventDefault();
                    alert('uu');
                    $(this).attr('disables','true');
                   /// alert('dfghjk')
                   var url="{{route('process')}}";
                   var data=$('#setupForm').serializeArray();
                   $.post(url,data,function(info){
                    alert(info);
                    if(info=='done'){
                        $('#setUpSlideUp').modal();
                        setTimeOut(function(){
                            window.location.assign("{{route('student@home')}}");
                        },5000)
                    }
                   })
                })
            })

          </script>
@endsection