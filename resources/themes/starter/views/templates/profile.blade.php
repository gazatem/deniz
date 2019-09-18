
<div class="row mt-2">
    <div class="col-md-12">
        <div class="row overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col-4 uploaded p-4">
                @block(profile_photo)
            </div>
            <div class="col-8 uploaded p-4">
                {!! $page->content !!}
            </div>
        </div>
    </div>
</div>