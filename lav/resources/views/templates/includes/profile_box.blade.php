<div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{ Auth::user()->getAvatar()  }}" alt="{{ Auth::user()->getFullName()  }}">

              <h3 class="profile-username text-center">{{ Auth::user()->getFullName()  }}</h3>

              <!--<p class="text-muted text-center">Software Engineer</p>-->

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Followers</b> <a class="pull-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Following</b> <a class="pull-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Friends</b> <a class="pull-right">13,287</a>
                </li>
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">{{ "About me"  }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> {{ "Studies"  }}</strong>

              <p class="text-muted">
                {{ Auth::user()->studies  }}
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> {{ "Location"  }}</strong>

              <p class="text-muted">
                {{ Auth::user()->location  }}
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> {{ "Phone"  }}</strong>

              <p class="text-muted">
                {{ Auth::user()->phone  }}
              </p>


                <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> {{ "Skills"  }}</strong>

              <p>
                @foreach( Auth::user()->getSkills() AS $s )
                    <span class="label label-info">{{ $s  }}</span>
                @endforeach

              </p>



              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> {{ "Details"  }}</strong>

              <!--<p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p>-->
              <p>
                {{ Auth::user()->details  }}
                </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> {{ "Notes"  }}</strong>

              <p>{{ Auth::user()->notes  }}</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>