<div class="header bg-gradient-primary pb-7 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
              <div class="col">
                @include('layouts.headers.messages')
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase text-muted mb-0">Annoucement</h5>
                        <span class="h2 font-weight-bold mb-0">
                          {{ $annoucement }}
                        </span>
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