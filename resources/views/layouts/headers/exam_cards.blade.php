<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
  <div class="container-fluid">
      <div class="header-body">
        @include('layouts.headers.messages')
          <!-- Card stats -->
          <div class="row">
              <div class="col-xl-3 col-sm-6">
                  <div class="card card-stats mb-4 mb-xl-0">
                      <div class="card-body">
                          <h5 class="card-title text-uppercase text-muted mb-0">Current Academic Term</h5>
                          <span class="h1 font-weight-bold mb-0">S.Y. {{ $curAcadTerm->sy }}</span>
                          <p class="mt-1 mb-0 text-muted text-md">
                              <span class="text-nowrap">{{ $curAcadTerm->semester == 1 ? '1st' : '2nd' }} Semester</span>
                          </p>
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-sm-6">
                  <div class="card card-stats mb-4 mb-xl-0">
                      <div class="card-body">
                          <h5 class="card-title text-uppercase text-muted mb-0">Prelims Examination</h5>
                          <span class="h2 font-weight-bold mb-0">{{ $curAcadTerm->getPrelimsDate() }}</span>
                          <p class="mt-3 mb-0 text-muted text-sm">
                              <span class="text-nowrap">{{ $curAcadTerm->getAcadTerm() }}</span>
                          </p>
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-sm-6">
                  <div class="card card-stats mb-4 mb-xl-0">
                      <div class="card-body">
                          <h5 class="card-title text-uppercase text-muted mb-0">Midterms Examination</h5>
                          <span class="h2 font-weight-bold mb-0">{{ $curAcadTerm->getMidtermsDate() }}</span>
                          <p class="mt-3 mb-0 text-muted text-sm">
                              <span class="text-nowrap">{{ $curAcadTerm->getAcadTerm() }}</span>
                          </p>
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-sm-6">
                  <div class="card card-stats mb-4 mb-xl-0">
                      <div class="card-body">
                          <h5 class="card-title text-uppercase text-muted mb-0">Finals Examination</h5>
                          <span class="h2 font-weight-bold mb-0">{{ $curAcadTerm->getFinalsDate() }}</span>
                          <p class="mt-3 mb-0 text-muted text-sm">
                              <span class="text-nowrap">{{ $curAcadTerm->getAcadTerm() }}</span>
                          </p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>