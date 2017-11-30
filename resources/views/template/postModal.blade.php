<!--Modal-->
<div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="btn-group btn-group-md">
              <button type="button" class="btn btn-link">Make post</button>
            </div>
          </div>
          <form enctype="multipart/form-data" method="post" action="{{ route('post.store') }}">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="post">
            <div class="modal-body row">
              <div class="col-md-12">
                Post type :
                <input type="radio" name="post_type" value="status" checked> Status
                <input type="radio" name="post_type" value="project"> Project @if ($errors->has('post_type'))
                <span class="help-block">
                  <strong>{{ $errors->first('post_type') }}</strong>
                </span>
                @endif
              </div>

              <div class="form-group col-md-12">
                <br>
                <textarea id="textareaID1" class="form-control input-lg p-text-area" rows="2" placeholder="Write something" name="description"
                  style="resize: none;" required autofocus></textarea>
              </div>



              <div class="form-group col-md-12" id="show_porjectFields">
                <input id="url" class="form-control input-lg p-text-area" placeholder="URL" name="url" style="resize: none;" required>
              </div>

              <div class="form-group col-md-12">
                <div class="row">
                  <div class="col-md-12 col-sm-12">

                    <a id="image_preview"></a>

                  </div>
                </div>
              </div>

            </div>

            <div class="modal-footer">

              <div class="form-group">

                <div class="dropdown">
                  <button class="btn btn-primary dropdown-toggle pull-right" type="button" data-toggle="dropdown" id="btn_text" style="margin-left:10px;">

                  </button>

                  <ul class="dropdown-menu pull-right" style="padding-left:10px ;">

                    <div>
                      <label>
                        <input type="checkbox" id="selectall" checked> All Connection
                      </label>
                    </div>

                    <div>
                      <label>
                        <input type="checkbox" id="checkItem1" class="checkItem" name="type[]" value="{{$interest->profession}}" checked required> {{$interest->profession}}
                      </label>
                    </div>
                    <div>
                      <label>
                        <input type="checkbox" id="checkItem2" class="checkItem" name="type[]" value="{{$interest->industry}}" checked required> {{$interest->industry}}
                      </label>
                    </div>
                    <div>
                      <label>
                        <input type="checkbox" id="checkItem3" class="checkItem" name="type[]" value="{{$user->education}}" checked required> {{$user->education}}
                      </label>
                    </div>


                  </ul>
                </div>

                <button type="submit" class="btn btn-primary pull-right">Post</button>
              </div>

              <ul class="nav nav-pills pull-left">
                <li id="tooltip">
                  <a href="#">
                    <i class="fa fa-map-marker">
                      <span id="tooltiptext">Check-in</span>
                    </i>
                  </a>
                </li>
                <li id="tooltip">
                  <a href="#">
                    <span onclick="upload_image()">
                      <i class="fa fa-camera">
                        <span id="tooltiptext">Upload image</span>
                      </i>
                    </span>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input id="my_images" type="file" name="post_images[]" multiple="true" style="display: none;">
                  </a>
                </li>
                <li id="tooltip">
                  <a href="#">
                    <i class="fa fa-film">
                      <span id="tooltiptext">Upload video</span>
                    </i>
                  </a>
                </li>
                <li id="tooltip">
                  <a href="#">
                    <i class="fa fa-microphone">
                      <span id="tooltiptext">Record voice</span>
                    </i>
                  </a>
                </li>
              </ul>

            </div>

          </form>
        </div>
      </div>
    </div>

    <!--end Modal-->