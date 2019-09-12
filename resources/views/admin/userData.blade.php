@foreach($users as $u)
 <!-- Start -->
 <div class="col-md-12 py-2 px-1">
        <div class="card shadow-lg">
            <div class="card-body">
              <div class="row align-items-center">
                  <div class="col-auto">
                      <a href="#" class="avatar avatar-xl rounded-circle">
                      <img alt="Image placeholder" src="/ajk.png">
                      </a>
                  </div>
                  <div class="col ml--2">
                      <h4 class="mb-0">
                          <a href="#!">{{ $u->name }}</a>
                      </h4>
                      <p class="text-sm text-muted mb-0">{{ $u->email }}</p>
                      <span class="text-success">●</span>
                      <small>Active</small>
                  </div>

                  <div class="my--2 mr-4">
                        <button onclick="edituser('{{ $u }}')" type="button" class="btn btn-sm btn-outline-primary float-right">
                            <i class="fa fa-edit"></i>
                        </button>
                    </div>
            </div>
        </div>
      </div>
    </div>
    <!-- End -->
@endforeach