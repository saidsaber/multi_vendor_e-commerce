<div class="header-center">
    <div class="header-search header-search-extended header-search-visible d-none d-lg-block">
        <div class="header-search-wrapper search-wrapper-wide position-relative">
            <label for="q" class="sr-only">Search</label>

            <button class="btn btn-primary" type="button">
                <i class="icon-search"></i>
            </button>

            <input type="search"
                   id="q"
                   class="form-control"
                   placeholder="Search product ..."
                   wire:model.live="query" />

            @if(!empty($results))
                <div class="dropdown-menu show w-100 mt-1 shadow-sm" style="max-height: 250px; overflow-y: auto;">
                    @forelse($results as $r)
                        <a href="{{ route('product', ['id' => $r->id]) }}"
                           class="dropdown-item d-flex align-items-center">
                            <i class="fa fa-box me-2 text-muted"></i>
                            <span>{{ $r->name }}</span>
                        </a>
                    @empty
                        <span class="dropdown-item text-muted">No results found</span>
                    @endforelse
                </div>
            @endif
        </div>
    </div>
</div>
